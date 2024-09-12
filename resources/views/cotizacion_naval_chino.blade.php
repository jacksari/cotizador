<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cotización</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #000000;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 5px;
        }

        .full-height {
            height: 100vh;
        }

        .full-width {
            width: 100vw;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
        }

        .title-vigencia {
            color: #636b6f;
            padding: 0 25px;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 16px;
        }

        hr.bar{
            border-top: 4px solid #e2144a;
            clear: left;
        }

        .tbl {
            border-spacing: 0px;
            width: 100%;
            font-size: x-small;
            font-weight: normal;
            /*font-family: 'Microsoft Sans Serif' , Arial, Helvetica, Verdana;*/
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .tbl th {
            text-align: center;
        }

        .tbl tr td {
            padding: 5px;
        }

        .tbl td {
            /*width: 16.67%;*/
            width: {{ $table_column_width }}%;
            border: 0.5px solid #000000;
            text-align: center;
        }

        .tbl img {
            height: auto;
            width: auto;
            max-width: 80px;
            max-height: 80px;
        }

        .tbl .cell-sm {
            height: 7px;
        }

        .tbl .cell-sm td {
            padding: 0px;
            border: none;
        }

        .tbl .subtitulo {
            font-family: 'Raleway', sans-serif;
            background-color: #04375e;
            color: #FFFFFF;
            font-weight: bold;
            font-size: medium;
            text-align: left;
        }

        .tbl .prima {
            font-family: 'Raleway', sans-serif;
            font-weight: bold;
            font-size: small;
        }

        .tbl .text-left {
            text-align: left;
        }

        .tbl tr td:nth-child(2),
        .tbl tr th:nth-child(2) {
            /*display: table-cell;*/
            display: {{ $col2_display }};
        }
        .tbl tr td:nth-child(3),
        .tbl tr th:nth-child(3) {
            display: {{ $col3_display }};
        }
        .tbl tr td:nth-child(4),
        .tbl tr th:nth-child(4) {
            display: {{ $col4_display }};
        }
        .tbl tr td:nth-child(5),
        .tbl tr th:nth-child(5) {
            display: {{ $col5_display }};
        }
        .tbl tr td:nth-child(6),
        .tbl tr th:nth-child(6) {
            display: {{ $col6_display }};
        }


        .left-div-20-a {
            float:left; width:20%;
            margin-top: 10px;

            font-size: xx-small;
            font-weight: normal;
            /*font-family: 'Microsoft Sans Serif' , Arial, Helvetica, Verdana;*/
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #636b6f;
            /*letter-spacing: .1rem;*/
            text-transform: uppercase;
            margin-bottom: -30px;
        }

        .left-div-20-a img {
            height: 40px;
            width: 160px;
            max-width: 160px;
            max-height: 44px;
        }

        .left-div-60 {
            float:left; width:60%;
            margin-bottom: -30px;
        }

        .left-div-20-b {
            float:left; width:20%;
            margin-top: 0px;
            font-family: 'Raleway', sans-serif;
            font-weight: bold;
            font-size: medium;
            margin-bottom: -30px;
        }

        .left-div-20-b img {
            height: 60px;
            width: 60px;
            max-width: 60px;
            max-height: 60px;
        }

        .left-div-60-b {
            float:left; width:60%;
        }

        .left-div-40 {
            float:left; width:40%;
            font-weight: bold;
        }

        .header {
            width:100%;
            padding: 0;
            margin: 0;
            border: 0;
            border-spacing: 0;
        }

        .header tr td {
            padding: 0;
            margin: 0;
        }

        .header td {
            border: 0;
            text-align: center;
        }

        .header_td1 {
            width: 30%;
            margin-top: 10px;
            font-size: xx-small;
            font-weight: normal;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #636b6f;
            text-transform: uppercase;
        }

        .header_td1 img {
            height: auto; /* 44px;*/
            width: 240px;
            max-width: 240px;
            max-height: 120px; /* 44px;*/
        }

        .header_td2 {
            width: 55%;
        }

        .header_td3 {
            width: 15%;
            margin-top: 30px;
            font-family: 'Raleway', sans-serif;
            font-weight: bold;
            font-size: medium;
        }

</style>
</head>
<body>
    <div class="content">
        <table class="header">
            <tr>
                <td class="header_td1">
                    <img src="{{ $_SERVER['DOCUMENT_ROOT'] . config('app.url_subdir') . $logo_cotizacion }}" alt=""><br>
                    {{--                    <img src="{{ asset($logo_cotizacion) }}" alt=""><br>--}}
                    {{--            <!--{{$telefono_cotizacion}}<br>-->--}}
                    <br>{{$nombreprospecto}}
                </td>
                <td class="header_td2">
                    <span class="title m-b-md">
                        Cotización {{$marca}} {{$modelo}} {{$aniofabricacion}} - ${{$valormercado}}
                    </span><br>
                    <span class="title-vigencia m-b-md">
                        PARA USO: {{$uso}}
                    </span><br>
                    <span class="title-vigencia m-b-md">
                        VÁLIDA DEL {{$validezini}} AL {{$validezfin}}
                    </span><br>
                </td>
                <td class="header_td3"><img src="{{ $_SERVER['DOCUMENT_ROOT'] . config('app.url_subdir') . 'ariascorr/images/marina.png' }}" alt=""><br>{{ $cotizacion_id }}</td>
            </tr>
        </table>
        <hr class="bar">
        <table class="tbl">
            <tr>
                <th></th>
                <th><img src="{{ $_SERVER['DOCUMENT_ROOT'] . config('app.url_subdir') . $logo1 }}" alt=""></th>
                <th><img src="{{ $_SERVER['DOCUMENT_ROOT'] . config('app.url_subdir') . $logo2 }}" alt=""></th>
                <th><img src="{{ $_SERVER['DOCUMENT_ROOT'] . config('app.url_subdir') . $logo3 }}" alt=""></th>
                <th><img src="{{ $_SERVER['DOCUMENT_ROOT'] . config('app.url_subdir') . $logo4 }}" alt=""></th>
                <th><img src="{{ $_SERVER['DOCUMENT_ROOT'] . config('app.url_subdir') . $logo5 }}" alt=""></th>
            </tr>
            <tr>
                <td class="text-left">Prima Total Contado US$</td>
                <td class="prima">{{$prima1}}</td>
                <td class="prima">{{$prima2}}</td>
                <td class="prima">{{$prima3}}</td>
                <td class="prima">{{$prima4}}</td>
                <td class="prima">{{$prima5}}</td>
            </tr>
            @if($perfiles_clientes_id == 2)
                <tr>
                    <td class="text-left">8 cuotas sin intereses (cualquier medio de pago) US$</td>
                    <td>@if($cuotasA[0] > 0) {{ $cuotasA[0] }} @endif</td>
                    <td>{{$cuotasB[0]}}</td>
                    <td>{{$cuotasC[0]}}</td>
                    <td>{{$cuotasD[0]}}</td>
                    <td>{{$cuotasE[0]}}</td>
                </tr>
                <tr>
                    <td class="text-left">10 cuotas sin intereses (solo con tarjeta de crédito) US$</td>
                    <td>{{$cuotasA[1]}}</td>
                    <td>{{$cuotasB[1]}}</td>
                    <td>{{$cuotasC[1]}}</td>
                    <td>{{$cuotasD[1]}}</td>
                    <td>{{$cuotasE[1]}}</td>
                </tr>
            @endif
            @if($perfiles_clientes_id == 1)
                <tr>
                    <td class="text-left">12 cuotas sin intereses US$</td>
                    <td>{{$cuotasA[2]}}</td>
                    <td>{{$cuotasB[2]}}</td>
                    <td>{{$cuotasC[2]}}</td>
                    <td>{{$cuotasD[2]}}</td>
                    <td>{{$cuotasE[2]}}</td>
                </tr>
            @endif
            <tr>
                <td class="text-left">Requiere GPS</td>
                <td>{{$gps1}}</td>
                <td>{{$gps2}}</td>
                <td>{{$gps3}}</td>
                <td>{{$gps4}}</td>
                <td>{{$gps5}}</td>
            </tr>
            <tr class="cell-sm">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="{{ $table_td_colspan }}" class="subtitulo">Coberturas Principales</td>
            </tr>
            <tr>
                <td class="text-left">Daño propio (choque, vuelco, incendio, robo total y/o parcial, rotura de lunas), (Se excluye Robo Parcial para vehículos de timón cambiado), hasta:</td>
                <td>Suma Asegurada</td>
                <td>Valor Comercial</td>
                <td>Valor Convenido</td>
                <td>Valor Pactado y/o Admitido</td>
                <td>Valor Pactado</td>
            </tr>
            <tr>
                <td class="text-left">Responsabilidad Civil frente a terceros por vehículo hasta</td>
                <td>US$ 150,000</td>
                <td>US$ 150,000</td>
                <td>US$ 100,000</td>
                <td>US$ 150,000</td>
                <td>S/.450</td>
            </tr>
            <tr>
                <td class="text-left">Responsabilidad Civil frente a ocupantes, por vehículo (según tarjeta de propiedad, excepto el conductor), hasta:</td>
                <td>US$ 150,000</td>
                <td>US$ 80,000</td>
                <td>US$ 100,000</td>
                <td>US$ 150,000</td>
                <td>S/.450</td>
            </tr>
            <tr>
                <td colspan="{{ $table_td_colspan }}" class="text-left">ACCIDENTES PERSONALES DE OCUPANTES (según tarjeta de propiedad, máximo 5 ocupantes):</td>
            </tr>
            <tr>
                <td class="text-left">Muerte c/u, hasta</td>
                <td>US$ 25,000 c/u</td>
                <td>US$ 25,000</td>
                <td>US$ 20,000 </td>
                <td>US$ 20,000 c/u</td>
                <td>S/.60,000 c/u max 5</td>
            </tr>
            <tr>
                <td class="text-left">Invalidez permanente c/u, hasta</td>
                <td>US$ 25,000 c/u</td>
                <td>US$ 25,000</td>
                <td>US$ 20,000 </td>
                <td>US$ 20,000 c/u</td>
                <td>S/.60,000 c/u max 5</td>
            </tr>
            <tr>
                <td class="text-left">Gastos de Curación c/u hasta</td>
                <td>US$ 4,000</td>
                <td>US$ 4,000</td>
                <td>US$ 4,000</td>
                <td>US$ 4,000</td>
                <td>S/.12,000 max. 5 personas</td>
            </tr>
            <tr>
                <td class="text-left">Gastos de Sepelio hasta</td>
                <td>US$ 2,000 c/u</td>
                <td>US$ 2,000</td>
                <td>US$ 1,000 c/u</td>
                <td>US$ 2,000 c/u</td>
                <td>S/.3,000 max. 5 personas</td>
            </tr>
            <tr>
                <td class="text-left">Accesorios musicales hasta</td>
                <td>US$ 2,000 c/u</td>
                <td>US$ 1,000</td>
                <td>US$ 1,000 c/u</td>
                <td>US$ 2,000 c/u</td>
                <td>S/.3,000 max. 5 personas</td>
            </tr>
            <tr>
                <td colspan="{{ $table_td_colspan }}" class="subtitulo">Coberturas Adicionales</td>
            </tr>
            <tr>
                <td class="text-left">Riesgos de la naturaleza, hasta</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
            </tr>
            <tr>
                <td class="text-left">Uso de vias no autorizadas, hasta</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
            </tr>
            <tr>
                <td class="text-left">Riesgos políticos (Huelga, Conmoción Civil, Daño Malicioso, Vandalismo y Terrorismo), hasta</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
            </tr>
            <tr>
                <td class="text-left">Imprudencia del conductor, hasta</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
            </tr>
            <tr>
                <td class="text-left">Responsabilidad civil por imprudencia del conductor, hasta</td>
                <td>US$ 50,000</td>
                <td>US$ 50,000</td>
                <td>US$ 50,000</td>
                <td>US$ 50,000</td>
                <td>US$ 50,000</td>
            </tr>
            <tr>
                <td class="text-left">Ausencia de control (sólo para pólizas endosadas a entidades financieras), hasta</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
            </tr>
            <tr>
                <td class="text-left">Responsabilidad civil por ausencia de control (sólo para pólizas endosadas a entidades financieras), hasta</td>
                <td>US$ 50,000</td>
                <td>US$ 50,000</td>
                <td>US$ 50,000</td>
                <td>US$ 50,000</td>
                <td>US$ 50,000</td>
            </tr>
            <tr>
                <td class="text-left">Rehabilitación automática de la suma asegurada sin costo de prima, no aplicable a accesorios musicales</td>
                <td>Si Cubre</td>
                <td>Si Cubre</td>
                <td>Si Cubre</td>
                <td>Si Cubre</td>
                <td>Si Cubre</td>
            </tr>
            <tr>
                <td colspan="{{ $table_td_colspan }}" class="subtitulo">Asistencia y Servicio del Asegurado</td>
            </tr>
            <tr>
                <td class="text-left">Asistencia personal en caso de siniestro, el Asegurado deberá llamar a línea Positiva</td>
                <td>211-0-211</td>
                <td>211-0-211</td>
                <td>211-0-211</td>
                <td>211-0-211</td>
                <td>211-0-211</td>
            </tr>
            <tr>
                <td class="text-left">Chofer de reemplazo</td>
                <td>3 veces al año</td>
                <td>3 veces al año</td>
                <td>3 veces al año</td>
                <td>3 veces al año</td>
                <td>3 veces al año</td>
            </tr>
            <tr>
                <td colspan="{{ $table_td_colspan }}" class="text-left">AUTO DE REEMPLAZO, POR OCURRENCIA:</td>
            </tr>
            <tr>
                <td class="text-left">Por choque, incendio, vuelco, hasta</td>
                <td>15 días al año</td>
                <td>15 días al año</td>
                <td>15 días al año</td>
                <td>15 días al año</td>
                <td>15 días al año</td>
            </tr>
            <tr>
                <td class="text-left">Por robo total, hasta</td>
                <td>30 días al año</td>
                <td>30 días al año</td>
                <td>30 días al año</td>
                <td>30 días al año</td>
                <td>30 días al año</td>
            </tr>
            <tr>
                <td class="text-left">Servicio de grua:  Auto no enciende, no tiene llanta de repuesto, choque, hasta</td>
                <td>US$ 500</td>
                <td>US$ 500</td>
                <td>US$ 500</td>
                <td>US$ 500</td>
                <td>US$ 500</td>
            </tr>
            <tr>
                <td class="text-left">Servicio de ambulancia en caso de siniestro, hasta</td>
                <td>US$ 500</td>
                <td>US$ 500</td>
                <td>US$ 500</td>
                <td>US$ 500</td>
                <td>US$ 500</td>
            </tr>
            <tr>
                <td class="text-left">Auxilio mecánico:  Llaves en el interior, cambio de llanta, se quedó sin gasolina, recarga de batería</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
            </tr>
            <tr class="cell-sm">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="{{ $table_td_colspan }}" class="subtitulo">Deducibles - No Incluye I.G.V.</td>
            </tr>
            {{--@foreach($deducibles as $deducible)--}}
                {{--<tr>--}}
                    {{--<td class="text-left">{{ $deducible['concepto'] }}</td>--}}
                    {{--<td>{!! $deducible['col1'] !!}</td>--}}
                    {{--<td>{!! $deducible['col2'] !!}</td>--}}
                    {{--<td>{!! $deducible['col3'] !!}</td>--}}
                    {{--<td>{!! $deducible['col4'] !!}</td>--}}
                    {{--<td>{!! $deducible['col5'] !!}</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
            <tr>
                <td class="text-left">TALLERES CONCESIONARIOS AFILIADOS (solo vehículos chinos e indios)</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
            </tr>
            <tr>
                <td class="text-left">TALLERES MULTIMARCA (solo vehículos timón cambiado)</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
            </tr>
            <tr>
                <td class="text-left">TALLERES NO AFILIADOS (sólo vehículos chinos e indios)</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
            </tr>
            <tr>
                <td class="text-left">RESPONSABILIDAD CIVIL, por todo y cada reclamo</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
            </tr>
            <tr>
                <td class="text-left">IMPRUDENCIA DEL CONDUCTOR</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
            </tr>
            <tr>
                <td class="text-left">RESPONSABILIDAD CIVIL POR IMPRUDENCIA DEL CONDUCTOR</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
            </tr>
            <tr>
                <td class="text-left">AUSENCIA DE CONTROL (sólo unidades endosadas)</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
            </tr>
            <tr>
                <td class="text-left">RESPONSABILIDAD CIVIL POR AUSENCIA DE CONTROL (sólo unidades endosadas)</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
            </tr>
            <tr>
                <td class="text-left">USO DE VÍAS NO AUTORIZADAS</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
                <td>20% del monto indemnizable, mínimo US $ 500.00</td>
            </tr>
            <tr>
                <td colspan="{{ $table_td_colspan }}" class="text-left">ROTURA ACCIDENTAL DE LUNAS:</td>
            </tr>
            <tr>
                <td class="text-left">LUNA NACIONALES</td>
                <td>SIN DEDUCIBLE</td>
                <td>SIN DEDUCIBLE</td>
                <td>SIN DEDUCIBLE</td>
                <td>SIN DEDUCIBLE</td>
                <td>SIN DEDUCIBLE</td>
            </tr>
            <tr>
                <td class="text-left">LUNAS IMPORTADAS</td>
                <td>10% del monto indemnizable, mínimo US $ 150.00</td>
                <td>10% del monto indemnizable, mínimo US $ 150.00</td>
                <td>10% del monto indemnizable, mínimo US $ 150.00</td>
                <td>10% del monto indemnizable, mínimo US $ 150.00</td>
                <td>10% del monto indemnizable, mínimo US $ 150.00</td>
            </tr>
            <tr>
                <td class="text-left">ACCESORIOS MUSICALES</td>
                <td>10% del monto indemnizable, mínimo US $ 150.00</td>
                <td>10% del monto indemnizable, mínimo US $ 150.00</td>
                <td>10% del monto indemnizable, mínimo US $ 150.00</td>
                <td>10% del monto indemnizable, mínimo US $ 150.00</td>
                <td>10% del monto indemnizable, mínimo US $ 150.00</td>
            </tr>
            <tr>
                <td class="text-left">AUTO DE REEMPLAZO</td>
                <td>Por evento US $ 100.00</td>
                <td>Por evento US $ 100.00</td>
                <td>Por evento US $ 100.00</td>
                <td>Por evento US $ 100.00</td>
                <td>Por evento US $ 100.00</td>
            </tr>
            <tr>
                <td class="text-left">CONDUCTOR VARÓN MENOR DE 25 AÑOS</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
                <td>20% del monto indemnizable, mínimo US $ 300.00</td>
            </tr>
            <tr>
                <td class="text-left">PERDIDA TOTAL Y ROBO TOTAL</td>
                <td>COASEGURO 80/20</td>
                <td>COASEGURO 80/20</td>
                <td>COASEGURO 80/20</td>
                <td>COASEGURO 80/20</td>
                <td>COASEGURO 80/20</td>
            </tr>
            <tr>
                <td colspan="{{ $table_td_colspan }}" class="text-left" style="text-align: justify;">
                    NOTA:  SE EXCLUYE LA PERDIDA TOTAL A CONSECUENCIA DE ROBOS PARCIALES EN VEHICULOS DE TIMÓN CAMBIADO. SE INCLUYE CLAUSULA DE INDEMNIZACION PARA PERDIDAS PARCIALES PARA VEHICULOS DE TIMÓN CAMBIADO Y/O DE PROCEDENCIA CHINA O INDIA.
                </td>
            </tr>
            @if($estado == "Aceptado" || $estado == "Solicitud Compra" )
                <tr>
                    <td colspan="{{ $table_td_colspan }}" class="text-left" style="text-align: justify;">
                        EL CONTRATANTE MANIFIESTA CONOCER QUE TIENE DERECHO A DESIGNAR UN CORREDOR DE SEGUROS Y CON ESTA SOLICITUD NOMBRA A ARIAS & ASOCIADOS CORREDORES DE SEGUROS S.A.C. COMO SUS ASESORES Y REPRESENTANTES PARA LA COLOCACIÓN Y/O RENOVACIÓN DEL SEGURO EN REFERENCIA A PARTIR DE LA FECHA. EL CONTRATANTE DECLARA TENER CONOCIMIENTO Y ESTAR CONFORME CON TODA LA INFORMACIÓN Y CONDICIONES ESTIPULADAS EN ESTA SOLICITUD DE SEGUROS.
                        <p>
                            Contratante: {{ $nombrecontratante }}<br>
                            Dni: {{ $dniprospecto }}<br>
                            Tel&eacute;fono: {{ $telefonoprospecto }}
                        </p>
                    </td>
                </tr>
            @endif
            <tr class="cell-sm">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            {{--<tr>--}}
                {{--<td colspan="{{ $table_td_colspan }}" class="subtitulo">Cobertura Talleres</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="text-left"></td>--}}
                {{--<td>--}}
                    {{--@foreach($deducibles1 as $deducible1)--}}

                        {{--{{$deducible1}}<br>--}}

                    {{--@endforeach--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--@foreach($deducibles2 as $deducible2)--}}

                        {{--{{$deducible2}}<br>--}}

                    {{--@endforeach--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--@foreach($deducibles3 as $deducible3)--}}

                        {{--{{$deducible3}}<br>--}}

                    {{--@endforeach--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--@foreach($deducibles4 as $deducible4)--}}

                        {{--{{$deducible4}}<br>--}}

                    {{--@endforeach--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--@foreach($deducibles5 as $deducible5)--}}

                        {{--{{$deducible5}}<br>--}}

                    {{--@endforeach--}}
                {{--</td>--}}
            {{--</tr>--}}
            {{--<tr class="cell-sm">--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
            {{--</tr>--}}
            <tr>
                <td colspan="{{ $table_td_colspan }}">
                    Esta cotización responde a una simulación de contratación. Los términos, condiciones y primas serán especificados en la póliza que se entregará al asegurado luego de la contratación. Para vehículos que no sean cero kilómetros será necesario coordinar una inspección. Los deducibles no incluyen IGV.
                </td>
            </tr>
        </table>

        <br>
        <br>
        <div class="left-div-60-b">
            <a href="https://www.facebook.com/PrimeraBrokers/"><img src="{{ asset('images/ico_face.png') }}"></a>&nbsp;
            <a href="https://www.instagram.com/primerabrokers/"><img src="{{ asset('images/ico_instagram.png') }}"></a>&nbsp;
            <a href="https://www.linkedin.com/company/primera-brokers/"><img src="{{ asset('images/ico_linkedin.png') }}"></a>&nbsp;&nbsp;&nbsp;
{{--            <a href="https://www.facebook.com/PrimeraBrokers/"><img src="{{ $_SERVER['DOCUMENT_ROOT'] . config('app.url_subdir') . 'images/ico_face.png' }}"></a>&nbsp;--}}
{{--            <a href="https://www.instagram.com/primerabrokers/"><img src="{{ $_SERVER['DOCUMENT_ROOT'] . config('app.url_subdir') . 'images/ico_instagram.png' }}"></a>&nbsp;--}}
{{--            <a href="https://www.linkedin.com/company/primera-brokers/"><img src="{{ $_SERVER['DOCUMENT_ROOT'] . config('app.url_subdir') . 'images/ico_linkedin.png' }}"></a>&nbsp;&nbsp;&nbsp;--}}
        </div>
        <div class="left-div-40">
            {{ $responsable }}<br>
            {{ $subagente  }}
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>
</body>
</html>
<script>
    document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] +
        ':35729/livereload.js?snipver=1"></' + 'script>')
</script>

