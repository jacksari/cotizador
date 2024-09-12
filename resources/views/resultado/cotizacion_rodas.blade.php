<!DOCTYPE html>
<html lang="es" style="height:100%;">
<head>
    <meta charset="utf-8">
    <title>Gustavo Castillo - Corredor de Seguros</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="pinegrow, blocks, bootstrap" />
    <meta name="description" content="Gustavo Castillo - Corredor de Seguros" />
    <link rel="shortcut icon" href="{{ asset('rodas/ico/favicon.png') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Core CSS -->
    <link href="{{ asset('rodas/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('rodas/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet">
    <!-- Style Library -->
    <link href="{{ asset('rodas/css/style-library-1.css') }}" rel="stylesheet">
    <link href="{{ asset('rodas/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('rodas/css/blocks.css') }}" rel="stylesheet">
    <link href="{{ asset('rodas/css/custom.css') }}" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="{{ asset('rodas/js/html5shiv.js') }}"></script>
    <script src="{{ asset('rodas/js/respond.min.js') }}"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/crudbooster/assets/sweetalert/dist/sweetalert.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <style>
        /*html, body {
            background-color: #fff;
            color: #000000;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }*/

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
            width: 16.67%;
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
            font-size: medium;
        }

        .tbl .text-left {
            text-align: left;
        }

    </style>
</head>
<body data-spy="scroll" data-target="nav">
<header id="header-1" class="soft-scroll header-1">
    <!-- Navbar -->
    <nav class="main-nav navbar-fixed-top headroom headroom--pinned bg-white pad10" style="height:95px;">
        <div class="container">
            <!-- Brand and toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php">
                    <img src="{{ asset('rodas/images/logo-pista-final.png') }}" class="brand-img img-responsive" style="max-height: 92px;">
                </a>
            </div>
            <!-- Navigation -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active nav-item">
                        <a href="index.php#nosotros">nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php#beneficios" class="black">beneficios</a>
                    </li>
                    <li class="nav-item">
                        <a href="mailto:gcastillogamarra@gmail.com" class="black">escríbenos</a>
                    </li>
                    <!--//dropdown-->
                    <li class="nav-item">
                        <a style="border-radius: 5px; border: 2px solid; padding-bottom:10px; padding-top:10px; margin-top:4px" class="tamarind">LLÁMANOS: +51 981-456-650</a>
                    </li>
                </ul>
                <!--//nav-->
            </div>
            <!--// End Navigation -->
        </div>
        <!--// End Container -->
    </nav>
    <!--// End Navbar -->
</header>
<section id="content-2-1" class="content-block content-2-1 bg-deepocean pad5 pad-bottom10">
    <div class="container text-center container-llamanos">
        <h2>Pregúntanos por las opciones de financiación</h2>
        <h2 class="'button"><a href="gcastillogamarra@gmail.com">gcastillogamarra@gmail.com</a></h2>
    </div>
    <!-- /.container -->
</section>
<div class="content-block contact-3 bg-clouds" id="contacto">
    <div class="container">
        {{--<div class="row">--}}

            {{--<div class="row centrar">--}}

                <div style="width: 100%;">
                    <div class="text-center">
                        <h4>Cotizaci&oacute;n: {{$marca}} {{$modelo}} {{$aniofabricacion}} - ${{ number_format($valormercado) }}</h4>
                        {{--{{$nombreprospecto}} / {{$emailprospecto}} / {{$celularprospecto}}<br>--}}
                        {{--V&aacute;LIDA DEL {{$validezini}} AL {{$validezfin}}<br>--}}
                        <h5>Tipo de Seguro: Uso {{$uso}} - {{$region}} - Gas: {{$convertidogas}} - Cotizaci&oacute;n: {{ $cotizacion_id }} - {{$observacion}}</h5>
                    </div>
                </div>
                <hr class="bar">
                <table class="tbl">
                    <tr>
                        <th></th>
                        <th><img src="{{ asset('uploads/'.$logo1) }}" alt=""></th>
                        <th><img src="{{ asset('uploads/'.$logo2) }}" alt=""></th>
                        <th><img src="{{ asset('uploads/'.$logo3) }}" alt=""></th>
                        <th><img src="{{ asset('uploads/'.$logo4) }}" alt=""></th>
                        <th><img src="{{ asset('uploads/'.$logo5) }}" alt=""></th>
                    </tr>
                    <tr>
                        <td class="text-left">Prima Total Contado $</td>
                        <td class="prima">{{$prima1}}</td>
                        <td class="prima">{{$prima2}}</td>
                        <td class="prima">{{$prima3}}</td>
                        <td class="prima">{{$prima4}}</td>
                        <td class="prima">{{$prima5}}</td>
                    </tr>
                    <tr>
                        <td class="text-left">Cuotas $</td>
                        <td>{{$cuotasA[0]}}</td>
                        <td>{{$cuotasB[0]}}</td>
                        <td>{{$cuotasC[0]}}</td>
                        <td>{{$cuotasD[0]}}</td>
                        <td>{{$cuotasE[0]}}</td>
                    </tr>
                    <tr>
                        <td class="text-left">Cuotas $</td>
                        <td>{{$cuotasA[1]}}</td>
                        <td>{{$cuotasB[1]}}</td>
                        <td>{{$cuotasC[1]}}</td>
                        <td>{{$cuotasD[1]}}</td>
                        <td>{{$cuotasE[1]}}</td>
                    </tr>
                    <tr>
                        <td class="text-left">Cuotas $</td>
                        <td>{{$cuotasA[2]}}</td>
                        <td>{{$cuotasB[2]}}</td>
                        <td>{{$cuotasC[2]}}</td>
                        <td>{{$cuotasD[2]}}</td>
                        <td>{{$cuotasE[2]}}</td>
                    </tr>
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
                        <td colspan="{{ $table_td_colspan }}" class="subtitulo">Coberturas</td>
                    </tr>
                    <tr>
                        <td class="text-left">Daño Propio (Choque, Vuelco, Incendio, Robo Total/Parcial)</td>
                        <td>Valor Pactado</td>
                        <td>Valor Comercial</td>
                        <td>Valor Comercial</td>
                        <td>Valor Pactado</td>
                        <td>Valor Pactado</td>
                    </tr>
                    <tr>
                        <td class="text-left">Responsabilidad Civil frente a terceros hasta</td>
                        <td>US$ 150,000</td>
                        <td>US$ 150,000</td>
                        <td>US$ 100,000</td>
                        <td>US$ 150,000</td>
                        <td>S/.450</td>
                    </tr>
                    <tr>
                        <td class="text-left">Muerte e Invalidez Permanente c/u hasta</td>
                        <td>US$ 25,000 c/u</td>
                        <td>US$ 20,000 c/u</td>
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
                        <td class="text-left">Cirugia Est&eacute;tica</td>
                        <td>No Cubre</td>
                        <td>No Cubre</td>
                        <td>No Cubre</td>
                        <td>Hasta US$ 10,000</td>
                        <td>Según Clausula</td>
                    </tr>
                    <tr>
                        <td class="text-left">Gastos de Sepelio</td>
                        <td>US$ 2,000 c/u</td>
                        <td>US$ 1,000 c/u</td>
                        <td>US$ 1,000 c/u</td>
                        <td>US$ 2,000 c/u</td>
                        <td>S/.3,000 max. 5 personas</td>
                    </tr>
                    <tr>
                        <td class="text-left">Responsabilidad Civil frente a Ocupantes por vehículo (no chofer), hasta</td>
                        <td>US$ 25,000 c/u max 4</td>
                        <td>US$ 50,000</td>
                        <td>US$ 30,000 c/u</td>
                        <td>US$ 50,000</td>
                        <td>S/.30,000 max. 4 ocupantes</td>
                    </tr>
                    <tr>
                        <td class="text-left">Riesgos de la Naturaleza (Terremoto, Maremoto, Lluvia, Inundación, Huayco y Aluvión)</td>
                        <td>Valor Pactado</td>
                        <td>Valor Comercial</td>
                        <td>Valor Comercial</td>
                        <td>Valor Pactado</td>
                        <td>Valor Pactado</td>
                    </tr>
                    <tr>
                        <td class="text-left">Riesgos Políticos (Huelga y Conmoción Civil, Daño Malicioso, Vandalismo y Terrorismo)</td>
                        <td>Valor Pactado</td>
                        <td>Valor Comercial</td>
                        <td>Valor Comercial</td>
                        <td>Valor Pactado</td>
                        <td>Valor Pactado</td>
                    </tr>
                    <tr>
                        <td class="text-left">Accesorios Musicales (máximo 10% Suma Asegurada) hasta</td>
                        <td>US$ 1,000</td>
                        <td>US$ 1,000</td>
                        <td>US$ 1,000</td>
                        <td>US$ 1,000</td>
                        <td>Hasta S/.4,000</td>
                    </tr>
                    <tr>
                        <td class="text-left">Uso de Vías no Autorizadas según condiciones</td>
                        <td>Valor Pactado</td>
                        <td>Valor Comercial</td>
                        <td>Valor Comercial</td>
                        <td>Valor Pactado</td>
                        <td>Valor Pactado</td>
                    </tr>
                    <tr>
                        <td class="text-left">Rotura Accidental de lunas</td>
                        <td>Cubierto</td>
                        <td>Cubierto</td>
                        <td>Cubierto</td>
                        <td>Cubierto</td>
                        <td>Cubierto</td>
                    </tr>
                    <tr>
                        <td class="text-left">Servicio de Vehículos de reemplazo</td>
                        <td>Hasta 15 días, choque 30 dias</td>
                        <td>Hasta 15 días</td>
                        <td>Hasta 15 días</td>
                        <td>Hasta 15 días</td>
                        <td>15 dias por choque, 30 dias por robo</td>
                    </tr>
                    <tr>
                        <td class="text-left">Perdida Total por Choque</td>
                        <td>Valor Pactado</td>
                        <td>Valor Comercial</td>
                        <td>Valor Comercial</td>
                        <td>Valor Pactado</td>
                        <td>Valor Pactado</td>
                    </tr>
                    <tr>
                        <td class="text-left">Auxilio Mec&aacute;nico, Grua, ambulancia en caso de siniestro</td>
                        <td>Hasta US$ 250 por evento</td>
                        <td>Hasta US$ 250 por evento</td>
                        <td>Hasta US$ 250 por evento</td>
                        <td>Hasta US$ 250 por evento</td>
                        <td>Cubierto</td>
                    </tr>
                    <tr>
                        <td class="text-left">Servicio de Chofer de Reemplazo,</td>
                        <td>Max. 3 asistencias, US$.25 adicional</td>
                        <td>Max. 3 asistencias</td>
                        <td>Max. 3 asistencias</td>
                        <td>Las primeras 5 con pago de S/.20.00 apartir de la 6 pago de S/.60.00</td>
                        <td>3 al año sin deducible</td>
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
                        <td class="text-left">Daño Propio (Choque, Vuelvo, Incendio, Robo Total/Parcial)</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>15%, mínimo US$ 150</td>
                        <td>15%, mínimo US$ 150</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>Deducible fijo</td>
                    </tr>
                    <tr>
                        <td class="text-left">Robo Parcial</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>10% mínimo US$ 150</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>Deducible fijo</td>
                    </tr>
                    <tr>
                        <td class="text-left">Ausencia de control y pérdida total por ausencia de control</td>
                        <td>25%, mínimo US$ 500</td>
                        <td>si se otorga 25% mínimo US$ 300</td>
                        <td>si se otorga 25% mínimo US$ 500</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>Adicional 20%</td>
                    </tr>
                    <tr>
                        <td class="text-left">Huelgas y Conmoción Civil, Daño Malicioso, Vandalismo y terrorismo</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>Deducible fijo</td>
                    </tr>
                    <tr>
                        <td class="text-left">Riesgos de la Naturaleza</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>Deducible fijo</td>
                    </tr>
                    <tr>
                        <td class="text-left">Vías no autorizadas</td>
                        <td>20% minimo US$.200</td>
                        <td>según póliza</td>
                        <td>según póliza</td>
                        <td>según póliza</td>
                        <td>Deducible fijo</td>
                    </tr>
                    <tr>
                        <td class="text-left">Siniestro con Conductor menor de</td>
                        <td>Se duplica</td>
                        <td>29 años, 15% minimo US$ 300</td>
                        <td>29 años, 15% minimo US$ 300</td>
                        <td>25 años, 15% min $ 300</td>
                        <td>Se duplica</td>
                    </tr>
                    <tr>
                        <td class="text-left">Vehículo de reemplazo</td>
                        <td>US$ 90 + IGV</td>
                        <td>US$ 100 + IGV</td>
                        <td>US$ 100 + IGV</td>
                        <td>US$ 70 + IGV</td>
                        <td>S/.330 + IGV</td>
                    </tr>
                    <tr>
                        <td class="text-left">Rotura de lunas Accidental: Lunas Importadas</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>10%, mínimo US$ 150</td>
                        <td>Deducible fijo</td>
                    </tr>
                    <tr>
                        <td class="text-left">Rotura de lunas Accidental: Lunas Nacional</td>
                        <td>Sin deducible</td>
                        <td>Sin deducible</td>
                        <td>Sin deducible</td>
                        <td>Sin deducible</td>
                        <td>Sin deducible</td>
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
                        <td colspan="{{ $table_td_colspan }}" class="subtitulo">Cobertura Talleres</td>
                    </tr>
                    <tr>
                        <td class="text-left"></td>
                        <td>
                            @foreach($deducibles1 as $deducible1)

                                {{$deducible1}}<br>

                            @endforeach
                        </td>
                        <td>
                            @foreach($deducibles2 as $deducible2)

                                {{$deducible2}}<br>

                            @endforeach
                        </td>
                        <td>
                            @foreach($deducibles3 as $deducible3)

                                {{$deducible3}}<br>

                            @endforeach
                        </td>
                        <td>
                            @foreach($deducibles4 as $deducible4)

                                {{$deducible4}}<br>

                            @endforeach
                        </td>
                        <td>
                            @foreach($deducibles5 as $deducible5)

                                {{$deducible5}}<br>

                            @endforeach
                        </td>
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
                        <td colspan="{{ $table_td_colspan }}">Todos los deducibles no incluyen el impuesto del IGV<br><strong>Las primas cotizadas son aproximadas y están sujetas a variación</strong></td>
                    </tr>
                </table>

            {{--</div>--}}

            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <a href="{{ asset('/') }}" class="btn btn-block btn-primary">COTIZAR OTRO VEHICULO</a>
            </div>
            <div class="col-md-3"></div>
        {{--</div>--}}
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<section class="content-block-nopad bg-deepocean footer-wrap-1-1">
    <div class="container footer-1-1">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset('rodas/images/logo-pie.png') }}" class="brand-img img-responsive">
                <h5 style="color:white">La mejor opción para cotizar de la forma más rápida desde la comodidad de su hogar.</h5>
                <div class="row pad15">
                    <div class="col-xs-2 text-right">
                        <span class="fa white fa-mobile-phone fa-3x"></span>
                    </div>
                    <div class="col-xs-10">
                        <h6 class="h3-mobile white">+51 981-456-650</h6>
                    </div>
                </div>
                <div class="row pad15">
                    <div class="col-xs-2 text-right">
                        <span class="fa white fa-envelope-o fa-2x"></span>
                    </div>
                    <a href="">
                        <div class="col-xs-10">
                            <h6 class="h3-mobile white" href="mailto:gcastillogamarra@gmail.com">gcastillogamarra@gmail.com</h6>
                        </div>
                    </a>
                </div>
                <div class="row pad15">
                    <div class="col-xs-2 text-right">
                        <span class="fa white fa-map-marker fa-2x"></span>
                    </div>
                    <div class="col-xs-10">
                        <h6 class="h3-mobile white">Jr. Juno B-13, Lima 09 - Lima<br></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <h4>Links de interés</h4>
                <ul>
                    <li>
                        <a href="#nosotros" data-html="false">Nosotros</a>
                    </li>
                    <li>
                        <a href="#beneficios">Beneficios</a>
                    </li>
                    <li>
                        <a href="mailto:gcastillogamarra@gmail.com">Escríbenos</a>
                    </li>
                    <div class="row pad15">
                        <div class="col-xs-2 text-right">
                            <a href="#" target="_blank" span class="fa white fa-2x fa-facebook-f fa-fw"></a>
                        </div>
                        <div class="col-xs-10">
                            <a class="h3-mobile white" style="font-size:16px" href="#" target="_blank">Síguenos en facebook</a>
                        </div>
                    </div>
                    <div class="row pad15">
                        <div class="col-xs-2 text-right">
                            <a href="#" target="_blank" span class="fa white fa-2x fa-instagram fa-fw"></a>
                        </div>
                        <div class="col-xs-10">
                            <a class="h3-mobile white" style="font-size:16px" href="#" target="_blank">Síguenos en instagram</a>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Información importante</h4>
                <p style="font-size:12px; color:grey;">Las condiciones presentadas en nuestras cotizaciones representan un resumen de la póliza de seguros que será emitida por la compañía de seguros elegida y tiene una validez de 10 días desde que es enviada por correo electrónico.</p>
                <p style="font-size:12px; color:grey;">Para un detalle de las coberturas, condiciones y servicios ofrecidos por cada compañía de seguros, siempre deben revisarse los términos de la póliza emitida y ante cualquier discrepancia con lo indicado en nuestra página web, prevalecerán los términos de la póliza emitida. Si la póliza no cumpliera con sus expectativas, tiene Usted un plazo de 30 días para devolverla sin que esto implique pago alguno.<br></p>
                <br>
            </div>
            <div class="col-md-3">
                <h4>Más fácil imposible</h4>
                <a href="index.php#cotizar" class="btn btn-block btn-primary">Cotizar ya</a>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
{{--<script type="text/javascript">--}}
{{--(function(d,s,id){var z=d.createElement(s);z.type="text/javascript";z.id=id;z.async=true;z.src="//static.zotabox.com/d/f/df446ef30c694e6eddf294cb7be167a5/widgets.js";var sz=d.getElementsByTagName(s)[0];sz.parentNode.insertBefore(z,sz)}(document,"script","zb-embed-code"));--}}
{{--</script>--}}
<script src="{{ asset('rodas/js/jquery-1.11.1.min.js') }}" type="pinegrow/disabled"></script>
<script src="{{ asset('rodas/js/bootstrap.min.js') }}" type="pinegrow/disabled"></script>
<script src="{{ asset('rodas/js/plugins.js') }}" type="pinegrow/disabled"></script>
<script src="https://maps.google.com/maps/api/js?sensor=true" type="pinegrow/disabled"></script>
<script src="{{ asset('rodas/js/bskit-scripts.js') }}" type="pinegrow/disabled"></script>

<script src="{{ asset('vendor/crudbooster/assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/crudbooster/assets/sweetalert/dist/sweetalert.min.js') }}"></script>
<!-- Include this after the sweet alert js file -->
@include('sweet::alert')

<script>
    $(document).ready( function () {


    });
</script>
</body>
</html>
{{--<script>--}}
    {{--document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] +--}}
        {{--':35729/livereload.js?snipver=1"></' + 'script>')--}}
{{--</script>--}}
