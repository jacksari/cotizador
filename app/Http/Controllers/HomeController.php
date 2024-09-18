<?php

namespace App\Http\Controllers;

use Alert;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

//use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curYear = date('Y');
        $marcas = DB::table('marcas')->orderBy('nombre', 'asc')->get();
        $usos = DB::table('usos')->where('estado', 'Activo')->get();
        $data = compact('curYear', 'marcas', 'usos');

        //return view('homesegurofacil', $data);
        //return view('home', $data);
        $custom_template = "_seguroutil";
        //        return view('home'.$custom_template, $data);
        return redirect('/admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //-----Registra Cotización en BD

        //-----Carga datos de la Vista
        $id = 2;
        $plantilla = self::getTemplateByQuotationId($id);

        $data = self::getDataQuotation($id);
        $chino = self::getIsChinoByQuotationId($id) ? "_chino" : "";
        //-----Genera PDF con la vista Cotización
        $pdf = PDF::loadView($plantilla . $chino, $data); //->save('cotizacion.pdf'); return $pdf->download($outputName . '.pdf');

        //-----Envia Correo a cliente con Cotización
        \Config::set('mail.driver', CRUDBooster::getSetting('smtp_driver'));
        \Config::set('mail.host', CRUDBooster::getSetting('smtp_host'));
        \Config::set('mail.port', CRUDBooster::getSetting('smtp_port'));
        \Config::set('mail.username', CRUDBooster::getSetting('smtp_username'));
        \Config::set('mail.password', CRUDBooster::getSetting('smtp_password'));

        $to = 'calebsc@gmail.com';
        $data = []; //$data = ['name'=>'John Done','email'=>'john@gmail.com'];
        $template = 'send_quotation';

        $template = CRUDBooster::first('cms_email_templates', ['slug' => $template]);
        $html = $template->content;
        foreach ($data as $key => $val) {
            $html = str_replace('[' . $key . ']', $val, $html);
            $template->subject = str_replace('[' . $key . ']', $val, $template->subject);
        }
        $subject = $template->subject; //$attachments = ($config['attachments'])?:array();

        Mail::send("crudbooster::emails.blank", ['content' => $html], function ($message) use ($to, $subject, $template, $pdf) {
            $message->priority(1);
            $message->to($to);

            if ($template->from_email) {
                $from_name = ($template->from_name) ?: CRUDBooster::getSetting('appname');
                $message->from($template->from_email, $from_name);
            }

            if ($template->cc_email) {
                $message->cc($template->cc_email);
            }

            $outputName = str_random(10);
            $message->attachData($pdf->output(), $outputName . ".pdf");

            $message->subject($subject);
        });

        //-----Envia Correo al Administrador
        $data = []; //$data = ['name'=>'John Done','email'=>'john@gmail.com'];
        $to_receive_alerts = CRUDBooster::getSetting('email_quotation_alert');
        CRUDBooster::sendEmail(['to' => $to_receive_alerts, 'data' => $data, 'template' => 'new_quotation_registered']);

        //-----Genera Notificación al Administrador
        $id_received_alert = self::getUserIdByEmail($to_receive_alerts);
        $users_to_notify = array(1, $id_received_alert); //Id de super admin

        $config['content'] = "Nueva cotización registrada por cliente";
        $config['to'] = "/admin/cotizaciones/detail/" . $id;
        $config['id_cms_users'] = $users_to_notify;
        CRUDBooster::sendNotification($config);

        //-----Redirecciona al Home y muestra confirmación
        $to = "/";
        $message = "PAJARITO";
        $type = "success";
        //CRUDBooster::redirect($to,$message,$type);

        return "OK";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //-----Registra Cotización en BD
        $is_mailing = ($request->has('is_mailing')) ? $request->is_mailing : 0;
        $is_comonuevo = ($request->has('is_comonuevo')) ? $request->is_comonuevo : 0;
        //$email_quotation_alert = CRUDBooster::getSetting('email_quotation_alert');
        $auto = DB::table('modelos')->where('id', $request->modelos_id)->value('nombre');
        $email_quotation_alert = DB::table('cms_settings')->where('name', 'email_quotation_alert')->value('content');
        $cms_users_id = self::getUserIdByEmail($email_quotation_alert);
        $email_to_send_quotation = $request->email;
        $nombreprospecto = $request->nombreprospecto;
        $observacion = ($request->observacion == '') ? '' : 'Código de Promocion: ' . $request->observacion;

        $id = DB::table('cotizaciones')->insertGetId(
            [
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'seguros_id' => 1, //Seguro Vehicular
                'cms_users_id' => $cms_users_id,
                'marcas_id' => $request->marcas_id,
                'aniofabricacion' => $request->aniofabricacion,
                'modelos_id' => $request->modelos_id,
                'usos_id' => $request->usos_id,
                'valormercado' => $request->valormercado,
                'is_convertidogas' => $request->is_convertidogas,
                'nombreprospecto' => $request->nombreprospecto,
                'edad' => $request->edad,
                'celular' => $request->celular,
                'email' => $request->email,
                'region' => $request->region,
                'estado' => 'Seguimiento',
                'observacion' => $observacion,
                'is_mailing' => $is_mailing
            ]
        );

        $curYear = date('Y');
        $valormercado = (float)$request->valormercado;
        $anioantiguedad = ($is_comonuevo == 1) ? 0 : $curYear - (int)$request->aniofabricacion; //calcular antiguedad

        $modelos_productos = DB::table('modelos_productos')->where([['modelos_id', '=', $request->modelos_id], ['usos_id', '=', $request->usos_id]])->get();

        foreach ($modelos_productos as $modelo_producto) {

            $tasa = 0;
            $primaneta = 0;
            $primatotal = 0;
            $descuento = 0;
            $is_gps = 0;
            //$is_comonuevo = 0;//este es un dato manual para el administrador en su panel

            if (!is_null($modelo_producto->productos_id) && $modelo_producto->productos_id > 0) {

                $productos = DB::table('productos')->where('id', $modelo_producto->productos_id)->first();
                $tasa = DB::table('tasas')->where([['productos_id', '=', $modelo_producto->productos_id], ['anioantiguedad', '=', $anioantiguedad]])->value('porcentajetasa');

                $primaneta = $valormercado * ($tasa / 100); //Si la tasa es CERO, primeaneta tendra como valor CERO

                if ($productos->primaminima > 0 && $primaneta < $productos->primaminima && $primaneta > 0) {
                    $primaneta = $productos->primaminima;
                }

                if ($modelo_producto->companias_id == 4) {
                    $primatotal = round(($primaneta * (118.00 / 100)), 2);
                } else {
                    $primatotal = round(($primaneta * (121.54 / 100)), 2);
                }

                $primaneta = round($primaneta, 2);

                if ($valormercado >= $productos->gpsmontotope) {
                    $is_gps = 1;
                }

                if ($modelo_producto->gpsantiguedadhasta > 0 && $anioantiguedad <= $modelo_producto->gpsantiguedadhasta) {
                    $is_gps = 1;
                }
            }

            DB::table('cotizaciones_detalles')->insert(
                [
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'cotizaciones_id' => $id,
                    'companias_id' => $modelo_producto->companias_id,
                    'productos_id' => $modelo_producto->productos_id,
                    'tasa' => $tasa,
                    'primaneta' => $primaneta,
                    'primatotal' => $primatotal,
                    'descuento' => $descuento,
                    'is_gps' => $is_gps,
                    'is_comonuevo' => $is_comonuevo
                ]
            );
        }

        //-----Carga datos de la Vista
        $plantilla = self::getTemplateByQuotationId($id);
        $data = self::getDataQuotation($id);
        $chino = self::getIsChinoByQuotationId($id) ? "_chino" : "";

        //        $header = View::make('pdf.header')->render();
        //        $footer =  View::make('pdf.footer')->render();
        //        $pdf = PDF::loadView($plantilla.$chino,$data)->setOption('header-html', $header)->setOption('footer-html', $footer);
        //-----Genera PDF con la vista Cotización
        $pdf = PDF::loadView($plantilla . $chino, $data); //->save('cotizacion.pdf'); return $pdf->download($outputName . '.pdf');

        //-----Envia Correo a cliente con Cotización
        \Config::set('mail.driver', CRUDBooster::getSetting('smtp_driver'));
        \Config::set('mail.host', CRUDBooster::getSetting('smtp_host'));
        \Config::set('mail.port', CRUDBooster::getSetting('smtp_port'));
        \Config::set('mail.username', CRUDBooster::getSetting('smtp_username'));
        \Config::set('mail.password', CRUDBooster::getSetting('smtp_password'));

        $to = $email_to_send_quotation; //'calebsc@gmail.com';
        $data_email = ['name' => $nombreprospecto, 'auto' => $auto]; //$data_email = ['name'=>'John Done','email'=>'john@gmail.com'];
        $template = 'send_quotation';

        $template = CRUDBooster::first('cms_email_templates', ['slug' => $template]);
        $html = $template->content;
        foreach ($data_email as $key => $val) {
            $html = str_replace('[' . $key . ']', $val, $html);
            $template->subject = str_replace('[' . $key . ']', $val, $template->subject);
        }
        $subject = $template->subject; //$attachments = ($config['attachments'])?:array();

        Mail::send("crudbooster::emails.blank", ['content' => $html], function ($message) use ($to, $subject, $template, $pdf) {
            $message->priority(1);
            $message->to($to);

            if ($template->from_email) {
                $from_name = ($template->from_name) ?: CRUDBooster::getSetting('appname');
                $message->from($template->from_email, $from_name);
            }

            if ($template->cc_email) {
                $message->cc($template->cc_email);
            }

            $outputName = str_random(10);
            $message->attachData($pdf->output(), $outputName . ".pdf");

            $message->subject($subject);
        });

        //-----Envia Correo al Administrador
        $data_email = ['name' => $nombreprospecto, 'age' => $request->edad, 'phone' => $request->celular, 'email' => $to]; //$data = ['name'=>'John Done','email'=>'john@gmail.com'];
        $to_receive_alerts = $email_quotation_alert; //CRUDBooster::getSetting('email_quotation_alert');
        //CRUDBooster::sendEmail(['to'=>$to_receive_alerts,'data'=>$data_email,'template'=>'new_quotation_registered']);
        $template = CRUDBooster::first('cms_email_templates', ['slug' => 'new_quotation_registered']);
        $html = $template->content;
        foreach ($data_email as $key => $val) {
            $html = str_replace('[' . $key . ']', $val, $html);
            $template->subject = str_replace('[' . $key . ']', $val, $template->subject);
        }
        $subject = $template->subject; //$attachments = ($config['attachments'])?:array();

        Mail::send("crudbooster::emails.blank", ['content' => $html], function ($message) use ($to_receive_alerts, $subject, $template, $pdf) {
            $message->priority(1);
            $message->to($to_receive_alerts);

            if ($template->from_email) {
                $from_name = ($template->from_name) ?: CRUDBooster::getSetting('appname');
                $message->from($template->from_email, $from_name);
            }

            if ($template->cc_email) {
                $message->cc($template->cc_email);
            }

            $outputName = str_random(10);
            $message->attachData($pdf->output(), $outputName . ".pdf");

            $message->subject($subject);
        });

        //-----Genera Notificación al Administrador
        $id_received_alert = $cms_users_id; // self::getUserIdByEmail($to_receive_alerts);
        $users_to_notify = array($id_received_alert); //Id de super admin

        $config['content'] = "Nueva cotización registrada por cliente";
        $config['to'] = "/admin/cotizaciones/edit/" . $id;
        $config['id_cms_users'] = $users_to_notify;
        CRUDBooster::sendNotification($config);

        //-----Redirecciona al Home y muestra confirmación
        //        Alert::success('Hemos enviado una cotización a su cuenta de correo', 'Gracias por Contactarnos')->persistent("Cerrar");
        //Alert::success('Te hemos enviado una cotización a tu correo. Uno de nuestros ejecutivos se pondrá en contacto contigo.', 'Gracias por confiar en SEGURO RÁPIDO')->persistent("Cerrar");
        //Alert::success('Te hemos enviado una cotización a tu correo. Uno de nuestros ejecutivos se pondrá en contacto contigo.', 'Gracias por confiar en CENTRO SEGURO')->persistent("Cerrar");
        $appname = CRUDBooster::getSetting('appname');
        Alert::success('Te hemos enviado una cotización a tu correo. Uno de nuestros ejecutivos se pondrá en contacto contigo.', 'Gracias por confiar en ' . $appname)->persistent("Cerrar");
        //        return redirect('/');
        $custom_template = "_seguroutil";
        return View("resultado/" . $plantilla . $chino . $custom_template, $data);
        //return $request->all();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //public_path();
        return url('uploads/2017-04/rimac.png');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showpdf($id)
    {

        $data = self::getDataQuotationNew($id);
        // return $data;

        $pdf = PDF::loadView('cotizacion_comercial', json_decode(json_encode($data), true))
            ->setOptions([
                'isHtml5ParserEnabled' => true,       // Habilita el parser HTML5
                'isRemoteEnabled' => true,            // Permite cargar recursos remotos (URLs absolutas)
                'dpi' => 96,                          // Ajusta los DPI para imágenes más nítidas
                'defaultFont' => 'DejaVu Sans',       // Fuente predeterminada
            ])
            ->save(public_path('pdfs/' . $id . '.pdf'));

        return $pdf->stream();
       

        // return;
        // ini_set('memory_limit', '512M');
        // set_time_limit(0);
        //$data = self::getDataQuotation($id);
        //$pdf = PDF::loadView('cotizacion',$data);
        //return $pdf->download('quotation.pdf');
        $usos_id = DB::table('cotizaciones')->where([['id', '=', $id]])->value('usos_id');

        $plantilla = self::getTemplateByQuotationId($id);
        $chino = self::getIsChinoByQuotationId($id) ? "_chino" : "";
        $data = self::getDataQuotation($id);
        // $pdf = App::make('dompdf.wrapper');
        // $pdf = PDF::loadView($plantilla.$chino,$data);
        // if ($usos_id == 7) { //coroporativo - comercial
        //     $pdf->setPaper('a3');
        // }

        //load to storage public

        //save storage public
        // Pdf::loadView('test',$data)->save(storage_path('app/pdfs/test.pdf'));

        //logo logo_cotizacion
        $path_logo_cotizacion = public_path($data['logo_cotizacion']);
        $type_logo_cotizacion = pathinfo($path_logo_cotizacion, PATHINFO_EXTENSION);
        $data_logo_cotizacion = file_get_contents($path_logo_cotizacion);
        $base64_logo_cotizacion = 'data:image/' . $type_logo_cotizacion . ';base64,' . base64_encode($data_logo_cotizacion);

        //logo1
        $path_logo1 = public_path($data['logo1']);
        $type_logo1 = pathinfo($path_logo1, PATHINFO_EXTENSION);
        $data_logo1 = file_get_contents($path_logo1);
        $base64_logo1 = 'data:image/' . $type_logo1 . ';base64,' . base64_encode($data_logo1);

        //logo2
        $path_logo2 = public_path($data['logo2']);
        $type_logo2 = pathinfo($path_logo2, PATHINFO_EXTENSION);
        $data_logo2 = file_get_contents($path_logo2);
        $base64_logo2 = 'data:image/' . $type_logo2 . ';base64,' . base64_encode($data_logo2);

        //logo3
        $path_logo3 = public_path($data['logo3']);
        $type_logo3 = pathinfo($path_logo3, PATHINFO_EXTENSION);
        $data_logo3 = file_get_contents($path_logo3);
        $base64_logo3 = 'data:image/' . $type_logo3 . ';base64,' . base64_encode($data_logo3);

        //logo4
        $path_logo4 = public_path($data['logo4']);
        $type_logo4 = pathinfo($path_logo4, PATHINFO_EXTENSION);
        $data_logo4 = file_get_contents($path_logo4);
        $base64_logo4 = 'data:image/' . $type_logo4 . ';base64,' . base64_encode($data_logo4);

        //logo5
        $path_logo5 = public_path($data['logo5']);
        $type_logo5 = pathinfo($path_logo5, PATHINFO_EXTENSION);
        $data_logo5 = file_get_contents($path_logo5);
        $base64_logo5 = 'data:image/' . $type_logo5 . ';base64,' . base64_encode($data_logo5);

        //agregar logos a data
        $data['base64_logo1'] = $base64_logo1;
        $data['base64_logo2'] = $base64_logo2;
        $data['base64_logo3'] = $base64_logo3;
        $data['base64_logo4'] = $base64_logo4;
        $data['base64_logo5'] = $base64_logo5;
        $data['base64_logo_cotizacion'] = $base64_logo_cotizacion;


        // PDF::loadView($plantilla.$chino,$data)
        // ->setOptions([
        //     'isHtml5ParserEnabled' => true,       // Habilita el parser HTML5
        //     'isRemoteEnabled' => true,            // Permite cargar recursos remotos (URLs absolutas)
        //     'dpi' => 96,                          // Ajusta los DPI para imágenes más nítidas
        //     'defaultFont' => 'DejaVu Sans',       // Fuente predeterminada
        // ])
        // ->save(storage_path('app/pdfs/'.$id.'.pdf'));

        // return PDF::loadView('test',$data)->stream();

        // return [
        //     'message' => 'PDF generado',
        // ];

        // $plantilla.$chino,$data
        return $data;

        //############ Permitir ver imagenes si falla ################################
        //        $contxt = stream_context_create([
        //            'ssl' => [
        //                'verify_peer' => FALSE,
        //                'verify_peer_name' => FALSE,
        //                'allow_self_signed' => TRUE,
        //            ]
        //        ]);
        //
        ////        $pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        //        $pdf->setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        //        $pdf->getDomPDF()->setHttpContext($contxt);
        //#################################################################################

        // $pdf->loadView($plantilla.$chino,$data);

        // return $pdf->stream();

        //        $pdf = Pdf::loadView($plantilla.$chino,$data,[], null);
        //        $pdf = new Dompdf();
        //        $pdf->loadView($plantilla.$chino,$data);

        //        $header = View::make('pdf.header')->render();
        //        $footer =  View::make('pdf.footer')->render();
        //        $pdf->loadView($plantilla.$chino,$data)->setOption('header-html', $header)->setOption('footer-html', $footer);
        //-----Genera PDF con la vista Cotización

        //        $pdf->loadView("cotizacion_diamante",$data);
        return $pdf->stream();
    }

    public function generatePdfById($id)
    {
        // Obtener los datos necesarios
        $data = $this->getDataQuotationNew($id);
        // return $data;

        // Generar el PDF y guardarlo en la carpeta 'public/pdfs'
        $pdf = PDF::loadView('cotizacion_comercial', $data)
            ->setOptions([
                'isHtml5ParserEnabled' => true,  // Habilita el parser HTML5
                'isRemoteEnabled' => true,       // Permite cargar recursos remotos (URLs absolutas)
                'dpi' => 96,                     // Ajusta los DPI para imágenes más nítidas
                'defaultFont' => 'DejaVu Sans',  // Fuente predeterminada
            ])
            ->save(storage_path('app/pdfs/' . $id . '.pdf'));

        // Ruta donde se guardará el PDF
        // $path = public_path('/pdfs/' . $id . '.pdf');

        // Guardar el PDF en la ruta especificada
        // $pdf->save($path);

        // Retornar un mensaje y la ruta del PDF
        return [
            'message' => 'PDF generado',
            // 'path' => $path,
        ];
    }


    public function existPdfById($id)
    {
        $path = public_path('/pdfs/' . $id . '.pdf');

        if (file_exists($path)) {
            return [
                'message' => 'PDF existe',
                'status' => 1,
                'public_path' => $path,
                'path' => env('APP_URL') . '/pdfs/' . $id . '.pdf',
            ];
        } else {
            return [
                'message' => 'PDF no existe',
                'status' => 0,
                'path' => null,
            ];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //Alert::success('Success Message', 'Optional Title');
        //Alert::error('Something went wrong', 'Oops!');
        //Alert::success('Success Message', 'Optional Title')->autoclose(3000);
        Alert::success('Hemos enviado una cotización a su cuenta de correo', 'Gracias por Contactarnos')->persistent("Cerrar");
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cotizacion($id)
    {
        $plantilla = self::getTemplateByQuotationId($id);
        $data = self::getDataQuotation($id);
        $chino = self::getIsChinoByQuotationId($id) ? "_chino" : "";

        $custom_template = "_seguroutil";

        return View("resultado/" . $plantilla . $chino . $custom_template, $data);
        //        return View($plantilla.$chino,$data);
        //        return View($plantilla,$data);
        //return View("resultado_cotizacion",$data);
    }

    public static function getDataQuotation($id)
    {

        $cotizacion = DB::table('cotizaciones')->where('id', $id)->first();

        $rimac = 1;
        $pacifico = 2;
        $lapositiva = 3;
        $hdi = 4;
        $mapfre = 5;
        $logo_cotizacion = CRUDBooster::getSetting('quotation_logo');
        $telefono_cotizacion = CRUDBooster::getSetting('quotation_telephone');

        // $uso = DB::table('usos')->where('id',$cotizacion->usos_id)->value('nombre');

        $companias = DB::table('usos_companias')->where('cotizaciones_id', $cotizacion->id)->get();

        if ($companias->count() == 0) {
            $companias = DB::table('usos_companias')->where('usos_id', $cotizacion->usos_id)->get();
        }

        $marca = DB::table('marcas')->where('id', $cotizacion->marcas_id)->value('nombre');
        $modelo = DB::table('modelos')->where('id', $cotizacion->modelos_id)->value('nombre');
        $aniofabricacion = $cotizacion->aniofabricacion;
        $valormercado = $cotizacion->valormercado;
        $validezini = (is_null($cotizacion->updated_at)) ? date('d/m/Y', strtotime($cotizacion->created_at)) : date('d/m/Y', strtotime($cotizacion->updated_at));
        $validezfin = (is_null($cotizacion->updated_at)) ? date('d/m/Y', strtotime($cotizacion->created_at . " +3 days")) : date('d/m/Y', strtotime($cotizacion->updated_at . " +3 days"));
        $nombreprospecto = (is_null($cotizacion->nombreprospecto) || $cotizacion->nombreprospecto == '') ? '' : 'Prospecto: ' . $cotizacion->nombreprospecto;
        $cotizacion_id = str_pad($cotizacion->id, 10, "0", STR_PAD_LEFT);
        $usuario_responsable = DB::table('cms_users')->where('id', $cotizacion->cms_users_id)->first();
        if ($usuario_responsable->subagentes_id != null) {
            $tienda = DB::table('subagentes')->where('id', $cotizacion->subagentes_id)->value('nombre');
            $responsable = $usuario_responsable->name . "<br><span style='font-size: x-small;'>Tienda: " . $tienda . "</span>" . "<br><span style='font-size: x-small;'>Email: " . $usuario_responsable->email . "</span>" . "<br><span style='font-size: x-small;'>Teléfono " . $usuario_responsable->telefono . "</span>";
        } else {
            $responsable = $usuario_responsable->name . "<br><span style='font-size: x-small;'>Email: " . $usuario_responsable->email . "</span>" . "<br><span style='font-size: x-small;'>Teléfono: " . $usuario_responsable->telefono . "</span>";
        }

        $emailresponsable = $usuario_responsable->email;
        $subagente = DB::table('subagentes')->where('id', $usuario_responsable->subagentes_id)->value('nombre');
        $emailprospecto = $cotizacion->email;
        $celularprospecto = $cotizacion->celular;
        $region = $cotizacion->region;
        $observacion = $cotizacion->observacion;
        $convertidogas = $cotizacion->is_convertidogas == 0 ? 'No' : 'Si';

        $pacifico_prima = $cotizacion->pacifico_prima;
        $pacifico_cuotas_1 = $cotizacion->pacifico_cuotas_1;
        $pacifico_cuotas_2 = $cotizacion->pacifico_cuotas_2;
        $pacifico_cuotas_3 = $cotizacion->pacifico_cuotas_3;
        $hdi_prima = $cotizacion->hdi_prima;
        $hdi_cuotas_1 = $cotizacion->hdi_cuotas_1;
        $hdi_cuotas_2 = $cotizacion->hdi_cuotas_2;
        $hdi_cuotas_3 = $cotizacion->hdi_cuotas_3;

        //        $logo1 = url(DB::table('companias')->where('id',$pacifico)->value('logo'));
        //        $logo2 = url(DB::table('companias')->where('id',$lapositiva)->value('logo'));
        //        $logo3 = url(DB::table('companias')->where('id',$rimac)->value('logo'));
        //        $logo4 = url(DB::table('companias')->where('id',$mapfre)->value('logo'));
        //        $logo5 = url(DB::table('companias')->where('id',$hdi)->value('logo'));

        //        $table_column_width = is_null($cotizacion->companias_id) ? 16.67 : 50; //6 columnas incluida hdi
        //        $table_column_width = is_null($cotizacion->companias_id) ? 20 : 50; // sin hdi
        $table_column_width = is_null($cotizacion->companias_id) ? 100 / ($companias->count() + 1) : 50; // sin hdi
        //        $table_td_colspan = is_null($cotizacion->companias_id) ? 6 : 2; //6 columnas incluida hdi
        //        $table_td_colspan = is_null($cotizacion->companias_id) ? 5 : 2; // sin hdi
        $table_td_colspan = is_null($cotizacion->companias_id) ? $companias->count() + 1 : 2; // sin hdi

        //        $col2_display = (is_null($cotizacion->companias_id) ? 'table-cell':(($cotizacion->companias_id == $pacifico) ? 'table-cell':'none') );
        //        $col3_display = (is_null($cotizacion->companias_id) ? 'table-cell':(($cotizacion->companias_id == $lapositiva) ? 'table-cell':'none') );
        //        $col4_display = (is_null($cotizacion->companias_id) ? 'table-cell':(($cotizacion->companias_id == $rimac) ? 'table-cell':'none') );
        //        $col5_display = (is_null($cotizacion->companias_id) ? 'table-cell':(($cotizacion->companias_id == $mapfre) ? 'table-cell':'none') );
        //        $col6_display = (is_null($cotizacion->companias_id) ? 'table-cell':(($cotizacion->companias_id == $hdi) ? 'table-cell':'none') );
        //        $col6_display = 'none'; // sin hdi

        if (is_null($cotizacion->companias_id)) {

            $col2_display = 'none';
            $col3_display = 'none';
            $col4_display = 'none';
            $col5_display = 'none';
            $col6_display = 'none';

            foreach ($companias as $compania) {

                if ($compania->companias_id == $pacifico) {
                    $col2_display = 'table-cell';
                } elseif ($compania->companias_id == $lapositiva) {
                    $col3_display = 'table-cell';
                } elseif ($compania->companias_id == $rimac) {
                    $col4_display = 'table-cell';
                } elseif ($compania->companias_id == $mapfre) {
                    $col5_display = 'table-cell';
                } elseif ($compania->companias_id == $hdi) {
                    $col6_display = 'table-cell';
                }
            }
        } else {

            $col2_display = ($cotizacion->companias_id == $pacifico) ? 'table-cell' : 'none';
            $col3_display = ($cotizacion->companias_id == $lapositiva) ? 'table-cell' : 'none';
            $col4_display = ($cotizacion->companias_id == $rimac) ? 'table-cell' : 'none';
            $col5_display = ($cotizacion->companias_id == $mapfre) ? 'table-cell' : 'none';
            $col6_display = ($cotizacion->companias_id == $hdi) ? 'table-cell' : 'none';
        }

        $logo1 = DB::table('companias')->where('id', $pacifico)->value('logo');
        $logo2 = DB::table('companias')->where('id', $lapositiva)->value('logo');
        $logo3 = DB::table('companias')->where('id', $rimac)->value('logo');
        $logo4 = DB::table('companias')->where('id', $mapfre)->value('logo');
        $logo5 = DB::table('companias')->where('id', $hdi)->value('logo');

        $cotdet1 = DB::table('cotizaciones_detalles')->where([['cotizaciones_id', '=', $id], ['companias_id', '=', $pacifico]])->first();
        $cotdet2 = DB::table('cotizaciones_detalles')->where([['cotizaciones_id', '=', $id], ['companias_id', '=', $lapositiva]])->first();
        $cotdet3 = DB::table('cotizaciones_detalles')->where([['cotizaciones_id', '=', $id], ['companias_id', '=', $rimac]])->first();
        $cotdet4 = DB::table('cotizaciones_detalles')->where([['cotizaciones_id', '=', $id], ['companias_id', '=', $mapfre]])->first();
        $cotdet5 = DB::table('cotizaciones_detalles')->where([['cotizaciones_id', '=', $id], ['companias_id', '=', $hdi]])->first();

        // $prima1 = (is_numeric($cotdet1->primatotal) && $cotdet1->primatotal > 0)?number_format(round($cotdet1->primatotal, 2),2): 'COTIZACIÓN PERSONALIZADA';
        $prima1 = (!is_null($pacifico_prima)) ? $pacifico_prima : ((is_numeric($cotdet1->primatotal) && $cotdet1->primatotal > 0) ? number_format(round($cotdet1->primatotal, 2), 2) : 'COTIZACIÓN PERSONALIZADA');
        $prima2 = (is_numeric($cotdet2->primatotal) && $cotdet2->primatotal > 0) ? number_format(round($cotdet2->primatotal, 2), 2) : 'COTIZACIÓN PERSONALIZADA';
        $prima3 = (is_numeric($cotdet3->primatotal) && $cotdet3->primatotal > 0) ? number_format(round($cotdet3->primatotal)) : 'COTIZACIÓN PERSONALIZADA';
        $prima4 = (is_numeric($cotdet4->primatotal) && $cotdet4->primatotal > 0) ? number_format(round($cotdet4->primatotal, 2), 2) : 'COTIZACIÓN PERSONALIZADA';
        // $prima5 = (is_numeric($cotdet5->primatotal) && $cotdet5->primatotal > 0)?number_format(round($cotdet5->primatotal, 2),2): 'COTIZACIÓN PERSONALIZADA';
        $prima5 = (!is_null($hdi_prima)) ? $hdi_prima : ((is_numeric($cotdet5->primatotal) && $cotdet5->primatotal > 0) ? number_format(round($cotdet5->primatotal, 2), 2) : 'COTIZACIÓN PERSONALIZADA');

        // $primatot1 = (is_numeric($cotdet1->primatotal) && $cotdet1->primatotal > 0)?$cotdet1->primatotal: 0;
        $primatot1 = (!is_null($pacifico_prima)) ? doubleval(str_replace(",", "", $pacifico_prima)) : ((is_numeric($cotdet1->primatotal) && $cotdet1->primatotal > 0) ? $cotdet1->primatotal : 0);
        $primatot2 = (is_numeric($cotdet2->primatotal) && $cotdet2->primatotal > 0) ? $cotdet2->primatotal : 0;
        $primatot3 = (is_numeric($cotdet3->primatotal) && $cotdet3->primatotal > 0) ? $cotdet3->primatotal : 0;
        $primatot4 = (is_numeric($cotdet4->primatotal) && $cotdet4->primatotal > 0) ? $cotdet4->primatotal : 0;
        // $primatot5 = (is_numeric($cotdet5->primatotal) && $cotdet5->primatotal > 0)?$cotdet5->primatotal: 0;
        $primatot5 = (!is_null($hdi_prima)) ? doubleval(str_replace(",", "", $hdi_prima)) : ((is_numeric($cotdet5->primatotal) && $cotdet5->primatotal > 0) ? $cotdet5->primatotal : 0);

        $productos1 = DB::table('productos')->where('id', $cotdet1->productos_id)->first();
        $productos2 = DB::table('productos')->where('id', $cotdet2->productos_id)->first();
        $productos3 = DB::table('productos')->where('id', $cotdet3->productos_id)->first();
        $productos4 = DB::table('productos')->where('id', $cotdet4->productos_id)->first();
        $productos5 = DB::table('productos')->where('id', $cotdet5->productos_id)->first();

        $factores1 = DB::table('factores')->where([['companias_id', '=', $pacifico], ['planes_id', '=', $cotizacion->planes_id]])->orderBy('numerocuota', 'asc')->get();
        $factores2 = DB::table('factores')->where([['companias_id', '=', $lapositiva], ['planes_id', '=', $cotizacion->planes_id]])->orderBy('numerocuota', 'asc')->get();
        $factores3 = DB::table('factores')->where([['companias_id', '=', $rimac], ['planes_id', '=', $cotizacion->planes_id]])->orderBy('numerocuota', 'asc')->get();
        $factores4 = DB::table('factores')->where([['companias_id', '=', $mapfre], ['planes_id', '=', $cotizacion->planes_id]])->orderBy('numerocuota', 'asc')->get();
        $factores5 = DB::table('factores')->where([['companias_id', '=', $hdi], ['planes_id', '=', $cotizacion->planes_id]])->orderBy('numerocuota', 'asc')->get();



        //         $cuotasA = ['No','No','No','No','No']; $cuotasB = ['No','No','No','No','No']; $cuotasC = ['No','No','No','No','No']; $cuotasD = ['No','No','No','No','No']; $cuotasE = ['No','No','No','No','No'];
        //         $cuotdescA = ['','','','','']; $cuotdescB = ['','','','','']; $cuotdescC = ['','','','','']; $cuotdescD = ['','','','','']; $cuotdescE = ['','','','',''];

        //         $regcount = 0;
        //         foreach ($factores1 as $factor1) {

        //             if (!is_null($productos1) || !is_null($pacifico_prima)) {
        // //                $cuotasA[$regcount] = $factor1->porcentaje == 0 ? 'No': round($primatot1 * $factor1->porcentaje, 2);
        //                 $cuotasA[$regcount] = $factor1->porcentaje == 0 ? 'No': $factor1->numerocuota.' cuotas de '.round($primatot1 * $factor1->porcentaje, 2);
        //                 $cuotdescA[$regcount] = (is_null($factor1->descripcion) || strlen($factor1->descripcion) == 0) ? '': '<br><span style="font-size: xx-small">'.$factor1->descripcion.'</span>';
        //             }
        //             $regcount++;
        //         }

        //         $regcount = 0;
        //         foreach ($factores2 as $factor2) {

        //             if (!is_null($productos2)) {
        // //                $cuotasB[$regcount] = $factor2->porcentaje == 0 ? 'No': round($primatot2 * $factor2->porcentaje, 2);
        //                 $cuotasB[$regcount] = $factor2->porcentaje == 0 ? 'No': $factor2->numerocuota.' cuotas de '.round($primatot2 * $factor2->porcentaje, 2);
        //                 $cuotdescB[$regcount] = (is_null($factor2->descripcion) || strlen($factor2->descripcion) == 0) ? '': '<br><span style="font-size: xx-small">'.$factor2->descripcion.'</span>';
        //             }
        //             $regcount++;
        //         }

        //         $regcount = 0;
        //         foreach ($factores3 as $factor3) {

        //             if (!is_null($productos3)) {
        // //                $cuotasC[$regcount] = $factor3->porcentaje == 0 ? 'No': round($primatot3 * $factor3->porcentaje, 2);
        //                 // $cuotasC[$regcount] = $factor3->porcentaje == 0 ? 'No': $factor3->numerocuota.' cuotas de '.round($primatot3 * $factor3->porcentaje, 2);
        //                 $cuotasC[$regcount] = $factor3->porcentaje == 0 ? 'No': $factor3->numerocuota.' cuotas de '.round($primatot3 * $factor3->porcentaje);
        //                 $cuotdescC[$regcount] = (is_null($factor3->descripcion) || strlen($factor3->descripcion) == 0) ? '': '<br><span style="font-size: xx-small">'.$factor3->descripcion.'</span>';
        //             }
        //             $regcount++;
        //         }

        //         $regcount = 0;
        //         foreach ($factores4 as $factor4) {

        //             if (!is_null($productos4)) {
        // //                $cuotasD[$regcount] = $factor4->porcentaje == 0 ? 'No': round($primatot4 * $factor4->porcentaje, 2);
        //                 $cuotasD[$regcount] = $factor4->porcentaje == 0 ? 'No': $factor4->numerocuota.' cuotas de '.round($primatot4 * $factor4->porcentaje, 2);
        //                 $cuotdescD[$regcount] = (is_null($factor4->descripcion) || strlen($factor4->descripcion) == 0) ? '': '<br><span style="font-size: xx-small">'.$factor4->descripcion.'</span>';
        //             }
        //             $regcount++;
        //         }

        //         $regcount = 0;
        //         foreach ($factores5 as $factor5) {

        //             if (!is_null($productos5) || !is_null($hdi_prima)) {
        // //                $cuotasE[$regcount] = $factor5->porcentaje == 0 ? 'No': round($primatot5 * $factor5->porcentaje, 2);
        //                 $cuotasE[$regcount] = $factor5->porcentaje == 0 ? 'No': $factor5->numerocuota.' cuotas de '.round($primatot5 * $factor5->porcentaje, 2);
        //                 $cuotdescE[$regcount] = (is_null($factor5->descripcion) || strlen($factor5->descripcion) == 0) ? '': '<br><span style="font-size: xx-small">'.$factor5->descripcion.'</span>';
        //             }
        //             $regcount++;
        //         }

        // ------- FINANCIAMIENTO

        $cuotasRegistros = collect([]);

        $max_filas_financiamiento = $factores1->count();

        if ($factores2->count() > $max_filas_financiamiento) {
            $max_filas_financiamiento = $factores2->count();
        }

        if ($factores3->count() > $max_filas_financiamiento) {
            $max_filas_financiamiento = $factores3->count();
        }

        if ($factores4->count() > $max_filas_financiamiento) {
            $max_filas_financiamiento = $factores4->count();
        }

        if ($factores5->count() > $max_filas_financiamiento) {
            $max_filas_financiamiento = $factores5->count();
        }

        for ($i = 0; $i < ($max_filas_financiamiento); $i++) {
            $titulo = "Cuotas $";
            $cuotas1 = "";
            $cuotas2 = "";
            $cuotas3 = "";
            $cuotas4 = "";
            $cuotas5 = "";

            if ($i < $factores1->count()) {
                if (!is_null($productos1) || !is_null($pacifico_prima)) {
                    $cuotas1 = $factores1[$i]->porcentaje == 0 ? '' : $factores1[$i]->numerocuota . ' cuotas de ' . round($primatot1 * $factores1[$i]->porcentaje, 2);
                    $cuotas1 = $cuotas1 . ((is_null($factores1[$i]->descripcion) || strlen($factores1[$i]->descripcion) == 0) ? '' : '<br><span style="font-size: xx-small">' . $factores1[$i]->descripcion . '</span>');
                }
            }

            if ($i < $factores2->count()) {
                if (!is_null($productos2)) {
                    $cuotas2 = $factores2[$i]->porcentaje == 0 ? '' : $factores2[$i]->numerocuota . ' cuotas de ' . round($primatot2 * $factores2[$i]->porcentaje, 2);
                    $cuotas2 = $cuotas2 . ((is_null($factores2[$i]->descripcion) || strlen($factores2[$i]->descripcion) == 0) ? '' : '<br><span style="font-size: xx-small">' . $factores2[$i]->descripcion . '</span>');
                }
            }

            if ($i < $factores3->count()) {
                if (!is_null($productos3)) {
                    $cuotas3 = $factores3[$i]->porcentaje == 0 ? '' : $factores3[$i]->numerocuota . ' cuotas de ' . round($primatot3 * $factores3[$i]->porcentaje, 2);
                    $cuotas3 = $cuotas3 . ((is_null($factores3[$i]->descripcion) || strlen($factores3[$i]->descripcion) == 0) ? '' : '<br><span style="font-size: xx-small">' . $factores3[$i]->descripcion . '</span>');
                }
            }

            if ($i < $factores4->count()) {
                if (!is_null($productos4)) {
                    $cuotas4 = $factores4[$i]->porcentaje == 0 ? '' : $factores4[$i]->numerocuota . ' cuotas de ' . round($primatot4 * $factores4[$i]->porcentaje, 2);
                    $cuotas4 = $cuotas4 . ((is_null($factores4[$i]->descripcion) || strlen($factores4[$i]->descripcion) == 0) ? '' : '<br><span style="font-size: xx-small">' . $factores4[$i]->descripcion . '</span>');
                }
            }

            if ($i < $factores5->count()) {
                if (!is_null($productos5) || !is_null($hdi_prima)) {
                    $cuotas5 = $factores5[$i]->porcentaje == 0 ? '' : $factores5[$i]->numerocuota . ' cuotas de ' . round($primatot5 * $factores5[$i]->porcentaje, 2);
                    $cuotas5 = $cuotas5 . ((is_null($factores5[$i]->descripcion) || strlen($factores5[$i]->descripcion) == 0) ? '' : '<br><span style="font-size: xx-small">' . $factores5[$i]->descripcion . '</span>');
                }
            }

            $item_cuotas = ['titulo' => $titulo, 'col1' => $cuotas1, 'col2' => $cuotas2, 'col3' => $cuotas3, 'col4' => $cuotas4, 'col5' => $cuotas5];
            $cuotasRegistros->push($item_cuotas);
        }

        //        echo dd($cuotasRegistros);
        //        exit();
        // ------- FIN FINANCIAMIENTO

        /*$cuotas1 = (is_null($productos1))? 'No':(($productos1->is_diezcuotas > 0)?'10 cuotas de '.round($primatot1/10,2): (($productos1->is_seiscuotas > 0)?'6 cuotas de '.round($primatot1/6,2): (($productos1->is_cincocuotas > 0)?'5 cuotas de '.round($primatot1/5,2): (($productos1->is_cuatrocuotas > 0)?'4 cuotas de '.round($primatot1/4,2):'No'))));
        $cuotas2 = (is_null($productos2))? 'No':(($productos2->is_diezcuotas > 0)?'10 cuotas de '.round($primatot2/10,2): (($productos2->is_seiscuotas > 0)?'6 cuotas de '.round($primatot2/6,2): (($productos2->is_cincocuotas > 0)?'5 cuotas de '.round($primatot2/5,2): (($productos2->is_cuatrocuotas > 0)?'4 cuotas de '.round($primatot2/4,2):'No'))));
        $cuotas3 = (is_null($productos3))? 'No':(($productos3->is_diezcuotas > 0)?'10 cuotas de '.round($primatot3/10,2): (($productos3->is_seiscuotas > 0)?'6 cuotas de '.round($primatot3/6,2): (($productos3->is_cincocuotas > 0)?'5 cuotas de '.round($primatot3/5,2): (($productos3->is_cuatrocuotas > 0)?'4 cuotas de '.round($primatot3/4,2):'No'))));
        $cuotas4 = (is_null($productos4))? 'No':(($productos4->is_diezcuotas > 0)?'10 cuotas de '.round($primatot4/10,2): (($productos4->is_seiscuotas > 0)?'6 cuotas de '.round($primatot4/6,2): (($productos4->is_cincocuotas > 0)?'5 cuotas de '.round($primatot4/5,2): (($productos4->is_cuatrocuotas > 0)?'4 cuotas de '.round($primatot4/4,2):'No'))));
        $cuotas5 = (is_null($productos5))? 'No':(($productos5->is_diezcuotas > 0)?'10 cuotas de '.round($primatot5/10,2): (($productos5->is_seiscuotas > 0)?'6 cuotas de '.round($primatot5/6,2): (($productos5->is_cincocuotas > 0)?'5 cuotas de '.round($primatot5/5,2): (($productos5->is_cuatrocuotas > 0)?'4 cuotas de '.round($primatot5/4,2):'No'))));*/

        $gps1 = (is_numeric($cotdet1->is_gps) && $cotdet1->is_gps == 1) ? 'Si' : 'No';
        $gps2 = (is_numeric($cotdet2->is_gps) && $cotdet2->is_gps == 1) ? 'Si' : 'No';
        $gps3 = (is_numeric($cotdet3->is_gps) && $cotdet3->is_gps == 1) ? 'Si' : 'No';
        $gps4 = (is_numeric($cotdet4->is_gps) && $cotdet4->is_gps == 1) ? 'Si' : 'No';
        $gps5 = (is_numeric($cotdet5->is_gps) && $cotdet5->is_gps == 1) ? 'Si' : 'No';

        $conceptos_tipos = DB::table('conceptos_tipos')->where([['estado', '=', 'Activo']])->orderBy('orden', 'asc')->get();
        $conceptos = DB::select("select a.id as conceptos_tipos_id, b.id, b.descripcion, b.subtitulo from conceptos_tipos a inner join conceptos b on a.id = b.conceptos_tipos_id where b.estado='Activo' order by a.orden, b.orden ");
        $deducibles = collect([]);

        foreach ($conceptos as $concepto) {

            $deducibles1 = (DB::table('deducibles')->where([['productos_id', '=', $cotdet1->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_id', '=', $concepto->id]])->count() > 0) ? (DB::table('deducibles')->where([['productos_id', '=', $cotdet1->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_id', '=', $concepto->id]])->pluck('descripcion')) : (DB::table('deducibles')->where([['productos_id', '=', $cotdet1->productos_id], ['conceptos_id', '=', $concepto->id]])->whereNull('modelos_id')->pluck('descripcion'));
            $deducibles2 = (DB::table('deducibles')->where([['productos_id', '=', $cotdet2->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_id', '=', $concepto->id]])->count() > 0) ? (DB::table('deducibles')->where([['productos_id', '=', $cotdet2->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_id', '=', $concepto->id]])->pluck('descripcion')) : (DB::table('deducibles')->where([['productos_id', '=', $cotdet2->productos_id], ['conceptos_id', '=', $concepto->id]])->whereNull('modelos_id')->pluck('descripcion'));
            $deducibles3 = (DB::table('deducibles')->where([['productos_id', '=', $cotdet3->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_id', '=', $concepto->id]])->count() > 0) ? (DB::table('deducibles')->where([['productos_id', '=', $cotdet3->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_id', '=', $concepto->id]])->pluck('descripcion')) : (DB::table('deducibles')->where([['productos_id', '=', $cotdet3->productos_id], ['conceptos_id', '=', $concepto->id]])->whereNull('modelos_id')->pluck('descripcion'));
            $deducibles4 = (DB::table('deducibles')->where([['productos_id', '=', $cotdet4->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_id', '=', $concepto->id]])->count() > 0) ? (DB::table('deducibles')->where([['productos_id', '=', $cotdet4->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_id', '=', $concepto->id]])->pluck('descripcion')) : (DB::table('deducibles')->where([['productos_id', '=', $cotdet4->productos_id], ['conceptos_id', '=', $concepto->id]])->whereNull('modelos_id')->pluck('descripcion'));
            $deducibles5 = (DB::table('deducibles')->where([['productos_id', '=', $cotdet5->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_id', '=', $concepto->id]])->count() > 0) ? (DB::table('deducibles')->where([['productos_id', '=', $cotdet5->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_id', '=', $concepto->id]])->pluck('descripcion')) : (DB::table('deducibles')->where([['productos_id', '=', $cotdet5->productos_id], ['conceptos_id', '=', $concepto->id]])->whereNull('modelos_id')->pluck('descripcion'));

            if ($deducibles1->count() > 0 || $deducibles2->count() > 0 || $deducibles3->count() > 0 || $deducibles4->count() > 0 || $deducibles5->count() > 0) {

                $item_deducible = ['conceptos_tipos_id' => $concepto->conceptos_tipos_id, 'subtitulo' => $concepto->subtitulo, 'concepto' => $concepto->descripcion, 'col1' => $deducibles1->implode('<br>'), 'col2' => $deducibles2->implode('<br>'), 'col3' => $deducibles3->implode('<br>'), 'col4' => $deducibles4->implode('<br>'), 'col5' => $deducibles5->implode('<br>')];
                $deducibles->push($item_deducible);
            }
        }

        $deducibles1 = (DB::table('deducibles')->where([['productos_id', '=', $cotdet1->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_tipos_id', '=', 2]])->count() > 0) ? (DB::table('deducibles')->where([['productos_id', '=', $cotdet1->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_tipos_id', '=', 2]])->pluck('descripcion')) : (DB::table('deducibles')->where([['productos_id', '=', $cotdet1->productos_id], ['conceptos_tipos_id', '=', 2]])->whereNull('modelos_id')->pluck('descripcion'));
        $deducibles2 = (DB::table('deducibles')->where([['productos_id', '=', $cotdet2->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_tipos_id', '=', 2]])->count() > 0) ? (DB::table('deducibles')->where([['productos_id', '=', $cotdet2->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_tipos_id', '=', 2]])->pluck('descripcion')) : (DB::table('deducibles')->where([['productos_id', '=', $cotdet2->productos_id], ['conceptos_tipos_id', '=', 2]])->whereNull('modelos_id')->pluck('descripcion'));
        $deducibles3 = (DB::table('deducibles')->where([['productos_id', '=', $cotdet3->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_tipos_id', '=', 2]])->count() > 0) ? (DB::table('deducibles')->where([['productos_id', '=', $cotdet3->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_tipos_id', '=', 2]])->pluck('descripcion')) : (DB::table('deducibles')->where([['productos_id', '=', $cotdet3->productos_id], ['conceptos_tipos_id', '=', 2]])->whereNull('modelos_id')->pluck('descripcion'));
        $deducibles4 = (DB::table('deducibles')->where([['productos_id', '=', $cotdet4->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_tipos_id', '=', 2]])->count() > 0) ? (DB::table('deducibles')->where([['productos_id', '=', $cotdet4->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_tipos_id', '=', 2]])->pluck('descripcion')) : (DB::table('deducibles')->where([['productos_id', '=', $cotdet4->productos_id], ['conceptos_tipos_id', '=', 2]])->whereNull('modelos_id')->pluck('descripcion'));
        $deducibles5 = (DB::table('deducibles')->where([['productos_id', '=', $cotdet5->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_tipos_id', '=', 2]])->count() > 0) ? (DB::table('deducibles')->where([['productos_id', '=', $cotdet5->productos_id], ['modelos_id', '=', $cotizacion->modelos_id], ['conceptos_tipos_id', '=', 2]])->pluck('descripcion')) : (DB::table('deducibles')->where([['productos_id', '=', $cotdet5->productos_id], ['conceptos_tipos_id', '=', 2]])->whereNull('modelos_id')->pluck('descripcion'));

        $data = compact(
            'marca',
            'modelo',
            'aniofabricacion',
            'valormercado',
            'uso',
            'nombreprospecto',
            'cotizacion_id',
            'responsable',
            'logo_cotizacion',
            'telefono_cotizacion',
            'subagente',
            'validezini',
            'validezfin',
            'logo1',
            'logo2',
            'logo3',
            'logo4',
            'logo5',
            'prima1',
            'prima2',
            'prima3',
            'prima4',
            'prima5',
            'gps1',
            'gps2',
            'gps3',
            'gps4',
            'gps5',
            // 'cuotasA','cuotasB','cuotasC','cuotasD','cuotasE',
            'table_column_width',
            'table_td_colspan',
            'col2_display',
            'col3_display',
            'col4_display',
            'col5_display',
            'col6_display',
            'deducibles',
            'conceptos_tipos',
            'deducibles1',
            'deducibles2',
            'deducibles3',
            'deducibles4',
            'deducibles5',
            'emailresponsable',
            'emailprospecto',
            'celularprospecto',
            'region',
            'observacion',
            'convertidogas',
            'pacifico_prima',
            'pacifico_cuotas_1',
            'pacifico_cuotas_2',
            'pacifico_cuotas_3',
            'hdi_prima',
            'hdi_cuotas_1',
            'hdi_cuotas_2',
            'hdi_cuotas_3',
            // 'cuotdescA','cuotdescB','cuotdescC','cuotdescD','cuotdescE',
            'cotizacion',
            'cuotasRegistros'
        );

        return $data;
    }

    //new get Data by id
    public function getDataQuotationNew($id)
    {
        //sp_get_cotizacion_by_id
        $query = 'call sp_get_cotizacion_by_id(?);';
        $params = [$id];
        $data = DB::selectOne($query, $params);

        $companies = json_decode($data->companies);
        $companies_history = json_decode($data->companies_history);

        $data->companies = $companies_history == null ? $companies : $companies_history;
        $data->companies_history = $companies_history;

        // $data->companies = $companies;

        // return $data;


        // $data->companies = collect($data->companies)->sortBy('company_id')->values()->all();

        //extract coberturas
        $coberturas = collect([]);
        // $factores = collect([]);
        foreach ($data->companies_history as $company) {
            if (isset($company->coberturas)) {
                foreach ($company->coberturas as $cobertura) {
                    $item_cobertura = [
                        'concepto_id' => $cobertura->concepto_id,
                        'name' => $cobertura->name,
                        'description' => $cobertura->description
                    ];
                    $coberturas->push($item_cobertura);
                }
            }
        }
        //filtrar unicos
        $coberturas = array_values($coberturas->unique('concepto_id')->all());
        //eliminar los que tienen concepto_id null
        $coberturas = array_filter($coberturas, function ($item) {
            return $item['concepto_id'] != null;
        });
        $data->coberturas = $coberturas;

        //extract deducibles
        $deducibles = collect([]);
        foreach ($data->companies_history as $company) {
            if (isset($company->deducibles)) {
                foreach ($company->deducibles as $deducible) {
                    $item_deducible = [
                        'concepto_id' => $deducible->concepto_id,
                        'name' => $deducible->name,
                        'description' => $deducible->description
                    ];
                    $deducibles->push($item_deducible);
                }
            }
        }
        $deducibles = array_values($deducibles->unique('concepto_id')->all());
        $data->deducibles = $deducibles;

        $logo_cotizacion = CRUDBooster::getSetting('quotation_logo');

        //logo logo_cotizacion
        $path_logo_cotizacion = public_path($logo_cotizacion);
        $type_logo_cotizacion = pathinfo($path_logo_cotizacion, PATHINFO_EXTENSION);
        $data_logo_cotizacion = file_get_contents($path_logo_cotizacion);
        $base64_logo_cotizacion = 'data:image/' . $type_logo_cotizacion . ';base64,' . base64_encode($data_logo_cotizacion);


        // de data->companies[index]->factores
        $max_factores = array_reduce($data->companies, function ($carry, $item) {
            return count($item->factores) > $carry ? count($item->factores) : $carry;
        }, 0);
        //  deducibles, is_gps, logo
        foreach ($data->companies as $key => $company) {
            if ($company->company_id == 2) {
                $data->pacifico_prima != null && ($data->companies[$key]->primatotal = $data->pacifico_prima);
            }
            if ($company->company_id == 4) {
                $data->hdi_prima != null && ($data->companies[$key]->primatotal = $data->hdi_prima);
            }
            //crear tabla con coberturas, en caso no encuentre coberturas poner un texto que diga "No hay coberturas"
            $new_coberturas = collect([]);
            $coberturas_company = collect($company->coberturas);
            foreach ($coberturas as $cobertura) {
                //exist cobertura en $coberturas_company
                $cobertura_exist = $coberturas_company->where('concepto_id', $cobertura['concepto_id'])->first();
                if ($cobertura_exist) {
                    $new_coberturas->push([
                        'name' => $cobertura['name'],
                        'concepto_id' => $cobertura['concepto_id'],
                        'description' => $cobertura_exist->description
                    ]);
                } else {
                    $new_coberturas->push([
                        'name' => null,
                        'concepto_id' => null,
                        'description' => null
                    ]);
                }
            }
            $data->companies[$key]->coberturas = $new_coberturas;

            //crear tabla con deducibles, en caso no encuentre deducibles poner un texto que diga "No hay deducibles"
            $new_deducibles = collect([]);
            $deducibles_company = collect($company->deducibles);
            foreach ($deducibles as $deducible) {
                //exist deducible en $deducibles_company
                $deducible_exist = $deducibles_company->where('concepto_id', $deducible['concepto_id'])->first();
                if ($deducible_exist) {
                    $new_deducibles->push([
                        'name' => $deducible['name'],
                        'concepto_id' => $deducible['concepto_id'],
                        'description' => $deducible_exist->description
                    ]);
                } else {
                    $new_deducibles->push([
                        'name' => null,
                        'concepto_id' => null,
                        'description' => null
                    ]);
                }
            }
            $data->companies[$key]->deducibles = $new_deducibles;

            //si los factores son menores al max, agregar en blanco
            $new_factores = collect([]);
            foreach ($company->factores as $factor) {
                $new_factores->push([
                    'id' => $factor->id,
                    'cuota' => $factor->cuota,
                    'percentage' => $factor->percentage,
                    'description' => $factor->description,
                    'text_description' => $factor->description,
                    'text_cuota' => "$factor->cuota cuotas de " . round($company->primatotal * $factor->percentage, 2)
                ]);
            }
            for ($i = count($company->factores); $i < $max_factores; $i++) {
                $new_factores->push([
                    'id' => null,
                    'cuota' => null,
                    'percentage' => null,
                    'description' => null,
                    'text_description' => null,
                    'text_cuota' => null
                ]);
            }
            $data->companies[$key]->factores = $new_factores;

            $data->companies[$key]->deducibles = count($data->companies[$key]->deducibles) > 0 ? $data->companies[$key]->deducibles : [];
            $data->companies[$key]->is_gps = $data->companies[$key]->is_gps == 1 ? 'Si' : 'No';

            //generate logo base64
            $path_logo = public_path($company->company_logo);
            $type_logo = pathinfo($path_logo, PATHINFO_EXTENSION);
            $data_logo = file_get_contents($path_logo);
            $base64_logo = 'data:image/' . $type_logo . ';base64,' . base64_encode($data_logo);
            $data->companies[$key]->company_logo_base64 = $base64_logo;
        }

        $data->count_cols = count($data->companies) + 1;
        $data->width_col = 100 / (count($data->companies) + 1);

        $data->validezini = date('d/m/Y', strtotime($data->created_at));
        $data->validezfin = date('d/m/Y', strtotime($data->validezfin . ' + 2 days'));
        $data->cotizacion_id = str_pad($data->cotizacion_id, 10, "0", STR_PAD_LEFT);

        $data->logo_cotizacion = $base64_logo_cotizacion;
        $data->base64_redes_sociales = $this->getBaseRedesSociales();

        return $data;
    }

    public function getBaseRedesSociales()
    {
        $facebook_path = public_path('images/ico_face.png');
        $facebook_type = pathinfo($facebook_path, PATHINFO_EXTENSION);
        $facebook_data = file_get_contents($facebook_path);
        $facebook_base64 = 'data:image/' . $facebook_type . ';base64,' . base64_encode($facebook_data);

        $instagram_path = public_path('images/ico_instagram.png');
        $instagram_type = pathinfo($instagram_path, PATHINFO_EXTENSION);
        $instagram_data = file_get_contents($instagram_path);
        $instagram_base64 = 'data:image/' . $instagram_type . ';base64,' . base64_encode($instagram_data);

        $linkedin_path = public_path('images/ico_linkedin.png');
        $linkedin_type = pathinfo($linkedin_path, PATHINFO_EXTENSION);
        $linkedin_data = file_get_contents($linkedin_path);
        $linkedin_base64 = 'data:image/' . $linkedin_type . ';base64,' . base64_encode($linkedin_data);

        return [
            'facebook' => $facebook_base64,
            'instagram' => $instagram_base64,
            'linkedin' => $linkedin_base64
        ];
    }

    public static function getUserIdByEmail($email)
    {

        $query = DB::table('cms_users')->where('email', '=', $email)->first();

        return $query->id;
    }

    public function getModelosByMarcaId($id)
    {


        return DB::table('modelos')->where('marcas_id', $id)->orderBy('nombre', 'asc')->get();
    }

    public function getModelo($id)
    {

        return DB::table('modelos')->where('id', $id)->get();
    }

    public function getModeloProducto($modelos_id, $companias_id, $usos_id)
    {

        return DB::table('modelos_productos')->where([['modelos_id', '=', $modelos_id], ['companias_id', '=', $companias_id], ['usos_id', '=', $usos_id]])->get();
    }

    public static function getTemplateByQuotationId($id)
    {

        $usos_id = DB::table('cotizaciones')->where('id', $id)->value('usos_id');

        return DB::table('usos')->where('id', $usos_id)->value('template');
    }

    public static function getIsChinoByQuotationId($id)
    {

        $marcas_id = DB::table('cotizaciones')->where('id', $id)->value('marcas_id');

        return DB::table('marcas')->where('id', $marcas_id)->value('is_chino');
    }

    public function sendattachexample()
    {
        //        $id = 2;
        //        $plantilla = self::getTemplateByQuotationId($id);
        //        $data = self::getDataQuotation($id);
        //        $pdf = PDF::loadView($plantilla,$data)->save('quotation/cotizacion.pdf');

        $files = [];
        //$files[] = 'quotation/cotizacion.pdf'; //$files[] = public_path(). '/uploads/2017-04/rimac.png';
        $data = ['name' => 'John Done', 'email' => 'john@gmail.com'];
        CRUDBooster::sendEmail(['to' => 'calebsc@gmail.com', 'data' => $data, 'template' => 'send_quotation', 'attachments' => $files]);
        return "ok";
    }

    public function send(Request $request)
    {
        $email_quotation_alert = DB::table('cms_settings')->where('name', 'email_quotation_alert')->value('content');

        $files = [];
        //$files[] = 'quotation/cotizacion.pdf'; //$files[] = public_path(). '/uploads/2017-04/rimac.png';
        $data = ['name' => $request->name, 'email' => $request->email, 'phone' => $request->phone, 'message' => $request->message];
        CRUDBooster::sendEmail(['to' => $email_quotation_alert, 'data' => $data, 'template' => 'contact_form', 'attachments' => $files]);

        $appname = CRUDBooster::getSetting('appname');
        Alert::success('Gracias por comunicarte con nosotros. Uno de nuestros ejecutivos se pondrá en contacto contigo.', 'Gracias por confiar en ' . $appname)->persistent("Cerrar");
        return redirect('/');
    }

    public static function sendQuotationByEmail($id)
    {
        $query = DB::table('cotizaciones')->where('id', $id)->first();
        $query2 = DB::table('cms_users')->where('id', $query->cms_users_id)->first();
        $outputName = str_random(10);
        $plantilla = self::getTemplateByQuotationId($id);
        $chino = self::getIsChinoByQuotationId($id) ? "_chino" : "";
        $data = self::getDataQuotation($id);
        $pdf = PDF::loadView($plantilla . $chino, $data);

        //############ Permitir ver imagenes si falla ################################
        //        $contxt = stream_context_create([
        //            'ssl' => [
        //                'verify_peer' => FALSE,
        //                'verify_peer_name' => FALSE,
        //                'allow_self_signed' => TRUE,
        //            ]
        //        ]);
        //
        ////        $pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        //        $pdf->setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        //        $pdf->getDomPDF()->setHttpContext($contxt);
        //#################################################################################

        $pdf->save('quotation/' . $outputName . '.pdf');

        //$files = [];
        $files[] = 'quotation/' . $outputName . '.pdf'; //$files[] = public_path(). '/uploads/2017-04/rimac.png';
        $data = ['name' => $query->nombreprospecto, 'email' => $query->email, 'executive' => $query2->name, 'email_executive' => $query2->email];
        CRUDBooster::sendEmail(['to' => $query->email, 'data' => $data, 'template' => 'send_quotation2', 'attachments' => $files]);
        return "ok";
    }

    public static function createPDF($id)
    {
        //        $query = DB::table('cotizaciones')->where('id',$id)->first();
        //        $query2 = DB::table('cms_users')->where('id',$query->cms_users_id)->first();
        // $usos_id = DB::table('cotizaciones')->where([['id','=',$id]])->value('usos_id');

        $outputName = str_pad($id, 10, "0", STR_PAD_LEFT); //str_random(10);
        $plantilla = self::getTemplateByQuotationId($id);
        $chino = self::getIsChinoByQuotationId($id) ? "_chino" : "";
        $data = self::getDataQuotation($id);

        // if ($usos_id == 7) {
        //     $pdf = PDF::loadView($plantilla.$chino,$data)->setPaper('a3')->save('quotation/'.$outputName.'.pdf');
        // } else {
        $pdf = PDF::loadView($plantilla . $chino, $data);

        //############ Permitir ver imagenes si falla ################################
        //        $contxt = stream_context_create([
        //            'ssl' => [
        //                'verify_peer' => FALSE,
        //                'verify_peer_name' => FALSE,
        //                'allow_self_signed' => TRUE,
        //            ]
        //        ]);
        //
        ////        $pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        //        $pdf->setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        //        $pdf->getDomPDF()->setHttpContext($contxt);
        //#################################################################################

        $pdf->save('quotation/' . $outputName . '.pdf');
        // }

        $file = asset('quotation/' . $outputName . '.pdf');
        return $file;
    }
}
