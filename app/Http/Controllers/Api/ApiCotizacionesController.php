<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\PdfTrait;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiCotizacionesController extends Controller
{
    use PdfTrait;
    public function getCotizaciones()
    {
        return 'getCotizaciones';
    }

    public function updateStatusCotizacion(
        Request $request,
        $cotizacion_id
    ) {

        $status_id = $request->status_id;

        DB::statement("update cotizaciones set status_id = ? where id = ?", [$status_id, $cotizacion_id]);

        //actualizar estado de la cotizacion
        $status = DB::table('cotizaciones_statuses')->where('id', $status_id)->first();
        DB::statement("update cotizaciones set estado = ? where id = ?", [$status->name, $cotizacion_id]);

        return [
            'status' => 'success',
            'message' => 'Cotizacion actualizada'
        ];
    }

    public function getCotizacionById($cotizacion_id)
    {
        $cotizacion = $this->getDataQuotationNew($cotizacion_id);
        $cotizacion->companies_history = json_decode($cotizacion->companies_history);

        return $cotizacion;
    }

}
