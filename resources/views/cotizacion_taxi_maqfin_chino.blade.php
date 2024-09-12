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
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="{{ $table_td_colspan }}" class="subtitulo">Coberturas</td>
            </tr>
            <tr>
                <td class="text-left">Daño Propio (Choque, Vuelco, Incendio, Robo Total/Parcial)</td>
                <td>Valor Nuevo x 1 año</td>
                <td>Valor Asegurado</td>
                <td>Valor Convenido</td>
                <td>Valor Pactado y/o Admitido</td>
                <td>Valor Pactado</td>
            </tr>
            <tr>
                <td class="text-left">Responsabilidad Civil frente a terceros hasta</td>
                <td>US$ 150,000</td>
                <td>US$ 150,000</td>
                <td>US$ 50,000</td>
                <td>US$ 150,000</td>
                <td>US$ 150,000</td>
            </tr>
            <tr>
                <td class="text-left">Riesgos de la Naturaleza (Terremoto, Maremoto, Lluvia, Inundación, Huayco y Aluvión)</td>
                <td>Valor Nuevo x 1 año</td>
                <td>Valor Asegurado</td>
                <td>Valor Convenido</td>
                <td>Valor Pactado y/o Admitido</td>
                <td>Valor Pactado</td>
            </tr>
            <tr>
                <td class="text-left">Riesgos Políticos (Huelga y Conmoción Civil, Daño Malicioso, Vandalismo y Terrorismo)</td>
                <td>Valor Nuevo x 1 año</td>
                <td>Valor Asegurado</td>
                <td>Valor Convenido</td>
                <td>Valor Pactado y/o Admitido</td>
                <td>Valor Pactado</td>
            </tr>
            <tr>
                <td class="text-left">Accesorios Musicales (máximo 10% Suma Asegurada) hasta</td>
                <td>US$ 1,000</td>
                <td>US$ 1,000</td>
                <td>US$ 1,500 un evento x año</td>
                <td>US$ 1,000</td>
                <td>US$ 1,500</td>
            </tr>
            <tr>
                <td class="text-left">Uso de Vías no Autorizadas según condiciones</td>
                <td>Valor Nuevo x 1 año</td>
                <td>Valor Asegurado</td>
                <td>Valor Comercial</td>
                <td>Valor Pactado y/o Admitido</td>
                <td>Valor Pactado</td>
            </tr>
            <tr>
                <td class="text-left">Rotura Accidental de lunas</td>
                <td>Nacionales: sin deducible<br>Importadas: deducible normal</td>
                <td>Cubierto</td>
                <td>Si Cubre</td>
                <td>Cubierto</td>
                <td>Nacionales: sin deducible<br>Importadas: deducible normal</td>
            </tr>
            <tr>
                <td class="text-left">Perdida Total por Choque</td>
                <td>Valor Nuevo x 1 año</td>
                <td>Valor Comercial</td>
                <td>Valor Convenido</td>
                <td>Valor Pactado</td>
                <td>Valor Pactado</td>
            </tr>
            <tr>
                <td class="text-left">Auxilio Mec&aacute;nico, Grua, ambulancia en caso de siniestro</td>
                <td>Hasta US$ 250 por evento</td>
                <td>Hasta US$ 250 por evento</td>
                <td>Hasta US$ 250 por evento</td>
                <td>Hasta US$ 250 por evento</td>
                <td>Hasta US$ 250 por evento</td>
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
                <td colspan="{{ $table_td_colspan }}" class="subtitulo">Coberturas Adicionales</td>
            </tr>
            <tr>
                <td class="text-left">Imprudencia temeraria</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
            </tr>
            <tr>
                <td class="text-left">Reestitución de suma</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
            </tr>
            <tr>
                <td class="text-left">Ausencia de control</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
                <td>Solo para póliza endosada</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
            </tr>
            <tr>
                <td class="text-left">RC por ausencia de control</td>
                <td>Si cubre</td>
                <td>Si cubre</td>
                <td>Solo para póliza endosada</td>
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
                <td colspan="{{ $table_td_colspan }}" class="subtitulo">Deducibles</td>
            </tr>
            <tr>
                <td class="text-left"></td>
                <td></td>
                <td></td>
                <td>DEDUCIBLES (Sin I.G.V.) En caso de discrepancia prevalece el mayor<br>Automóviles, Camionetas St. Wagon (Uso Taxi) Incluye Chinos e Hindú</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="text-left"></td>
                <td></td>
                <td></td>
                <td>Para todo y cada evento: 20% del monto a indemnizar, mínimo US$ 400.00 (incluye Pérdida Total)</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="text-left"></td>
                <td></td>
                <td></td>
                <td>Luna importada 10% del monto mínimo US$ 150.00<br>Luna nacional sin deducible</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="text-left"></td>
                <td></td>
                <td></td>
                <td>Ausencia de control, 25% del monto a indemnizar, mínimo US$ 500.00<br>Obligatorio instalación de dispositivo de rastreo vehicular (GPS) para cobertura de robo total.</td>
                <td></td>
                <td></td>
            </tr>
            <tr class="cell-sm">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            {{--<tr>--}}
                {{--<td colspan="{{ $table_td_colspan }}" class="subtitulo">Deducibles</td>--}}
            {{--</tr>--}}
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
            {{--<tr>--}}
                {{--<td class="text-left">Taller concesionario</td>--}}
                {{--<td>20%, mínimo US$ 200</td>--}}
                {{--<td>10%, mínimo US$ 150</td>--}}
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
                {{--<td>10% del monto indemnizable, m&iacute;nimo US$ 150.00</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="text-left">Vehículo de reemplazo</td>--}}
                {{--<td>US$ 90</td>--}}
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
                {{--<td>Deducible fijo</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="text-left">Rotura de lunas Accidental: Lunas Nacional</td>--}}
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
            {{--</tr>--}}
            <tr>
                <td colspan="{{ $table_td_colspan }}">
                    Esta cotización responde a una simulación de contratación. Los términos, condiciones y primas serán especificados en la póliza que se entregará al asegurado luego de la contratación. Para vehículos que no sean cero kilómetros será necesario coordinar una inspección. Los deducibles no incluyen IGV.
                </td>
            </tr>
        </table>

        <!--<br>-->
        <!--<br>-->
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