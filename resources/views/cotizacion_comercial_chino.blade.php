<!DOCTYPE html><html lang="{{ config('app.locale') }}"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    
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
            font-size: 14px;
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
            /*width: 14.285714285714286%;*/
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
            /*display: table-cell;*/
            display: {{ $col3_display }};
        }
        .tbl tr td:nth-child(4),
        .tbl tr th:nth-child(4) {
            /*display: table-cell;*/
            display: {{ $col4_display }};
        }
        .tbl tr td:nth-child(5),
        .tbl tr th:nth-child(5) {
            /*display: table-cell;*/
            display: {{ $col5_display }};
        }
        .tbl tr td:nth-child(6),
        .tbl tr th:nth-child(6) {
            /*display: table-cell;*/
            display: {{ $col6_display }};
        }
        /*.tbl tr td:nth-child(7),*/
        /*.tbl tr th:nth-child(7) {*/
        /*    display: table-cell;*/
            /*display: {{ $col6_display }};*/
        /*}*/


        .left-div-20-a {
            float:left; width:30%;
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
            height: auto; /* 44px;*/
            width: 240px;
            max-width: 240px;
            max-height: 120px; /* 44px;*/
        }

        .left-div-60 {
            float:left; width:55%;
            margin-bottom: -30px;
        }

        .left-div-20-b {
            float:left; width:15%;
            margin-top: 30px;
            font-family: 'Raleway', sans-serif;
            font-weight: bold;
            font-size: medium;
            margin-bottom: -30px;
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

</style></head><body>
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
                <td class="header_td3">{{ $cotizacion_id }}</td>
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
                <td class="text-left">Prima Total Contado $</td>
                <td class="prima">{{$prima1}}</td>
                <td class="prima">{{$prima2}}</td>
                <!--<td class="prima">{{$prima3}}</td>-->
                <td class="prima">{{$prima3}}</td>
                <td class="prima">{{$prima4}}</td>
                <td class="prima">{{$prima5}}</td>
            </tr>
            @foreach ($cuotasRegistros as $cuota)
                <tr>
                    <td class="text-left">{{ $cuota['titulo'] }}</td>
                    <td>{!! $cuota['col1'] !!}</td>
                    <td>{!! $cuota['col2'] !!}</td>
                    <td>{!! $cuota['col3'] !!}</td>
                    <td>{!! $cuota['col4'] !!}</td>
                    <td>{!! $cuota['col5'] !!}</td>
                </tr>
            @endforeach
{{--            <tr>--}}
{{--                <td class="text-left">Cuotas $</td>--}}
{{--                <td>{{$cuotasA[0]}}{!! $cuotdescA[0] !!}</td>--}}
{{--                <td>{{$cuotasB[0]}}{!! $cuotdescB[0] !!}</td>--}}
{{--                <td>{{$cuotasC[0]}}{!! $cuotdescC[0] !!}</td>--}}
{{--                <td>{{$cuotasD[0]}}{!! $cuotdescD[0] !!}</td>--}}
{{--                <td>{{$cuotasE[0]}}{!! $cuotdescE[0] !!}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="text-left">Cuotas $</td>--}}
{{--                <td>{{$cuotasA[1]}}{!! $cuotdescA[1] !!}</td>--}}
{{--                <td>{{$cuotasB[1]}}{!! $cuotdescB[1] !!}</td>--}}
{{--                <td>{{$cuotasC[1]}}{!! $cuotdescC[1] !!}</td>--}}
{{--                <td>{{$cuotasD[1]}}{!! $cuotdescD[1] !!}</td>--}}
{{--                <td>{{$cuotasE[1]}}{!! $cuotdescE[1] !!}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="text-left">Cuotas $</td>--}}
{{--                <td>{{$cuotasA[2]}}{!! $cuotdescA[2] !!}</td>--}}
{{--                <td>{{$cuotasB[2]}}{!! $cuotdescB[2] !!}</td>--}}
{{--                <td>{{$cuotasC[2]}}{!! $cuotdescC[2] !!}</td>--}}
{{--                <td>{{$cuotasD[2]}}{!! $cuotdescD[2] !!}</td>--}}
{{--                <td>{{$cuotasE[2]}}{!! $cuotdescE[2] !!}</td>--}}
{{--            </tr>--}}
            <tr>
                <td class="text-left">Requiere GPS</td>
                <td>{{$gps1}}</td>
                <td>{{$gps2}}</td>
                <!--<td>{{$gps3}}</td>-->
                <td>{{$gps3}}</td>
                <td>{{$gps4}}</td>
                <td>{{$gps5}}</td>
            </tr>
            <tr>
                <td class="text-left">Soat S/.</td>
                <td>@if($cotizacion->monto_soat1 > 0) {{$cotizacion->monto_soat1}} @endif</td>
                <td>@if($cotizacion->monto_soat2 > 0) {{$cotizacion->monto_soat2}} @endif</td>
                <td>@if($cotizacion->monto_soat3 > 0) {{$cotizacion->monto_soat3}} @endif</td>
                <td>@if($cotizacion->monto_soat4 > 0) {{$cotizacion->monto_soat4}} @endif</td>
                <td>@if($cotizacion->monto_soat5 > 0) {{$cotizacion->monto_soat5}} @endif</td>
            </tr>
            <tr class="cell-sm">
                <td></td>
                <td></td>
                <td></td>
                <!--<td></td>-->
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="{{ $table_td_colspan }}" class="subtitulo">Coberturas</td>
                <!--<td colspan="7" class="subtitulo">Coberturas</td>-->
            </tr>
            <tr>
                <td class="text-left">Daño Propio (Choque, Vuelco, Incendio, Robo Total/Parcial)</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <!--<td>Valor Comercial (TODO TERRENO)</td>-->
                <td>Valor Convenido</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
            </tr>
            <tr>
                <td class="text-left">Responsabilidad Civil frente a terceros hasta</td>
                <td>US$ 100,000</td>
                <td>US$ 150,000</td>
                <!--<td>US$ 100,000</td>-->
                <td>US$ 150,000</td>
                <td>US$ 150,000</td>
                <td>US$ 150,000</td>
            </tr>
            <tr>
                <td class="text-left">Muerte e Invalidez Permanente c/u hasta</td>
                <td>US$ 20,000 c/u max. 5 ocup.</td>
                <td>US$ 20,000 c/u max. 5 ocup.</td>
                <!--<td>10000 c/u max. 5 ocup.</td>-->
                <td>US$ 20,000 c/u max. 4 ocup.</td>
                <td>US$ 25,000 c/u max. 5 ocup.</td>
                <td>US$ 20,000 c/u max. 5 ocup.</td>
            </tr>
            <tr>
                <td class="text-left">Gastos de Curación c/u hasta</td>
                <td>US$ 4,000 max. 5 ocup.</td>
                <td>US$ 4,000 max. 5 ocup.</td>
                <!--<td>2000 c/u max. 5 ocup.</td>-->
                <td>US$ 2,000 max. 4 ocup.</td>
                <td>US$ 4,000 max. 5 ocup.</td>
                <td>US$ 4,000 max. 5 ocup.</td>
            </tr>
            <tr>
                <td class="text-left">Cirugia Estética</td>
                <td>No Cubre</td>
                <td>No Cubre</td>
                <!--<td>No Cubre</td>-->
                <td>No Cubre</td>
                <td>No Cubre</td>
                <td>No Cubre</td>
            </tr>
            <tr>
                <td class="text-left">Gastos de Sepelio</td>
                <td>US$ 1,000 max. 5 ocup.</td>
                <td>US$ 1,000 c/u max. 5 ocup.</td>
                <!--<td>no cubre</td>-->
                <td>No Cubre</td>
                <td>US$ 2,000 c/u max. 5 ocup.</td>
                <td>US$ 1,000 c/u max. 5 ocup.</td>
            </tr>
            <tr>
                <td class="text-left">Responsabilidad Civil frente a terceros por vehículo (no chofer), hasta</td>
                <td>US$ 10,000 c/u max 4 ocup</td>
                <td>US$ 50,000 x vehículo</td>
                <!--<td></td>-->
                <td>US$ 30,000 x vehículo</td>
                <td>US$ 50,000 x vehículo/td>
                <td>US$ 12,500 c/u max 4 ocup</td>
            </tr>
            <tr>
                <td class="text-left">Riesgos de la Naturaleza (Terremoto, Maremoto, Lluvia, Inundación, Huayco y Aluvión)</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <!--<td>Valor Pactado</td>-->
                <td>Valor Convenido</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
            </tr>
            <tr>
                <td class="text-left">Riesgos Políticos (Huelga y Conmoción Civil, Daño Malicioso, Vandalismo y Terrorismo)</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <!--<td>Valor Pactado</td>-->
                <td>Valor Convenido</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
            </tr>
            <tr>
                <td class="text-left">Accesorios Musicales (máximo 10% Suma Asegurada) hasta</td>
                <td>Hasta el 10% de la unidad, Máx. US$ 1,000 un evento x año</td>
                <td>US$ 1,000 un evento  x año</td>
                <!--<td>hasta US$ 1,500</td>-->
                <td>US$ 1,500 un evento  x año</td>
                <td>hasta US$ 1,000</td>
                <td>hasta US$ 1,500</td>
            </tr>
            <tr>
                <td class="text-left">Uso de Vías no Autorizadas según condiciones</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <!--<td>Valor Pactado</td>-->
                <td>Valor Convenido</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
            </tr>
            <tr>
                <td class="text-left">Rotura Accidental de lunas</td>
                <td>Si Cubre</td>
                <td>Si Cubre</td>
                <!--<td>Si Cubre</td>-->
                <td>Si Cubre</td>
                <td>Si Cubre</td>
                <td>Si Cubre</td>
            </tr>
            <tr>
                <td class="text-left">Servicio de Vehículos de reemplazo</td>
                <td>No cubre</td>
                <td>No cubre</td>
                <!--<td>No Cubre</td>-->
                <td>No cubre</td>
                <td>No cubre</td>
                <td>No cubre</td>
            </tr>
            <tr>
                <td class="text-left">Perdida Total por Choque</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
                <!--<td>Valor Pactado</td>-->
                <td>Valor Convenido</td>
                <td>Valor Comercial</td>
                <td>Valor Comercial</td>
            </tr>
            <tr>
                <td class="text-left">Auxilio Mec&aacute;nico, Grua, ambulancia en caso de siniestro</td>
                <td>si es por reembolso hasta US$ 250 por evento</td>
                <td>Hasta US$ 250</td>
                <!--<td>Grua  en caso de accidente hasta US$250</td>-->
                <td>Reembolso hasta US$ 250 por evento</td>
                <td>Hasta US$ 250 si es por reembolso</td>
                <td>Hasta US$ 250</td>
            </tr>
            <tr>
                <td class="text-left">Servicio de Chofer de Reemplazo</td>
                <td>No cubre</td>
                <td>Max. 3 eventos x año</td>
                <!--<td>Máximo 3 Asistencias, no aplica provincia</td>-->
                <td>No Cubre</td>
                <td>No Cubre</td>
                <td>No Cubre</td>
            </tr>
            <tr class="cell-sm">
                <td></td>
                <td></td>
                <td></td>
                <!--<td></td>-->
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="{{ $table_td_colspan }}" class="subtitulo">Coberturas Adicionales</td>
                <!--<td colspan="7" class="subtitulo">Coberturas Adicionales</td>-->
            </tr>
            <tr>
                <td class="text-left">Imprudencia temeraria</td>
                <td>No cubre</td>
                <td>No cubre</td>
                <!--<td>Si cubre</td>-->
                <td>No cubre</td>
                <td>No cubre</td>
                <td>Si cubre</td>
            </tr>
            <tr>
                <td class="text-left">Reestitución de suma</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
                <!--<td>Si cubre</td>-->
                <td>Si cubre</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
            </tr>
            <tr>
                <td class="text-left">Ausencia de control</td>
                <td>Solo para póliza endosada</td>
                <td>Solo para póliza endosada</td>
                <!--<td>Solo para póliza endosada</td>-->
                <td>Solo para póliza endosada</td>
                <td>Solo para póliza endosada</td>
                <td>Solo para póliza endosada</td>
            </tr>
            <tr>
                <td class="text-left">RC por ausencia de control</td>
                <td>Solo para póliza endosada</td>
                <td>Solo para póliza endosada</td>
                <!--<td>Solo para póliza endosada</td>-->
                <td>Solo para póliza endosada</td>
                <td>Solo para póliza endosada</td>
                <td>Solo para póliza endosada</td>
            </tr>
            <!--<tr>-->
            <!--    <td class="text-left">Amparo canasta familiar</td>-->
            <!--    <td></td>-->
            <!--    <td></td>-->
                <!--<td>No cubre</td>-->
            <!--    <td>No cubre</td>-->
            <!--    <td>hasta US$ 500 mensual x 6 meses, solo personas naturales</td>-->
            <!--    <td></td>-->
            <!--</tr>-->
            <!--<tr>-->
            <!--    <td class="text-left">Renta educativa</td>-->
            <!--    <td></td>-->
            <!--    <td></td>-->
                <!--<td>No cubre</td>-->
            <!--    <td>No cubre</td>-->
            <!--    <td>hasta US$ 500 mensual x 6 meses, solo personas naturales</td>-->
            <!--    <td></td>-->
            <!--</tr>-->
            <!--<tr>-->
            <!--    <td class="text-left">Protección al automovilista</td>-->
            <!--    <td></td>-->
            <!--    <td></td>-->
                <!--<td>No cubre</td>-->
            <!--    <td>No cubre</td>-->
            <!--    <td>hasta US$ 100 por gasto de duplicado de llaves, licencia de conducir y dni (en caso de robo y asalto dentro del vehículo)</td>-->
            <!--    <td></td>-->
            <!--</tr>-->
            <tr class="cell-sm">
                <td></td>
                <td></td>
                <td></td>
                <!--<td></td>-->
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="{{ $table_td_colspan }}" class="subtitulo">Deducibles</td>
                <!--<td colspan="7" class="subtitulo">Deducibles</td>-->
            </tr>
            <tr>
                <td class="text-left"></td>
                <td>Taller Afiliado: 20% del monto a indemnizar, mínimo $500 + IGV</td>
                <td>En Talleres Multimarca Afiliados: 10% del monto indemnizable, mínimo US$ 150, En Talleres Concesionarios Preferentes: 12% del monto indemnizable, mínimo US$ 150, En Talleres Concesionarios Afiliados (Bajo Riesgo): 15% del monto indemnizable, mínimo US$ 150, En Talleres Concesionaros Afiliados (Mediano o Alto Riesgo): 15% del monto indemnizable, mínimo US$ 250, En Talleres Concesionarios DIVEMOTOR e INCHCAPE: 20% del monto indemnizable, mínimo US$ 500 , En otros Talleres No Afiliados: 20% del monto indemnizable, mínimo US$ 300</td>
                <td>15% del monto indemnizable minimo US$250</td>
                <td>Daño Propio por Accidente, Incendio, Fenómenos Naturales:<br>
                 Preferente 1: 20% del monto indemnizable, mínimo US$ 250.00<br>
                 Preferente 2: 20% del monto indemnizable, mínimo US$ 250.00<br>
                 Concesionario 1: 20% del monto indemnizable, mínimo US$ 250.00<br>
                 Concesionario 2: 20% del monto indemnizable, mínimo US$ 350.00<br>
                 No afiliado: 20% del monto indemnizable, mínimo US$ 500.00
                 </td>
                <td>Taller Preferente: 15% del monto indemnizabnle, Mín $250.00 mas IGV, <br>Taller Concesionario 20%del monto indemnizable, Mín $250.00 mas IGV, <br>Taller No afiliado: 25% del monto indemnizable, Mín $300.00 mas IGV.</td>
            </tr>
            <tr>
                <td class="text-left"></td>
                <td>Taller Preferente : 15% del monto a indemnizar, mínimo $300 + IGV. Excepto para: Responsabilidad Civil: 10% del monto a indemnizar, mínimo $150.00 - Pérdida parcial o total por volcadura, despiste y desbarrancamiento: 25% del monto de siniestro, Minimo $ 500.00</td>
                <td>Accesorios Musicales: 10% del monto del siniestro, mínimo $150.00, Lunas: solo nacional</td>
                <td>"Excepto para<br>
                Accesorios musicales 15.00% del monto a indemnizar, mínimo US$ 200.00<br>
                <br>
                Deducible por volcadura , despiste 20%<br>
                Deducible por perdida total (excepto robo total) 20%<br>
                Conductor varón menor  de 29 años, 20% del monto del siniestro mínimo US$ 500<br>
                Responsabilidad civil 15.00% del monto a indemnizar, mínimo US$ 250.00
                </td>
                <td>Ausencia de Control:<br>
                20% del monto indemnizable, mínimo US$ 750.00<br>
                Robo Total: 30% del monto indemnizable, aplicable a camionetas Pick Up de 4 y 5 años de antigüedad, siendo el año 0 el actual)
                </td>
                <td>Perdida total por robo de autopartes: 20% del valor del vehículo. Robo o Hurto de piezas Taller Preferente: 15% del monto indemnizabnle, Mín $150.00, Taller Concesionario 20%del monto indemnizable, Mín $150.00, Taller No afiliado: 20% del monto indemnizable, Mín $300.00</td>
            </tr>
            <tr>
                <td class="text-left"></td>
                <td>Otros Talleres: 25% del monto indemnizable, Mínimo, $750 USD más IGV Excepto para: Pérdida parcial o total por ausencia de control y ausencia de control y responsabilidad civil por ausencia de control: 25% del monto del siniestro, mínimo 500.00, Circulación en vías y caminos fuera del uso regular y frecuente: 25% del monto del siniestro Mínimo  $ 500.00</td>
                <td>Por aplicación de la Cláusula de Ausencia de Control: 20% del monto indemnizable, mínimo US$ 300, Por aplicación de la Cláusula de Uso De Vías No Autorizadas: 20% del monto indemnizable, mínimo US$ 300</td>
                <td>Nissan Frontier, Navara, Mitsubishi L200, Volkswagen Amarok, Honda Ridgeline nuevas y hasta 3 años obligatorio instalación de GPS para cobertura de robo total Toyota Hi Lux Nuevas y hasta 4 años de antigüedad con Sistema de Rastreo Vehicular Obligatorio para cobertura de robo total</td>
                <td>Pérdida Total por Daños:<br>
                20% del monto indemnizable.<br>
                Volcadura, Despiste, Vías no aptas para la circulación:<br>
                20% del monto indemnizable, mínimo US$ 750.00
                </td>
                <td>Responsabilidad civil frente a terceros 15.00% del monto a indemnizar, mínimo US$ 150.00, Responsabilidad civil a ocupantes -  20% del monto indemnizable, Mín $300.00, Accesorios Musicales: 10% del monto del siniestro, mínimo $150.00</td>
            </tr>
            <tr>
                <td class="text-left"></td>
                <td>Accesorios Musicales: 10% del monto del siniestro, mínimo $150.00, Accesorios de Radio de Comunicación fijos: 10% del monto del siniestro, mínimo $150 Lunas: solo nacional</td>
                <td>Por la cobertura de Responsabilidad Civil: Por todo y cada reclamo 10% del monto indemnizable, mínimo US$ 150, excepto si se atienden: por aplicación de la Cláusula de Ausencia de Control: 20% del monto indemnizable, mínimo US$ 300</td>
                <td>En caso otorgar la cobertura de Ausencia de control:<br>
                25% del monto indemnizable mínimo US$500
                </td>
                <td>Huelga, Conmoción Civil, Daño Malicioso, Vandalismo y Terrorismo: 10%  adicional al deducible aplicado</td>
                <td>Imprudencia Temeraria 20% del monto indemnizable, mínimo $300, Ausencia de control y ausencia de control y responsabilidad civil por ausencia de control: 25% del monto del siniestro, mínimo 500.00, Lunas: solo nacional</td>
            </tr>
            <tr class="cell-sm">
                <td></td>
                <td></td>
                <td></td>
                <!--<td></td>-->
                <td></td>
                <td></td>
                <td></td>
            </tr>
            {{--<tr>--}}
                {{--<td colspan="{{ $table_td_colspan }}" class="subtitulo">Deducibles</td>--}}
                {{--<td colspan="7" class="subtitulo">Deducibles</td>--}}
            {{--</tr>--}}
            {{--@foreach($deducibles as $deducible)--}}
                {{--<tr>--}}
                    {{--<td class="text-left">{{ $deducible['concepto'] }}</td>--}}
                    {{--<td>{!! $deducible['col1'] !!}</td>--}}
                    {{--<td>{!! $deducible['col2'] !!}</td>--}}
                    {{--<td>{!! $deducible['col3'] !!}</td>--}}
                    {{--<td>{!! $deducible['col3'] !!}</td>--}}
                    {{--<td>{!! $deducible['col4'] !!}</td>--}}
                    {{--<td>{!! $deducible['col5'] !!}</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
            {{--<tr>--}}
                {{--<td class="text-left">Taller concesionario</td>--}}
                {{--<td>20%, mínimo US$ 200</td>--}}
                {{--<td>10%, mínimo US$ 150</td>--}}
                {{--<td>15%, mínimo US$ 150</td>--}}
                {{--<td>15%, mínimo US$ 150</td>--}}
                {{--<td>10%, mínimo US$ 150</td>--}}
                {{--<td>15%, mínimo US$ 150</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="text-left">Taller preferente</td>--}}
                {{--<td>15% del monto indemnizable, m&iacute;nimo US$ 150.00</td>--}}
                {{--<td>10%, mínimo US$ 150</td>--}}
                {{--<td>15% del monto indemnizable, m&iacute;nimo US$ 150.00</td>--}}
                {{--<td>10%, mínimo US$ 150</td>--}}
                {{--<td>10%, mínimo US$ 150</td>--}}
                {{--<td>10% del monto indemnizable, m&iacute;nimo US$ 150.00</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="text-left">Vehículo de reemplazo</td>--}}
                {{--<td>US$ 90</td>--}}
                {{--<td>US$ 100</td>--}}
                {{--<td>US$ 100</td>--}}
                {{--<td>US$ 100</td>--}}
                {{--<td>US$ 100</td>--}}
                {{--<td>S/.330</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="text-left">Rotura de lunas Accidental: Lunas Importadas</td>--}}
                {{--<td>10%, mínimo US$ 150</td>--}}
                {{--<td>10%, mínimo US$ 150</td>--}}
                {{--<td>10%, mínimo US$ 150</td>--}}
                {{--<td>10%, mínimo US$ 150</td>--}}
                {{--<td>10%, mínimo US$ 150</td>--}}
                {{--<td>Deducible fijo</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="text-left">Rotura de lunas Accidental: Lunas Nacional</td>--}}
                {{--<td>Sin deducible</td>--}}
                {{--<td>Sin deducible</td>--}}
                {{--<td>Sin deducible</td>--}}
                {{--<td>Sin deducible</td>--}}
                {{--<td>Sin deducible</td>--}}
                {{--<td>Sin deducible</td>--}}
            {{--</tr>--}}
            {{--<tr class="cell-sm">--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
            {{--</tr>--}}
            <tr>
                <td colspan="{{ $table_td_colspan }}">
                <!--<td colspan="7">-->
                    Esta cotización responde a una simulación de contratación. Los términos, condiciones y primas serán especificados en la póliza que se entregará al asegurado luego de la contratación. Para vehículos que no sean cero kilómetros será necesario coordinar una inspección. Los deducibles no incluyen IGV.
                </td>
            </tr>
        </table>

        <!--<br>-->
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
            {!! $responsable !!}
            <!--{{ $responsable }}<br>-->
            <!--{{ $subagente  }}-->
        </div>
        <!--<br>-->
        <!--<br>-->
        <!--<br>-->
        <!--<br>-->
    </div></body></html>