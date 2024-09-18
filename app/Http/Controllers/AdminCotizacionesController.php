<?php

namespace App\Http\Controllers;

use App\Exports\CotizacionesExport;
use Carbon\Carbon;
use Illuminate\Http\Request as PostRequest;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Request;
use DB;
use CRUDBooster;
//	use Excel;
use App\Http\Controllers\HomeController as Home;
use App\Traits\PdfTrait;

class AdminCotizacionesController extends \crocodicstudio\crudbooster\controllers\CBController
{

    use PdfTrait;

    public function cbInit()
    {

        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->title_field = "id";
        $this->limit = "20";
        $this->orderby = "id,desc";
        $this->global_privilege = false;
        $this->button_table_action = true;
        $this->button_bulk_action = true;
        $this->button_action_style = "button_icon";
        $this->button_add = true;
        $this->button_edit = true;
        $this->button_delete = true;
        $this->button_detail = true;
        $this->button_show = false;
        $this->button_filter = true;
        $this->button_import = false;
        $this->button_export = true;
        $this->table = "cotizaciones";

        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];
        $this->col[] = ["label" => "#Cot", "name" => "id"];
        $this->col[] = ["label" => "Fecha", "name" => "created_at"];
        #$this->col[] = ["label"=>"Seguro","name"=>"seguros_id","join"=>"seguros,nombre"];
        $this->col[] = ["label" => "Responsable", "name" => "cms_users_id", "join" => "cms_users,name"];
        $this->col[] = ["label" => "Marca", "name" => "marcas_id", "join" => "marcas,nombre"];
        $this->col[] = ["label" => "Modelo", "name" => "modelos_id", "join" => "modelos,nombre"];
        $this->col[] = ["label" => "Fabricación", "name" => "aniofabricacion"];
        // 			$this->col[] = ["label"=>"Uso - Tipo","name"=>"usos_id","join"=>"usos,nombre"];
        $this->col[] = ["label" => "Tienda", "name" => "subagentes_id", "join" => "subagentes,nombre"];
        $this->col[] = ["label" => "Prospecto", "name" => "nombreprospecto"];
        $this->col[] = ["label" => "Estado", "name" => "estado"];
        # END COLUMNS DO NOT REMOVE THIS LINE

        $bloquear_soat = true;

        if (CRUDBooster::getCurrentMethod() == 'getEdit') {

            Session::forget('current_row_id');
            $currentId = CRUDBooster::getCurrentId();

            $cotizacion = DB::table('cotizaciones')
                ->where('id', '=', $currentId)
                ->first();

            if ($cotizacion) {
                if ($cotizacion->is_soat == 1) {
                    $bloquear_soat = false;
                }
            }
        }


        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        $this->form[] = ['label' => 'Seguro', 'name' => 'seguros_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-4', 'datatable' => 'seguros,nombre', 'disabled' => (CRUDBooster::getCurrentMethod() == 'getEdit') ? true : false, 'value' => 1];
        $this->form[] = [
            'label' => 'Responsable',
            'name' => 'cms_users_id',
            'type' => 'select2',
            'validation' => 'required|integer|min:0',
            'width' => 'col-sm-4',
            'datatable' => 'cms_users,name',
            'datatable_where' => (CRUDBooster::isSuperadmin()) ? '' : (
                (CRUDBooster::myPrivilegeName() == 'Administrador') ? 'id_cms_privileges>1' : (
                    (CRUDBooster::myPrivilegeName() == 'Administrador Dealer') ? 'id in (' . self::mySubAgenteUsers() . ')' : 'id=' . CRUDBooster::myId()
                )
            ),
            'disabled' => (CRUDBooster::getCurrentMethod() == 'getAdd') ? false : ((CRUDBooster::myPrivilegeName() == "Ventas") ? true : false),
            'value' => CRUDBooster::myId()
        ];
        $this->form[] = ['label' => 'Tienda', 'name' => 'subagentes_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-4', 'datatable' => 'subagentes,nombre', 'value' => self::mySubAgente()];
        // 			$this->form[] = ['label'=>'Compañia','name'=>'companias_id','type'=>'select','validation'=>'integer|min:0','width'=>'col-sm-4','datatable'=>'companias,nombre',
        // 			    'datatable_where'=>(CRUDBooster::isSuperadmin())?'':
        // 			        (
        // 			            (CRUDBooster::myPrivilegeName() == 'Administrador')?'':'id in ('.self::myPlanCompanias().')'
        // 			        ),
        // 			    'disabled'=>(CRUDBooster::getCurrentMethod() == 'getEdit')?true:false,'default'=>'** Todas'];
        // 			$this->form[] = ['label'=>'Compañias','name'=>'Companias','type'=>'select2','datatable'=>'companias,nombre','relationship_table'=>'usos_companias','width'=>'col-sm-5','help'=>'Seleccionar solo si desea cotizar algunas compañias. De lo contrario dejar en blanco.','disabled'=>(CRUDBooster::getCurrentMethod() == 'getEdit')?true:false];
        $this->form[] = ['label' => 'Compañias', 'name' => 'Companias', 'type' => 'select2', 'datatable' => 'companias,nombre', 'relationship_table' => 'usos_companias', 'width' => 'col-sm-5', 'help' => 'Seleccionar solo si desea cotizar algunas compañias. De lo contrario dejar en blanco.'];
        //$this->form[] = ['label'=>'Marca','name'=>'marcas_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-4','datatable'=>'marcas,nombre','disabled'=>(CRUDBooster::getCurrentMethod() == 'getEdit')?true:false];
        $this->form[] = ['label' => 'Marca', 'name' => 'marcas_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-4', 'datatable' => 'marcas,nombre'];
        //$this->form[] = ['label'=>'Modelo','name'=>'modelos_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-4','datatable'=>'modelos,nombre','parent_select'=>'marcas_id','disabled'=>(CRUDBooster::getCurrentMethod() == 'getEdit')?true:false];
        $this->form[] = ['label' => 'Modelo', 'name' => 'modelos_id', 'type' => 'select', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-4', 'datatable' => 'modelos,nombre', 'parent_select' => 'marcas_id'];
        // 			$this->form[] = ['label'=>'Año Fabricación','name'=>'aniofabricacion','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-3','readonly'=>(CRUDBooster::getCurrentMethod() == 'getEdit')?true:false];
        $this->form[] = ['label' => 'Año Fabricación', 'name' => 'aniofabricacion', 'type' => 'number', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-3'];
        // $this->form[] = ['label'=>'Plan','name'=>'planes_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-4','datatable'=>'planes,nombre','value'=>self::myPlan(),'disabled'=>(CRUDBooster::getCurrentMethod() == 'getEdit' || self::myPlan() != null)?true:false];
        $this->form[] = ['label' => 'Plan', 'name' => 'planes_id', 'type' => 'select', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-4', 'datatable' => 'planes,nombre', 'value' => self::myPlan()];
        // 			$this->form[] = ['label'=>'Uso','name'=>'usos_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-4','datatable'=>'usos,nombre','datatable_where'=>"estado='Activo'",'parent_select'=>'planes_id','disabled'=>(CRUDBooster::getCurrentMethod() == 'getEdit')?true:false];
        //			$this->form[] = ['label'=>'Uso','name'=>'usos_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-4','datatable'=>'usos,nombre','datatable_where'=>"estado='Activo'",'parent_select'=>'planes_id'];
        $this->form[] = ['label' => 'Uso', 'name' => 'usos_id', 'type' => 'select', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-4', 'datatable' => 'usos,nombre', 'parent_select' => 'planes_id'];
        // 			$this->form[] = ['label'=>'Valor Mercado $','name'=>'valormercado','type'=>'money','validation'=>'required|integer|min:0','width'=>'col-sm-3','readonly'=>(CRUDBooster::getCurrentMethod() == 'getEdit')?true:false];
        $this->form[] = ['label' => 'Valor Mercado $', 'name' => 'valormercado', 'type' => 'money', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-3'];
        $this->form[] = ['label' => 'Convertido a gas', 'name' => 'is_convertidogas', 'type' => 'radio', 'validation' => 'required|integer', 'width' => 'col-sm-3', 'dataenum' => '1|Si;0|No', 'value' => '0'];
        $this->form[] = ['label' => 'Vehículo es cero km.', 'name' => 'is_comonuevo', 'type' => 'radio', 'validation' => 'required|integer', 'width' => 'col-sm-3', 'dataenum' => '1|Si;0|No', 'value' => '0'];
        $this->form[] = ['label' => 'Ofrecer Soat', 'name' => 'is_soat', 'type' => 'radio', 'validation' => 'required|integer', 'width' => 'col-sm-3', 'dataenum' => '1|Si;0|No', 'value' => '0'];
        $this->form[] = ['label' => 'Monto Soat Pacifico $', 'name' => 'monto_soat1', 'type' => 'number', 'validation' => 'numeric|min:0', 'step' => 'any', 'width' => 'col-sm-3', 'value' => '0', 'disabled' => $bloquear_soat];
        $this->form[] = ['label' => 'Monto Soat Positiva $', 'name' => 'monto_soat2', 'type' => 'number', 'validation' => 'numeric|min:0', 'step' => 'any', 'width' => 'col-sm-3', 'value' => '0', 'disabled' => $bloquear_soat];
        $this->form[] = ['label' => 'Monto Soat Rimac $', 'name' => 'monto_soat3', 'type' => 'number', 'validation' => 'numeric|min:0', 'step' => 'any', 'width' => 'col-sm-3', 'value' => '0', 'disabled' => $bloquear_soat];
        $this->form[] = ['label' => 'Monto Soat Mapfre $', 'name' => 'monto_soat4', 'type' => 'number', 'validation' => 'numeric|min:0', 'step' => 'any', 'width' => 'col-sm-3', 'value' => '0', 'disabled' => $bloquear_soat];
        $this->form[] = ['label' => 'Monto Soat Qualitas $', 'name' => 'monto_soat5', 'type' => 'number', 'validation' => 'numeric|min:0', 'step' => 'any', 'width' => 'col-sm-3', 'value' => '0', 'disabled' => $bloquear_soat];
        $this->form[] = ['label' => 'Prospecto', 'name' => 'nombreprospecto', 'type' => 'text', 'validation' => 'required|min:1|max:100', 'width' => 'col-sm-5'];
        //documento
        $this->form[] = ['label' => 'Tipo de Documento', 'name' => 'tipo_documento', 'type' => 'radio', 'validation' => 'required|integer', 'width' => 'col-sm-3', 'dataenum' => '1|DNI;2|RUC;3|OTROS', 'value' => '1'];
        // require select tipo_documento
        $this->form[] = ['label' => 'Documento', 'name' => 'documento', 'type' => 'text', 'validation' => 'required|numeric|digits_between:1,20', 'width' => 'col-sm-3', 'placeholder' => 'Ingrese su documento'];
        $this->form[] = ['label' => 'Edad', 'name' => 'edad', 'type' => 'number', 'validation' => 'required|integer|min:0|max:99', 'width' => 'col-sm-3', 'value' => '0'];
        $this->form[] = ['label' => 'Celular', 'name' => 'celular', 'type' => 'text', 'validation' => 'required|regex:/^[0-9\-\(\)\s]+$/|max:15', 'width' => 'col-sm-3'];
        $this->form[] = ['label' => 'Email', 'name' => 'email', 'type' => 'email', 'validation' => 'required|min:1|max:200|email', 'width' => 'col-sm-5', 'placeholder' => 'Por favor ingrese un email válido'];
        $this->form[] = ['label' => 'Region', 'name' => 'region', 'type' => 'radio', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-4', 'dataenum' => 'Lima;Provincia', 'value' => 'Lima'];
        //$this->form[] = ['label'=>'Estado','name'=>'estado','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Pendiente;Seguimiento;Rechazado;Aceptado','value'=>'Pendiente'];
        $this->form[] = ['label' => 'Estado', 'name' => 'estado', 'type' => 'radio', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-3', 'dataenum' => 'Seguimiento;Rechazado;Aceptado', 'value' => 'Seguimiento'];
        $this->form[] = ['label' => 'Observacion', 'name' => 'observacion', 'type' => 'textarea', 'validation' => '', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Desea recibir novedades', 'name' => 'is_mailing', 'type' => 'radio', 'validation' => 'required|integer', 'width' => 'col-sm-10', 'dataenum' => '1|Si;0|No', 'value' => '0'];
        if (self::myPlan() != 2) {
            $this->form[] = ["label" => "Prima Total Contado $", "type" => "header", "name" => "pacifico_prima"];
            $this->form[] = ['label' => 'Pacifico $', 'name' => 'pacifico_prima', 'type' => 'text', 'validation' => 'max:50', 'width' => 'col-sm-4', 'help' => 'Disponible para plan corporativo y maqfin'];
            $this->form[] = ['label' => 'Qualitas $', 'name' => 'hdi_prima', 'type' => 'text', 'validation' => 'max:50', 'width' => 'col-sm-4', 'help' => 'Disponible para plan corporativo y maqfin'];
        }

        // 			$this->form[] = ['label'=>'Pacifico - Cuotas $ sin intereses','name'=>'pacifico_cuotas_1','type'=>'text','validation'=>'max:100','width'=>'col-sm-10','help'=>'Solo disponible para plan corporativo'];
        // 			$this->form[] = ['label'=>'Pacifico - Cuotas $ sin intereses','name'=>'pacifico_cuotas_2','type'=>'text','validation'=>'max:100','width'=>'col-sm-10','help'=>'Solo disponible para plan corporativo'];
        // 			$this->form[] = ['label'=>'Pacifico - Cuotas $ sin intereses','name'=>'pacifico_cuotas_3','type'=>'text','validation'=>'max:100','width'=>'col-sm-10','help'=>'Solo disponible para plan corporativo'];
        // 			$this->form[] = ['label'=>'Hdi - Cuotas $ sin intereses','name'=>'hdi_cuotas_1','type'=>'text','validation'=>'max:100','width'=>'col-sm-10','help'=>'Solo disponible para plan corporativo'];
        // 			$this->form[] = ['label'=>'Hdi - Cuotas $ sin intereses','name'=>'hdi_cuotas_2','type'=>'text','validation'=>'max:100','width'=>'col-sm-10','help'=>'Solo disponible para plan corporativo'];
        // 			$this->form[] = ['label'=>'Hdi - Cuotas $ sin intereses','name'=>'hdi_cuotas_3','type'=>'text','validation'=>'max:100','width'=>'col-sm-10','help'=>'Solo disponible para plan corporativo'];
        # END FORM DO NOT REMOVE THIS LINE

        # OLD START FORM
        //$this->form = [];
        //$this->form[] = ['label'=>'Seguro','name'=>'seguros_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'seguros,nombre'];
        //$this->form[] = ['label'=>'Responsable','name'=>'cms_users_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cms_users,name'];
        //$this->form[] = ['label'=>'Marca','name'=>'marcas_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'marcas,nombre'];
        //$this->form[] = ['label'=>'Modelo','name'=>'modelos_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'modelos,nombre','parent_select'=>'marcas_id'];
        //$this->form[] = ['label'=>'Año Fabricación','name'=>'aniofabricacion','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Uso','name'=>'usos_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'usos,nombre'];
        //$this->form[] = ['label'=>'Valor Mercado $','name'=>'valormercado','type'=>'money','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Convertido a gas','name'=>'is_convertidogas','type'=>'radio','validation'=>'required|integer','width'=>'col-sm-10','dataenum'=>'1|Si;0|No'];
        //$this->form[] = ['label'=>'Prospecto','name'=>'nombreprospecto','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Edad','name'=>'edad','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Celular','name'=>'celular','type'=>'text','validation'=>'required|min:1|max:50','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required|min:1|max:200','width'=>'col-sm-10','placeholder'=>'Please enter a valid email address'];
        //$this->form[] = ['label'=>'Region','name'=>'region','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','style'=>'Lima;Provincia'];
        //$this->form[] = ['label'=>'Estado','name'=>'estado','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','style'=>'Pendiente;Seguimiento;Rechazado;Aceptado'];
        //$this->form[] = ['label'=>'Observacion','name'=>'observacion','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Desea recibir novedades','name'=>'is_mailing','type'=>'radio','validation'=>'required|integer','width'=>'col-sm-10','dataenum'=>'1|Si;0|No'];
        # OLD END FORM

        /* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
        $this->sub_module = array();
        if (CRUDBooster::myPrivilegeName() == "Super Administrator" || CRUDBooster::myPrivilegeName() == "Administrador") {

            $this->sub_module[] = ['label' => 'Detalles', 'path' => 'cotizaciones_detalles', 'parent_columns' => 'nombreprospecto,edad,celular,email,region,estado,observacion', 'foreign_key' => 'cotizaciones_id', 'button_color' => 'success', 'button_icon' => 'fa fa-bars'];
        }

        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
        $this->addaction = array();
        $this->addaction[] = ['label' => 'PDF', 'icon' => 'fa fa-file-pdf-o', 'color' => 'danger', 'url' => url('showpdf') . '/[id]', 'target' => '_blank'];
        $this->addaction[] = ['label' => 'Email', 'icon' => 'fa fa-envelope-o', 'color' => 'info', 'url' => CRUDBooster::mainpath('send-quotation/[id]'), 'confirmation' => true];


        //addaction redirect google.com
        // $this->addaction[] = ['label'=>'Google','icon'=>'fa fa-google','color'=>'success','url'=>'http://www.google.com','target'=>'_blank'];


        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
        $this->button_selected = array();


        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
        $this->alert        = array();



        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
        $this->index_button = array();

        $return_url = '/admin/cotizaciones/add?return_url=' . CRUDBooster::mainpath($slug = NULL) . '&parent_id=&parent_field=';

        if (CRUDBooster::getCurrentMethod() == 'getIndex') {
            $this->index_button[] = ['label' => 'Cotizar', 'url' => url($return_url), "icon" => "fa fa-plus-circle", 'color' => 'success'];
        }

        if (CRUDBooster::getCurrentMethod() == 'getIndex' && (CRUDBooster::isSuperadmin() || CRUDBooster::myPrivilegeName() == 'Administrador')) {
            $this->index_button[] = ['label' => 'Usuario Recibe Alertas', 'url' => url('/admin/alertconfig'), "icon" => "fa fa-envelope"];
        }

        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
        $this->table_row_color = array();
        $this->table_row_color[] = ["condition" => "[estado] == 'success'", "color" => "danger"];
        $this->table_row_color[] = ["condition" => "[estado] == 'Seguimiento'", "color" => "warning"];
        $this->table_row_color[] = ["condition" => "[estado] == 'Aceptado'", "color" => "success"];


        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
        $this->index_statistic = array();



        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
        $this->script_js = NULL;

        $modulo = CRUDBooster::getCurrentMethod();
        $myId = CRUDBooster::myId();

        $this->script_js = "
                $(function() {
                    $('#btn_add_new_data').hide();
                });
            ";

        if ($modulo == "getAdd" || $modulo == "getEdit") {
            // if ($modulo == "getAdd"){

            $urlapi = asset('getmodelo');
            $urlapiproducto = asset('getproducto');

            $this->script_js = "
                    $(function() {
                        // $('#seguros_id').prop('selectedIndex', 1);
                        // $('#cms_users_id').val('$myId');
                        
                        $('input[name=\"submit\"]').click(function(){
                            $(\"#planes_id\").prop(\"disabled\", false);
                            $(\"#monto_soat1\").prop(\"disabled\", false);
                            $(\"#monto_soat2\").prop(\"disabled\", false);
                            $(\"#monto_soat3\").prop(\"disabled\", false);
                            $(\"#monto_soat4\").prop(\"disabled\", false);
                            $(\"#monto_soat5\").prop(\"disabled\", false);
                        });
                        
                        $('input[type=radio][name=\"is_soat\"]').change(function () {
                            console.log($(this).val());
                            if ($(this).val() == '0') {
                                console.log('NO OFRECE SOAT');
                                $(\"#monto_soat1\").val('0');
                                $(\"#monto_soat2\").val('0');
                                $(\"#monto_soat3\").val('0');
                                $(\"#monto_soat4\").val('0');
                                $(\"#monto_soat5\").val('0');
                                $(\"#monto_soat1\").prop(\"disabled\", true);
                                $(\"#monto_soat2\").prop(\"disabled\", true);
                                $(\"#monto_soat3\").prop(\"disabled\", true);
                                $(\"#monto_soat4\").prop(\"disabled\", true);
                                $(\"#monto_soat5\").prop(\"disabled\", true);
                            } else {
                                console.log('SI OFRECE SOAT');
                                $(\"#monto_soat1\").prop(\"disabled\", false);
                                $(\"#monto_soat2\").prop(\"disabled\", false);
                                $(\"#monto_soat3\").prop(\"disabled\", false);
                                $(\"#monto_soat4\").prop(\"disabled\", false);
                                $(\"#monto_soat5\").prop(\"disabled\", false);
                            }     
                        });
                        
                        setTimeout(function(){
                        
                        $('#modelos_id').change(function () {
                        
                            // console.log('PROBANDO');
        
                            if ($('#modelos_id').val() != '') {
        
                                var ModelOptions = {};
                                ModelOptions.url = '$urlapi/' + $('#modelos_id').val();
                                ModelOptions.type = 'GET';
                                ModelOptions.datatype = 'json';
                                ModelOptions.contentType = 'application/json';
                                ModelOptions.success = function (itemList) {
                                    for (var i = 0; i < itemList.length; i++) {
                                        $('#valormercado').val(itemList[i].valormercado.toString());
                                    }
                                };
                                ModelOptions.error = function() { alert('Error obteniendo valor de mercado!!'); };
                                $.ajax(ModelOptions);
        
                            } else {
                                $('#valormercado').val('0');
                            }
                            
                            if ($('#companias_id').val() != '' && $('#modelos_id').val() != '' && $('#usos_id').val() != '') {
        
                                var ModelOptions = {};
                                ModelOptions.url = '$urlapiproducto/' + $('#modelos_id').val() + '/' + $('#companias_id').val() + '/' + $('#usos_id').val();
                                ModelOptions.type = 'GET';
                                ModelOptions.datatype = 'json';
                                ModelOptions.contentType = 'application/json';
                                ModelOptions.success = function (itemList) {
                                    for (var i = 0; i < itemList.length; i++) {
                                        if (itemList[i].productos_id == null) {
                                            swal(
                                              'Modelo NO COTIZABLE!',
                                              'Para la compañia y uso no es cotizable. Seleccione otro modelo.',
                                              'warning'
                                            );
                                            //alert('Modelo NO COTIZABLE para esta compañia. Debe cambiar de modelo.');
                                        }
                                    }
                                };
                                ModelOptions.error = function() { 
                                    //alert('Error obteniendo producto del modelo segun compania '); 
                                };
                                $.ajax(ModelOptions);
                            }
        
                        });
                        
                        }, 9000);
                        
                        $('#companias_id').change(function () {
        
                            if ($('#companias_id').val() != '' && $('#modelos_id').val() != '' && $('#usos_id').val() != '') {
        
                                var ModelOptions = {};
                                ModelOptions.url = '$urlapiproducto/' + $('#modelos_id').val() + '/' + $('#companias_id').val() + '/' + $('#usos_id').val();
                                ModelOptions.type = 'GET';
                                ModelOptions.datatype = 'json';
                                ModelOptions.contentType = 'application/json';
                                ModelOptions.success = function (itemList) {
                                    for (var i = 0; i < itemList.length; i++) {
                                        if (itemList[i].productos_id == null) {
                                            swal(
                                              'Modelo NO COTIZABLE!',
                                              'Para la compañia y uso no es cotizable. Seleccione otro modelo.',
                                              'warning'
                                            );
                                            //alert('Modelo NO COTIZABLE para esta compañia. Debe cambiar de modelo.');
                                        }
                                    }
                                };
                                ModelOptions.error = function() { 
                                    //alert('Error obteniendo producto del modelo segun compania'); 
                                };
                                $.ajax(ModelOptions);
                            }
        
                        });
                        
                        $('#usos_id').change(function () {
        
                            if ($('#companias_id').val() != '' && $('#modelos_id').val() != '' && $('#usos_id').val() != '') {
        
                                var ModelOptions = {};
                                ModelOptions.url = '$urlapiproducto/' + $('#modelos_id').val() + '/' + $('#companias_id').val() + '/' + $('#usos_id').val();
                                ModelOptions.type = 'GET';
                                ModelOptions.datatype = 'json';
                                ModelOptions.contentType = 'application/json';
                                ModelOptions.success = function (itemList) {
                                    for (var i = 0; i < itemList.length; i++) {
                                        if (itemList[i].productos_id == null) {
                                            swal(
                                              'Modelo NO COTIZABLE!',
                                              'Para la compañia y uso no es cotizable. Seleccione otro modelo.',
                                              'warning'
                                            );
                                            //alert('Modelo NO COTIZABLE para esta compañia. Debe cambiar de modelo.');
                                        }
                                    }
                                };
                                ModelOptions.error = function() { 
                                    //alert('Error obteniendo producto del modelo segun compania '); 
                                };
                                $.ajax(ModelOptions);
                            }
        
                        });
                        
                        //$('#modelos_id').trigger('change');
                        
                    })
                ";
        }


        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
        $this->pre_index_html = null;



        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
        $this->post_index_html = null;



        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
        $this->load_js = array();



        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
        $this->style_css = NULL;



        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
        $this->load_css = array();

        // hook_after_form
        $this->hook_after_form();
    }


    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
    public function actionButtonSelected($id_selected, $button_name)
    {
        //Your code here

    }


    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
    public function hook_query_index(&$query)
    {
        //Your code here
        if (CRUDBooster::myPrivilegeName() == "Ventas") {

            $query->where('cotizaciones.cms_users_id', CRUDBooster::myId());
        } else if (CRUDBooster::myPrivilegeName() == "Administrador Dealer") {

            if (!is_null(self::mySubAgente())) {
                $lista_usuarios = DB::select('select id from cms_users where subagentes_id = ' . self::mySubAgente());
                $codigos = [];

                foreach ($lista_usuarios as $usuario) {
                    array_push($codigos, $usuario->id);
                }

                $query->whereIn('cotizaciones.cms_users_id', $codigos);
            } else if (!is_null(self::myPlan())) {
                $query->where('cotizaciones.planes_id', self::myPlan());
            }
        } else if (CRUDBooster::myPrivilegeName() == "Administrador" && !is_null(self::myPlan())) {

            $query->where('cotizaciones.planes_id', self::myPlan());
        }
    }

    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */
    public function hook_row_index($column_index, &$column_value)
    {
        //Your code here
        // if($column_index==8){
        //     if($column_value == 'Aceptado') {
        //         $column_value = '<span class="label label-success">Aceptado</span>';
        //     }else if($column_value == 'Rechazado') {
        //         $column_value = '<span class="label label-warning">Rechazado</span>';
        //     }
        // }
        // if($column_index==7){
        //     $column_value = '<span class="label label-success">xxx</span>';
        // }
    }

    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
    public function hook_before_add(&$postdata)
    {
        //Your code here

    }

    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
    public function hook_after_add($id)
    {
        //Your code here
        $this->create_quotation_detail($id);
        // save history
        $this->saveCompaniesByCotizacionId($id);
    }

    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
    public function hook_before_edit(&$postdata, $id)
    {
        //Your code here
        $cotizacion = DB::table('cotizaciones')->where('id', '=', $id)->first();
        Session::put('usos_id', $cotizacion->usos_id);
        Session::put('modelos_id', $cotizacion->modelos_id);
    }

    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
    public function hook_after_edit($id)
    {
        //Your code here 
        $cotizacion = DB::table('cotizaciones')->where('id', '=', $id)->first();
        $usos_id = (int)Session::get('usos_id');
        $modelos_id = (int)Session::get('modelos_id');

        if ($cotizacion->usos_id == $usos_id && $cotizacion->modelos_id == $modelos_id) {
            $this->update_quotation_detail($id);
        } else {
            $this->create_quotation_detail($id);
        }

        Session::forget('usos_id');
        Session::forget('modelos_id');

        // save history
        $this->saveCompaniesByCotizacionId($id);
    }

    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
    public function hook_before_delete($id)
    {
        //Your code here
        DB::table('cotizaciones_detalles')->where('cotizaciones_id', $id)->delete();
        DB::table('usos_companias')->where('cotizaciones_id', $id)->delete();
    }

    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
    public function hook_after_delete($id)
    {
        //Your code here

    }



    //By the way, you can still create your own method in here... :)
    public function myPlan()
    {

        $query = DB::table('cms_users')->where('id', '=', CRUDBooster::myId())->first();

        return $query->planes_id;
    }

    public function myPlanCompanias()
    {

        //$companias_id = null

        if (self::myPlan() == 2) { //Maqfin
            $query = DB::table('usos_companias')->where('usos_id', '=', 6)->get();
        } else { //Corporativo
            $query = DB::table('usos_companias')->where('usos_id', '=', 1)->get();
        }

        $companias_id = $query->implode('companias_id', ', ');

        return $companias_id;
    }

    public function mySubAgente()
    {

        $query = DB::table('cms_users')->where('id', '=', CRUDBooster::myId())->first();

        return $query->subagentes_id;
    }

    public function mySubAgenteUsers()
    {

        $query = DB::table('cms_users')->where('subagentes_id', '=', self::mySubAgente())->get();

        return $query->implode('id', ', ');
    }

    public function create_quotation_detail($id)
    {

        DB::table('cotizaciones_detalles')->where('cotizaciones_id', $id)->delete();

        $cotizacion = DB::table('cotizaciones')->where('id', $id)->first();
        $curYear = date('Y');
        $valormercado = $cotizacion->valormercado;
        // $anioantiguedad = $curYear - $cotizacion->aniofabricacion;
        $anioantiguedad = ($cotizacion->is_comonuevo == 1) ? 0 : $curYear - (int)$cotizacion->aniofabricacion; //calcular antiguedad
        $is_comonuevo = $cotizacion->is_comonuevo;

        // INICIO SE GUARDA LA TIENDA DONDE SE VENDIO AL COTIZACION
        if (is_null($cotizacion->subagentes_id)) {
            $usuario = DB::table('cms_users')->where('id', $cotizacion->cms_users_id)->first();

            DB::table('cotizaciones')
                ->where('id', $cotizacion->id)
                ->update(
                    [
                        'subagentes_id' => $usuario->subagentes_id
                    ]
                );
        }
        // FIN SE GUARDA LA TIENDA DONDE SE VENDIO AL COTIZACION

        if (!is_null($cotizacion->companias_id) && $cotizacion->companias_id > 0) {
            $modelos_productos = DB::table('modelos_productos')->where([['modelos_id', '=', $cotizacion->modelos_id], ['usos_id', '=', $cotizacion->usos_id], ['companias_id', '=', $cotizacion->companias_id]])->get();
        } else {
            $modelos_productos = DB::table('modelos_productos')->where([['modelos_id', '=', $cotizacion->modelos_id], ['usos_id', '=', $cotizacion->usos_id]])->get();
        }

        foreach ($modelos_productos as $modelo_producto) {

            $tasa = 0;
            $primaneta = 0;
            $primatotal = 0;
            $descuento = 0;
            $is_gps = 0;
            // $is_comonuevo = 0;

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
    }

    public function update_quotation_detail($id)
    {

        $cotizacion = DB::table('cotizaciones')->where('id', $id)->first();
        $cotizaciones_detalles_list = DB::table('cotizaciones_detalles')->where('cotizaciones_id', $id)->get();

        foreach ($cotizaciones_detalles_list as $cotizaciones_detalles) {

            if (!is_null($cotizaciones_detalles->productos_id) && $cotizaciones_detalles->productos_id > 0) {

                $modelo_producto = DB::table('modelos_productos')->where([['modelos_id', '=', $cotizacion->modelos_id], ['usos_id', '=', $cotizacion->usos_id], ['companias_id', '=', $cotizaciones_detalles->companias_id], ['productos_id', '=', $cotizaciones_detalles->productos_id]])->first();
                $productos = DB::table('productos')->where('id', $cotizaciones_detalles->productos_id)->first();
                $is_gps = $cotizaciones_detalles->is_gps;
                $is_comonuevo = $cotizacion->is_comonuevo;

                $compania = DB::table('companias')->where('id', $cotizaciones_detalles->companias_id)->first();
                //                $suma_maxima_cotizable = $compania->suma_maxima_cotizable;
                // $importe_convertido_gas = $compania->importe_convertido_gas;

                if ($is_comonuevo == 1) {
                    $anioantiguedad = 0;

                    $tasa = DB::table('tasas')->where([['productos_id', '=', $cotizaciones_detalles->productos_id], ['anioantiguedad', '=', $anioantiguedad]])->value('porcentajetasa');
                    $primaminima = $productos->primaminima;
                } else {
                    //$tasa = $cotizaciones_detalles->tasa;
                    //falta agregar el caso en el que se desmarca IS_COMONUEVO la tasa deberia regresar a la tasa original
                    //Para tal fin solo se debe calcular anio antiguedad y buscar la tasa
                    $curYear = date('Y');
                    $anioantiguedad = $curYear - $cotizacion->aniofabricacion;

                    $tasa = DB::table('tasas')->where([['productos_id', '=', $cotizaciones_detalles->productos_id], ['anioantiguedad', '=', $anioantiguedad]])->value('porcentajetasa');
                    $primaminima = $productos->primaminima;
                }

                //Calcula la tasa por si tuviera descuento, si el descuento es CERO no afecta la tasa
                $tasa_calculada = $tasa - ($tasa * ($cotizaciones_detalles->descuento / 100));
                $tasa_calculada = round($tasa_calculada, 2);

                $primaneta = $cotizacion->valormercado * ($tasa_calculada / 100);

                // if ($cotizacion->is_convertidogas == 1) {
                //     $primaneta = $primaneta + $importe_convertido_gas;
                // }

                //                    if ($primaminima > 0 && $primaneta < $primaminima && $primaneta > 0) {
                if ($primaminima > 0 && $primaneta < $primaminima) {
                    $primaneta = $primaminima;
                }

                if ($cotizaciones_detalles->companias_id == 4) { //HDI
                    $primatotal = round(($primaneta * (118.00 / 100)), 2);
                } else {
                    $primatotal = round(($primaneta * (121.54 / 100)), 2);
                }

                $primaneta = round($primaneta, 2);

                if ($cotizacion->valormercado >= $productos->gpsmontotope) {
                    $is_gps = 1;
                }

                if ($modelo_producto->gpsantiguedadhasta > 0 && $anioantiguedad <= $modelo_producto->gpsantiguedadhasta) {
                    $is_gps = 1;
                }

                DB::table('cotizaciones_detalles')
                    ->where('id', $cotizaciones_detalles->id)
                    ->update(
                        [
                            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            //'cotizaciones_id' => $id,
                            'companias_id' => $cotizaciones_detalles->companias_id,
                            'productos_id' => $cotizaciones_detalles->productos_id,
                            'tasa' => $tasa,
                            'primaneta' => $primaneta,
                            'primatotal' => $primatotal,
                            //'descuento' => $descuento,
                            'is_gps' => $is_gps,
                            'is_comonuevo' => $is_comonuevo
                        ]
                    );
            }
        }
    }

    public  function  alertconfig()
    {
        //Create an Auth
        if (!CRUDBooster::isSuperadmin() && !(CRUDBooster::myPrivilegeName() == 'Administrador')) {
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans("crudbooster.denied_access"));
        }

        $data = [];
        $data['page_title'] = 'Registrar el usuario que administra las cotizaciones nuevas y que recibirá las alertas. El usuario debe contar con privilegios de administrador';
        $data['row'] = DB::table('cms_settings')->where('name', 'email_quotation_alert')->first();

        return $this->view('alertconfig', $data);
    }

    public function storeconfig(PostRequest $request)
    {

        DB::table('cms_settings')
            ->where('name', 'email_quotation_alert')
            ->update(['content' => $request->contenido, 'updated_at' => date('Y-m-d H:i:s')]);

        //-----Redirecciona al Home y muestra confirmación
        $to = CRUDBooster::mainpath('');
        $message = "Se actualizó satisfactoriamente";
        $type = "success";
        CRUDBooster::redirect($to, $message, $type);
    }

    public function getSendQuotation($id)
    {
        //This will redirect back and gives a message
        $resultado = Home::sendQuotationByEmail($id);
        CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "La cotización fué enviada !", "info");
    }

    public static function saveQuotationDetail($id)
    {
        //Your code here
        $cotizacion = DB::table('cotizaciones')->where('id', $id)->first();
        $curYear = date('Y');
        $valormercado = $cotizacion->valormercado;
        $anioantiguedad = $curYear - $cotizacion->aniofabricacion;

        // INICIO SE GUARDA LA TIENDA DONDE SE VENDIO AL COTIZACION
        if (is_null($cotizacion->subagentes_id)) {
            $usuario = DB::table('cms_users')->where('id', $cotizacion->cms_users_id)->first();

            DB::table('cotizaciones')
                ->where('id', $cotizacion->id)
                ->update(
                    [
                        'subagentes_id' => $usuario->subagentes_id
                    ]
                );
        }
        // FIN SE GUARDA LA TIENDA DONDE SE VENDIO AL COTIZACION

        if (!is_null($cotizacion->companias_id) && $cotizacion->companias_id > 0) {
            $modelos_productos = DB::table('modelos_productos')->where([['modelos_id', '=', $cotizacion->modelos_id], ['usos_id', '=', $cotizacion->usos_id], ['companias_id', '=', $cotizacion->companias_id]])->get();
        } else {
            $modelos_productos = DB::table('modelos_productos')->where([['modelos_id', '=', $cotizacion->modelos_id], ['usos_id', '=', $cotizacion->usos_id]])->get();
        }

        foreach ($modelos_productos as $modelo_producto) {

            $tasa = 0;
            $primaneta = 0;
            $primatotal = 0;
            $descuento = 0;
            $is_gps = 0;
            $is_comonuevo = 0;

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

            // INICIO SE GUARDAN LAS COMPANIAS
            DB::table('usos_companias')->insert(
                [
                    'cotizaciones_id' => $cotizacion->id,
                    'companias_id' => $modelo_producto->companias_id
                ]
            );
            // FIN SE GUARDAN LAS COMPANIAS

        }
    }

    public function getExportSearch()
    {
        //First, Add an auth
        //            if(is_null(CRUDBooster::myId())) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));

        //            if (CRUDBooster::myPrivilegeName() == "Super Administrator") {
        //                $ejecutivos = DB::table('cms_users')->whereIn('id_cms_privileges', [2,7])->get();
        //                $operadores = DB::table('cms_users')->where('id_cms_privileges', '=', '4')->get();
        //            } else {
        //                $ejecutivos = DB::table('cms_users')->where('brokers_id', '=', self::myBrokerId())->whereIn('id_cms_privileges', [2,7])->get();
        //                $operadores = DB::table('cms_users')->where('brokers_id', '=', self::myBrokerId())->where('id_cms_privileges', '=', '4')->get();
        //            }
        //            return view('archivos.export_tramites_search', compact('ejecutivos','operadores'));
        // return "ok";
        return view('archivos.export_ventas_search');
    }

    public function postExportSearch()
    {

        $desde = (string)$_POST["desde"];
        $hasta = (string)$_POST["hasta"];
        $estado_venta = $_POST['estado_venta'];

        try {

            return Excel::download(new CotizacionesExport($desde, $hasta, $estado_venta), 'ventas - ' . Carbon::now() . '.xlsx');
        } catch (\Exception $e) {

            CRUDBooster::redirect($_SERVER['HTTP_REFERER'], $e->getMessage(), "info");
        }

        //                //-----Envia Correo a Contacto con Excel Adjunto
        //                $to = $banco->email;
        //                $data_email = ['name'=>$banco->contacto]; //['name'=>'John Done','email'=>'john@gmail.com'];
        //
        //                //$files[] = $xls['full']; //'quotation/cotizacion.pdf'; //$files[] = public_path(). '/uploads/2017-04/rimac.png';
        //                CRUDBooster::sendEmail(['to'=>$to,'data'=>$data_email,'template'=>'alerta_vencimiento','attachments'=>[$xls['full']] ]);

    }

    public function hook_after_form()
    {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                // Obtener el botón que tiene el valor 'Guardar y Añadir otro'
                const guardarYAnadirOtroBtn = document.querySelector('input[type=\"submit\"][value=\"Guardar y Añadir otro\"]');
                if (guardarYAnadirOtroBtn) {
                    guardarYAnadirOtroBtn.id = 'guardar-y-anadir-otro-btn';
                }

                // Obtener el botón que tiene el valor 'Guardar'
                const guardarBtn = document.querySelector('input[type=\"submit\"][value=\"Guardar\"]');
                if (guardarBtn) {
                    guardarBtn.id = 'guardar-btn';
                }
            });   

            document.addEventListener('DOMContentLoaded', function() {
    
                // Función genérica para validar y mostrar mensajes de error
                function validateInput(input, pattern, errorMessage, additionalCheck = null) {

                    // validar si el input existe
                    if (!input) {
                        return;
                    }

                    let errorMsg = input.parentNode.querySelector('.error-message');
                    
                    if (!errorMsg) {
                        errorMsg = document.createElement('span');
                        errorMsg.classList.add('error-message');
                        errorMsg.style.color = 'red';
                        input.parentNode.appendChild(errorMsg);
                    }
    
                    input.addEventListener('input', function() {
                        const value = input.value;
                        errorMsg.textContent = '';
    
                        // Verificar si cumple el patrón o alguna validación adicional
                        if (!pattern.test(value) || (additionalCheck && !additionalCheck(value))) {
                            errorMsg.textContent = errorMessage;
                        } else {
                            errorMsg.textContent = '';  // Limpiar mensaje si es válido
                        }
    
                        checkFormValidity();  // Verificar si el formulario es válido
                    });
                }
    
                // Validar teléfono (solo números, paréntesis, guiones y espacios)
                const phoneInput = document.getElementById('celular');
                validateInput(phoneInput, /^[0-9\-\(\)\s]+$/, 'Número de teléfono inválido.');
    
                // Validar documento (solo números)
                const documentInput = document.getElementById('documento');
                validateInput(documentInput, /^[0-9]+$/, 'Número de documento inválido.');
    
                // Validar correo electrónico (patrón estándar)
                const emailInput = document.getElementById('email');
                validateInput(emailInput, /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,6}$/, 'Correo electrónico inválido.');
    
                // Validar edad (números y menor a 100)
                const edadInput = document.getElementById('edad');
                validateInput(edadInput, /^[0-9]+$/, 'Edad inválida.', (value) => value <= 100);


    
                // Habilitar o deshabilitar el botón de envío según el estado del formulario
                const submitButton = document.getElementById('guardar-btn');
                
                const submitButton2 = document.getElementById('guardar-y-anadir-otro-btn');
                
                // validar si existen los botones
                if (!submitButton && !submitButton2) {
                    console.log('No se encontraron los botones de envío');
                    return;
                    } else {
                        console.log('Se encontraron los botones de envío');
                }

                submitButton.disabled = true; // El botón comienza deshabilitado
                submitButton2.disabled = true; // El botón comienza deshabilitado

    
                function checkFormValidity() {
                    // // Obtener todos los campos con errores
                    const errorMessages = document.querySelectorAll('.error-message');
                    const hasError = Array.from(errorMessages).some(span => span.textContent !== '');
    
                    // // Deshabilitar el botón si hay errores
                    submitButton.disabled = hasError;
                    submitButton2.disabled = hasError;
                    // deshabilitar si los campos obligatorios no estan llenos
                    const requiredInputs = document.querySelectorAll('input[required]');
                    const hasEmptyRequired = Array.from(requiredInputs).some(input => !input.value);
                    submitButton.disabled = hasEmptyRequired;
                    submitButton2.disabled = hasEmptyRequired;

                }

    
                // Inicializar validaciones
                checkFormValidity();
            });
        </script>";
    }
    

}
