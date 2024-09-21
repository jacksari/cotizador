<?php

namespace App\Traits;

use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

trait PdfTrait
{
    public function generatePdf(
        $id
    )
    {
        $data = $this->getDataQuotationNew($id);

        PDF::loadView('cotizacion_comercial', json_decode(json_encode($data), true))
            ->setOptions([
                'isHtml5ParserEnabled' => true,       // Habilita el parser HTML5
                'isRemoteEnabled' => true,            // Permite cargar recursos remotos (URLs absolutas)
                'dpi' => 96,                          // Ajusta los DPI para imágenes más nítidas
                'defaultFont' => 'DejaVu Sans',       // Fuente predeterminada
            ])
            ->save(public_path('pdfs/' . $id . '.pdf'));    

        // $path = env('APP_URL') . '/pdfs/' . $id . '.pdf';
        return "Método para generar PDF";
    }

    public function getDataQuotationNew($id)
    {
        //sp_get_cotizacion_by_id
        $query = 'call sp_get_cotizacion_by_id(?);';
        $params = [$id];
        $data = DB::selectOne($query, $params);

        $companies =  $data->companies ? json_decode($data->companies) : [];

        $companies = collect($companies)->filter(function ($item) {
            return $item->tasa != null;
        })->values()->all();
        $seen = [];

        $companies = array_filter($companies, function ($item) use (&$seen) {
            if (!isset($seen[$item->company_id])) {
                $seen[$item->company_id] = true; // Marcamos el 'company_id' como visto.
                return true; // Devolvemos 'true' para mantener este elemento en el array.
            }
            return false; // Si el 'company_id' ya fue visto, lo omitimos.
        });

        $data->companies = $companies;

        //extract coberturas
        $coberturas = collect([]);
        // $factores = collect([]);
        foreach ($data->companies as $company) {
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
        // $coberturas = array_filter($coberturas, function ($item) {
        //     return $item['concepto_id'] != null;
        // });
        $data->coberturas = $coberturas;

         //extract deducibles
         $deducibles = collect([]);
         foreach ($data->companies as $company) {
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
        // $data->max_factores = $max_factores;
        // validar coberturas, deducibles, is_gps, logo
        foreach ($data->companies as $key => $company) {
            if ($company->company_id == 2) {
                // $data->companies[$key]->primatotal = $data->pacifico_prima;
                $data->pacifico_prima != null && ($data->companies[$key]->primatotal = $data->pacifico_prima);
            }
            if ($company->company_id == 4) {
                // $data->companies[$key]->primatotal = $data->hdi_prima;
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

        // $cotizacion_id = str_pad($cotizacion->id, 10, "0", STR_PAD_LEFT);
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

    public function saveCompaniesByCotizacionId($id)
    {
        $data = $this->getDataQuotationNew($id);

        DB::table('cotizaciones')->where('id', $id)->update([
            'companies' => json_encode($data->companies)
        ]);
    }
}
