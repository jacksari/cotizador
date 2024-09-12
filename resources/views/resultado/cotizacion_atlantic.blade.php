<!DOCTYPE html>
<html lang="es" style="height:100%;">
<head>
    <meta charset="utf-8">
    <title>Atlantic Corredores de Seguros</title>
<link href="{{ asset('atlantic/images/favicon.ico') }}"  type="image/x-icon" rel="shortcut icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="pinegrow, blocks, bootstrap" />
    <meta name="description" content="Verifica Online" />
    <link rel="shortcut icon" href="{{ asset('atlantic/ico/favicon.png') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Core CSS -->
    <link href="{{ asset('atlantic/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('atlantic/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet">
    <!-- Style Library -->
    <link href="{{ asset('atlantic/css/style-library-1.css') }}" rel="stylesheet">
    <link href="{{ asset('atlantic/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('atlantic/css/blocks.css') }}" rel="stylesheet">
    <link href="{{ asset('atlantic/css/custom.css') }}" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="{{ asset('atlantic/js/html5shiv.js') }}"></script>
    <script src="{{ asset('atlantic/js/respond.min.js') }}"></script>
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
                <a href="/index.php">
                    <img src="{{ asset('atlantic/images/logo-pista-final.png') }}" class="brand-img img-responsive" style="max-height: 92px;">
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
                        <a href="mailto:atencionalcliente@verifica.online" class="black">escríbenos</a>
                    </li>
                    <!--//dropdown-->
                    <li class="nav-item">
                        <a style="border-radius: 5px; border: 2px solid; padding-bottom:10px; padding-top:10px; margin-top:4px" class="tamarind">LLÁMANOS: +(511) 226 0736 / 981-215-226</a>
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
        <h2 class="'button"><a href="llopez@atlanticcorredores.com">llopez@atlanticcorredores.com</a></h2>
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
		<div class="table-responsive">
		<table class="tabla1" style="width: 100%;">
  <tbody>
    <tr>
      <th>Aseguradoras</th>
      <th>Prima Anual<br>
      (Incluye IGV)</th>
      <th class="oculta">Beneficios Seguro Simple</th>
      <th>GPS<br>
        (Requerido)</th>
      <th>Coberturas y beneficios</th>
      <th>Deducibles - (No incluye IGV)</th>
    </tr>
    <tr>
      <td align="center"><img src="{{ asset('atlantic/images/logoPacifico.png') }}" alt="" class="logoA"/></td>
      <td align="center" class="prima">{{$prima1}}</td>
      <td align="center" class="oculta">Tarjeta de regalo por<br>
        <span class="txtRegalo">$60 <img src="{{ asset('atlantic/images/preg.png') }}" class="star" alt=""/></span></td>
      <td align="center">{{$gps1}}</td>
      <td><p style="text-align: center;"><img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_med.png') }}" class="star" alt=""/></p>
        <p>Daño Propio: Valor Convenido<br>
          Resp. Civil a 3ros: hasta $150,000<br>
      Chofer de reemplazo: 3 por año</p></td>
      <td><p style="text-align: center;"><img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_med.png') }}" class="star" alt=""/></p>
        <p>Taller Multimarca/Preferente: 15%, Min $150<br>
        Taller Afiliado: 20%, Min $200<br>
        Taller no Afiliado: Plan no aplica</p></td>
    </tr>
    <tr>
      <td align="center"><img src="{{ asset('atlantic/images/logoPositiva.png') }}" alt="" class="logoA"/></td>
      <td align="center" class="prima">{{$prima2}}</td>
      <td align="center" class="oculta">Tarjeta de regalo por<br>
        <span class="txtRegalo">$70 <img src="{{ asset('atlantic/images/preg.png') }}" class="star" alt=""/></span></td>
      <td align="center">{{$gps2}}</td>
      <td><p style="text-align: center;"><img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_med.png') }}" class="star" alt=""/></p>
        <p>Daño Propio: Valor Asegurado<br>
          Resp. Civil a 3ros: hasta $150,000<br>
          Chofer de reemplazo: 3 por año</p></td>
      <td><p style="text-align: center;"><img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_med.png') }}" class="star" alt=""/></p>
        <p>Taller Multimarca/Preferente: 10%, Min $150 / 12% Min $200<br>
          Taller Afiliado: 20%, Min $500<br>
          Taller no Afiliado: 20%, Min $300</p></td>
    </tr>
    <tr>
      <td align="center"><img src="{{ asset('atlantic/images/logoRimac.png') }}" alt="" class="logoA"/></td>
      <td align="center" class="prima">{{$prima3}}</td>
      <td align="center" class="oculta">Tarjeta de regalo por<br>
        <span class="txtRegalo">. <img src="{{ asset('atlantic/images/preg.png') }}" class="star" alt=""/></span></td>
      <td align="center">{{$gps3}}</td>
      <td><p style="text-align: center;"><img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_med.png') }}" class="star" alt=""/></p>
        <p>Daño Propio: Suma Segurada<br>
          Resp. Civil a 3ros: hasta $150,000<br>
          Chofer de reemplazo: 3 al año sin costo /$25 adicionales</p></td>
      <td><p style="text-align: center;"><img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_med.png') }}" class="star" alt=""/></p>
        <p>Taller Multimarca/Preferente: 10%, Min $150<br>
          Taller Afiliado: RED 1 - 15%, Min $200 / RED 2 : 20%, Min $200<br>
          Taller no Afiliado:  25%, Min $350</p></td>
    </tr>
    <tr>
      <td align="center"><img src="{{ asset('atlantic/images/mapfre.png') }}" alt="" class="logoA"/></td>
      <td align="center" class="prima">{{$prima4}}</td>
      <td align="center" class="oculta">Tarjeta de regalo por<br>
        <span class="txtRegalo">$70 <img src="{{ asset('atlantic/images/preg.png') }}" class="star" alt=""/></span></td>
      <td align="center">{{$gps4}}</td>
      <td><p style="text-align: center;"><img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_med.png') }}" class="star" alt=""/></p>
        <p>Daño Propio: Valor Asegurado (2 años)<br>
          Resp. Civil a 3ros: hasta $150,000<br>
          Chofer de reemplazo: 5 por año (Co pago S/20.00)</p></td>
      <td><p style="text-align: center;"><img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_med.png') }}" class="star" alt=""/></p>
        <p>Taller Multimarca/Preferente: 10%, Min $150<br>
          Taller Afiliado: RED 1 - 15%, Min $150 / RED 2 : 20%, Min $200<br>
          Taller no Afiliado:  20%, Min $300</p></td>
    </tr>
    {{--<tr>--}}
      {{--<td align="center"><img src="{{ asset('atlantic/images/logoHDI.png') }}" alt="" class="logoA"/></td>--}}
      {{--<td align="center" class="prima">{{$prima5}}</td>--}}
      {{--<td align="center" class="oculta">Tarjeta de regalo por<br>--}}
        {{--<span class="txtRegalo">$60 <img src="{{ asset('atlantic/images/preg.png') }}" class="star" alt=""/></span></td>--}}
      {{--<td align="center">{{$gps5}}</td>--}}
      {{--<td><p style="text-align: center;"><img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_med.png') }}" class="star" alt=""/></p>--}}
        {{--<p>Daño Propio: Valor Convenido<br>--}}
          {{--Resp. Civil a 3ros: hasta $150,000<br>--}}
          {{--Chofer de reemplazo: 3 por año</p></td>--}}
      {{--<td><p style="text-align: center;"><img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_full.png') }}" class="star" alt=""/> <img src="{{ asset('atlantic/images/star_med.png') }}" class="star" alt=""/></p>--}}
        {{--<p>Taller Multimarca/Preferente: 15%, Min $150<br>--}}
          {{--Taller Afiliado: 20%, Min $200<br>--}}
          {{--Taller no Afiliado: Plan no aplica</p></td>--}}
    {{--</tr>--}}
  </tbody>
</table>
	</div>	

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
                <img src="{{ asset('atlantic/images/logo-pie.png') }}" class="brand-img img-responsive">
                <h5 style="color:white">La mejor opción para cotizar de la forma más rápida desde la comodidad de su hogar.</h5>
                <div class="row pad15">
					<div class="col-xs-2 text-right">
                        <span class="fa white fa-user-circle fa-3x"></span>
						<i class="far fa-user-circle"></i>
                    </div>
					<div class="col-xs-10"><h6 class="h3-mobile white">ATLANTIC Corredores de Seguros SAC<br>Registro SBS Nro. J-0768</h6>
					</div>
					
                    <div class="col-xs-2 text-right">
                        <span class="fa white fa-mobile-phone fa-3x"></span>
                    </div>
                    <div class="col-xs-10">
                        <h6 class="h3-mobile white">+51 226-0736  <br> +51 981-215-226</h6>
                    </div>
                </div>
                <div class="row pad15">
                    <div class="col-xs-2 text-right">
                        <span class="fa white fa-envelope-o fa-2x"></span>
                    </div>
                    <a href="">
                        <div class="col-xs-10">
                            <h6 class="h3-mobile white" href="mailto:llopez@atlanticcorredores.com">llopez@atlanticcorredores.com</h6>
                        </div>
                    </a>
                </div>
                <div class="row pad15">
                    <div class="col-xs-2 text-right">
                        <span class="fa white fa-map-marker fa-2x"></span>
                    </div>
                    <div class="col-xs-10">
                        <h6 class="h3-mobile white">Calle Ricardo Angulo 745 Of. 405 Corpac<br>San Isidro, Lima - Perú</h6>
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
                        <a href="mailto:llopez@atlanticcorredores.com">Escríbenos</a>
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
                <p style="font-size:12px; color:#4d8dc3;">Las condiciones presentadas en nuestras cotizaciones representan un resumen de la póliza de seguros que será emitida por la compañía de seguros elegida y tiene una validez de 10 días desde que es enviada por correo electrónico.</p>
                <p style="font-size:12px; color:#4d8dc3;">Para un detalle de las coberturas, condiciones y servicios ofrecidos por cada compañía de seguros, siempre deben revisarse los términos de la póliza emitida y ante cualquier discrepancia con lo indicado en nuestra página web, prevalecerán los términos de la póliza emitida. Si la póliza no cumpliera con sus expectativas, tiene Usted un plazo de 30 días para devolverla sin que esto implique pago alguno.<br></p>
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
<script src="{{ asset('atlantic/js/jquery-1.11.1.min.js') }}" type="pinegrow/disabled"></script>
<script src="{{ asset('atlantic/js/bootstrap.min.js') }}" type="pinegrow/disabled"></script>
<script src="{{ asset('atlantic/js/plugins.js') }}" type="pinegrow/disabled"></script>
<script src="https://maps.google.com/maps/api/js?sensor=true" type="pinegrow/disabled"></script>
<script src="{{ asset('atlantic/js/bskit-scripts.js') }}" type="pinegrow/disabled"></script>

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
