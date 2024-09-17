<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cotización</title>

    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->

    <!-- Styles -->
    <style>
        html,
        body {
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

        .links>a {
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

        hr.bar {
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
            /* width: {{ $table_column_width }}%;
            text-align: center; */
            border: 0.5px solid #000000;
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

        .left-div-20-a {
            float: left;
            width: 30%;
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

        .left-div-60 {
            float: left;
            width: 55%;
            margin-bottom: -30px;
        }

        .left-div-20-b {
            float: left;
            width: 15%;
            margin-top: 30px;
            font-family: 'Raleway', sans-serif;
            font-weight: bold;
            font-size: medium;
            margin-bottom: -30px;
        }

        .left-div-60-b {
            float: left;
            width: 60%;
        }

        .left-div-40 {
            float: left;
            width: 40%;
            font-weight: bold;
        }

        .header {
            width: 100%;
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
            height: auto;
            /* 44px;*/
            width: 240px;
            max-width: 240px;
            max-height: 120px;
            /* 44px;*/
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

        .text-center {
            text-align: center !important;
        }

        .table-intern {
            width: 100%;
            border-collapse: collapse;
            border-top: none !important;
        }

        .table-intern tr td {
            border-top: none !important;
            /* border-bottom: none !important; */
        }

        .table-intern tr td:first-child {
            border-left: none !important;
        }

        .table-intern tr td:last-child {
            border-right: none !important;
            /* border-bottom: none !important; */
        }

        .table-intern tr:last-child td {
            border-bottom: none !important;
        }

        .table-intern-deducibles {
            /* border-none */
            width: 100%;
            /* border-collapse: collapse; */
            border: none !important;
        }
        .table-intern-deducibles tr td {
            border: none !important;
        }
    </style>

</head>

<body>
    <div class="content">
        <table class="header">
            <tr>
                <td class="header_td1">
                    <img src="{{ $logo_cotizacion }}" alt="">
                    <br>
                    <br>
                    PROSPECTO: {{$nombreprospecto}}
                </td>
                <td class="header_td2">
                    <span class="title m-b-md">
                        Cotización {{$marca_nombre}} {{$modelo_nombre}} {{$aniofabricacion}} - ${{$valormercado}}
                    </span><br>
                    <span class="title-vigencia m-b-md">
                        PARA USO: {{$uso_nombre}}
                    </span><br>
                    <span class="title-vigencia m-b-md">
                        VÁLIDA DEL {{$validezini}} AL {{$validezfin}}
                    </span><br>
                </td>
                <td class="header_td3">{{ $cotizacion_id }}</td>
            </tr>
        </table>
        <hr class="bar">
        <table class="tbl text-center" style="width: 100%; padding: 0 !important;">
            <tr>
                <th></th>
                <!-- <th>
                    <img src="{{ $base64_logo1 }}" alt="Pacifico Logo">
                </th> -->
                @foreach ($companies as $company)
                    <th>
                        <img src="{{ $company['company_logo_base64'] }}">
                    </th>
                @endforeach
            </tr>
            <tr>
                <td class="text-left"
                    style="width: {{ $width_col }}%;">Prima Total Contado $</td>


                @foreach ($companies as $company)

                <!-- style="width: {{ $width_col }}%;" -->
                <td class="text-center"
                    style="width: {{ $width_col }}%;"
                >
                    {{ $company['primatotal'] ? $company['primatotal'] : 'COTIZACIÓN PERSONALIZADA' }}
                </td>
                @endforeach
            </tr>
            <tr>
                <td style="padding: 0;">
                    <table class="table-intern" >
                        @foreach ($companies[0]['factores'] as $key_cuota => $cuota)
                            <tr>
                                <td class="text-center"
                                    style="height: {{count($companies) >= 5 ? '70px' : '50px'}}"
                                >
                                    Cuota $
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </td>
                @foreach ($companies as $key_company => $company)
                <td class="text-center" style="padding: 0;">

                    <table class="table-intern">
                        @foreach ($company['factores'] as $key_cuota => $cuota)
                        <tr>
                            <td class="text-center"
                                style="height: {{count($companies) >= 5 ? '70px' : '50px'}}"    
                            >

                                {{ $cuota['text_cuota'] }}
                                <br>
                                <span style="font-size: 10px;">{{ $cuota['text_description'] }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </td>
                @endforeach
            </tr>

            <tr>
                <td class="text-left">Requiere GPS</td>

                @foreach ($companies as $company)
                <td class="text-center">{{$company['is_gps']}}</td>
                @endforeach
            </tr>

            <tr>
                <td class="text-left">Soat S/.</td>

                @foreach ($companies as $company)
                    <td class="text-center">{{''}}</td>
                @endforeach
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
                <td colspan="{{ $count_cols }}" class="subtitulo">Coberturas</td>
            </tr>

            @foreach ($coberturas as $key => $cobertura)
            <tr>
                <td class="text-left">{{ $cobertura['name'] }}</td>
                @foreach ($companies as $key_company => $company)
                    <td class="text-center">{{$company['coberturas'][$key]['description']}}</td>
                @endforeach
            </tr>
            @endforeach
            

            <tr>
                <td colspan="{{ $count_cols }}" class="subtitulo">Deducibles</td>
            </tr>

            @foreach ($deducibles as $key => $deducible)
            <tr>
                <td class="text-left">{{ $deducible['name'] }}</td>
                @foreach ($companies as $key_company => $company)
                    <td class="text-center">{{$company['deducibles'][$key]['description']}}</td>
                @endforeach
            </tr>
            @endforeach

            <!-- <tr>
                <td></td>
                @foreach ($companies as $company)
                <td class="text-center" style="padding: 0;">

                    <table class="table-intern-deducibles">
                        @foreach ($company['deducibles'] as $deducible)
                        <tr>
                            <td class="text-center">
                                <p style="font-size: 12px;">
                                    <span style="font-weight: bold;">
                                        {{ $deducible['name'] }}
                                        {{ $deducible['name'] ? ':' : '' }}
                                    </span> 
                                    {{ $deducible['description'] }}
                                </p>
                            </td>

                        </tr>
                        @endforeach
                    </table>

                </td>
                @endforeach
            </tr> -->




            <tr>
                <td colspan="{{ $count_cols }}">
                    <!--<td colspan="7">-->
                    Esta cotización responde a una simulación de contratación. Los términos, condiciones y primas serán especificados en la póliza que se entregará al asegurado luego de la contratación. Para vehículos que no sean cero kilómetros será necesario coordinar una inspección. Los deducibles no incluyen IGV.
                </td>
            </tr>
        </table>

        <!--<br>-->
        <br>
        <div class="left-div-60" style="width: 55%; padding-top: 2rem;">

            <a href="https://www.facebook.com/PrimeraBrokers/"><img src="{{ $base64_redes_sociales['facebook'] }}"></a>&nbsp;
            <a href="https://www.instagram.com/primerabrokers/"><img src="{{ $base64_redes_sociales['instagram'] }}"></a>&nbsp;
            <a href="https://www.linkedin.com/company/primera-brokers/"><img src="{{ $base64_redes_sociales['linkedin'] }}"></a>&nbsp;&nbsp;&nbsp;

        </div>
        <div class="left-div-40">
            <span style="font-size: 12px;"> {!! $name !!}</span>
            <br>
            <span style="font-size: 12px;"> Tienda: {!! $subagente_nombre !!}</span>
            <br>
            <span style="font-size: 12px;"> Email: {!! $email !!}</span>
            <br>
            <span style="font-size: 12px;"> Teléfono {!! $telefono !!}</span>
        </div>
    </div>

</body>

</html>