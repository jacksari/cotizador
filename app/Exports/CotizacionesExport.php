<?php


namespace App\Exports;

use App\Models\Datasheet;
//use Filament\Support\Exceptions\Halt;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
//use DB;
//use CRUDBooster;

class CotizacionesExport implements FromView, WithColumnFormatting, WithStyles, ShouldAutoSize
{

    /**
     * @inheritDoc
     */

    public function __construct($desde, $hasta, $estado_venta)
    {
        $this->desde = $desde;
        $this->hasta = $hasta;
        $this->estado_venta = $estado_venta;
    }

    public function view(): View
    {

//        $records = Datasheet::all()->whereBetween('start_effective_date', [$this->start_date, $this->end_date]);

        $desde = $this->desde;
        $hasta = $this->hasta;

        $estado_venta = (isset($this->estado_venta)) ? (string)$this->estado_venta : "";

        $rol = CRUDBooster::myPrivilegeName();
        $subagentes_id = ($rol !== "Super Administrator" or $rol !== "Administrador")? $this->mySubAgente(): 0;

        $planes_id = ( ($rol === "Administrador" || $rol === "Administrador Dealer") && !is_null($this->myPlan()) )? $this->myPlan(): 0;

        $parametros = ["desde" => $desde, "hasta" => $hasta, "estado_venta" => $estado_venta];

        $query = "SELECT a.id as num_cotizacion, a.created_at, a.nombreprospecto as prospecto, a.edad, a.celular, a.email, a.region, a.estado, a.aniofabricacion as fabricacion, 
                                              f.name as responsable, 
                                              (select x.nombre from subagentes x where x.id = a.subagentes_id) as tienda, 
                                              d.nombre as marca, e.nombre as modelo, b.nombre as plan, c.nombre as uso  
                                        FROM cotizaciones a INNER JOIN planes b on a.planes_id = b.id INNER JOIN usos c on a.usos_id = c.id 
                                                        INNER JOIN marcas d on a.marcas_id = d.id 
                                                        INNER JOIN modelos e on a.modelos_id = e.id 
                                                        INNER JOIN cms_users f on a.cms_users_id = f.id 
                                        where a.estado LIKE CONCAT('%',:estado_venta,'%') and ";

        if ($subagentes_id > 0) {
            $query = $query . " a.subagentes_id = " . $subagentes_id . " and ";
        }

        if ($planes_id > 0) {
            $query = $query . " a.planes_id = " . $planes_id . " and ";
        }

        $query = $query . " (DATE_FORMAT(a.created_at,'%Y-%m-%d') BETWEEN :desde AND :hasta) ";
        $query = $query . " order by a.id ";

        $records = DB::select($query, $parametros);
        if (count($records) === 0) { // ES UN ARRAY
//        if ($records->count() === 0) {

            throw new \ErrorException('No se encontró información para generar el reporte');

        }

        return view('archivos.export_ventas', [
            'ventas' => $records,
            'desde' => $desde,
            'hasta' => $hasta,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
//            // Style the first row as bold text.
////            1    => ['font' => ['bold' => true]],
//            // Styling an entire column.
////            'C'  => ['font' => ['size' => 16]],
//
////            'A1:V2' => [
//            'A1:U2' => [
//                'font' => ['bold' => true],
//                'alignment' => ['horizontal' => 'center'],
//                'borders' => ['allBorders' =>  [
//                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
////                    'color' => [
//////                        'argb' => 'FFFFFFFF',
////                        'argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED
////                    ]
//                ]
//                ],
//            ],
//            'I'  => ['alignment' => ['horizontal' => 'center']],
//            'T'  => ['font' => ['bold' => true]],
//            'V'  => ['font' => ['bold' => true]],
//            'V1' => [
//                'alignment' => ['vertical' => 'center'],
//            ],
//            'A1:D2' => [
//                'fill' => [
//                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
////                    'rotation' => 90,
////                    'startColor' => [
////                        'argb' => 'FFA0A0A0',
////                    ],
////                    'endColor' => [
////                        'argb' => 'FFFFFFFF',
////                    ],
//                    'color' => [
//                        'argb' => 'FFE2EFDA',
//                    ],
//                ],
//            ],
//            'E1:K2' => [
//                'fill' => [
//                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
//                    'color' => [
//                        'argb' => 'ffddebf7',
//                    ],
//                ],
//            ],
////            'L1:V2' => [
//            'L1:U2' => [
//                'fill' => [
//                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
//                    'color' => [
//                        'argb' => 'fffce4d6',
//                    ],
//                ],
//            ],
//            'A2'  => ['font' => ['bold' => true]], // Este código lo puse para que al abrir el excel, este seleccionada la columna 1 fila 2

        ];
    }

    public function columnFormats(): array
    {
        return [
//            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
//            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
//            'I' => NumberFormat::FORMAT_PERCENTAGE,
//            'J' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
//            'K' => NumberFormat::FORMAT_DATE_DDMMYYYY,
////            'N' => NumberFormat::FORMAT_DATE_DDMMYYYY,
////            'O' => NumberFormat::FORMAT_DATE_DDMMYYYY,
////            'P' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
////            'Q' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
////            'R' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
////            'T' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
////            'U' => NumberFormat::FORMAT_PERCENTAGE_00,
////            'V' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
//            'M' => NumberFormat::FORMAT_DATE_DDMMYYYY,
//            'N' => NumberFormat::FORMAT_DATE_DDMMYYYY,
//            'O' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
//            'P' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
//            'Q' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
//            'S' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
//            'T' => NumberFormat::FORMAT_PERCENTAGE_00,
//            'U' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }

    public function myPlan() {

        return DB::table('cms_users')->where('id','=',CRUDBooster::myId())->first()->planes_id;
    }

    public function mySubAgente() {

        return DB::table('cms_users')->where('id','=',CRUDBooster::myId())->first()->subagentes_id;
    }

//    public static function reinsuranceBrokersNames(Datasheet $record)
//    {
//        $reinsuranceBrokerName = "DIRECTO";
//
//        if ($record->reinsuranceBrokers->count() > 0) {
//            $reinsuranceBrokers = [];
//
//            foreach ($record->reinsuranceBrokers as $reinsuranceBroker) {
//                $reinsuranceBrokers[] = $reinsuranceBroker->name;
//            }
//
//            $reinsuranceBrokerName = implode(", ", $reinsuranceBrokers);
//        }
//
//
//        return $reinsuranceBrokerName;
//    }
//
//    public static function insuranceLinesNames(Datasheet $record)
//    {
//        $insuranceLines = [];
//        foreach ($record->insuranceLines as $insuranceLine) {
//            $insuranceLines[] = $insuranceLine->name;
//        }
//
//        return implode(", ", $insuranceLines);
//    }

}
