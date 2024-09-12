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
<section id="cotizar" class="content-block content-1-2 bg-image-cover" style="background-image:url({{ asset('rodas/images/Background-con-mas-brillo.jpg') }});">
    <div class="container">
        <!-- Start Row -->
        <div class="row">
            <div class="margin-top90 col-sm-6">
                <h2></h2>
                <h1 class="white"><b class="sombra-texto-inicio">¡Complete el formulario<br>y cotice al instante!<br></b></h1>
                <h3 class="offwhite sombra-texto-inicio">Ahorra con nosotros y encuentra el descuento que hará más económica tu cotización.<br></h3>
            </div>
            <div class="pad25 bg-clouds pad-bottom20 col-sm-5 col-sm-offset-1">
                <form action="{{ asset('store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="marcas_id" id="marcas_id" class="form-control" autofocus="" required>
                                    <option value="">Marca</option>
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="modelos_id" id="modelos_id" required class="form-control">
                                    <option value="">Modelo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="aniofabricacion" id="aniofabricacion" required class="form-control">
                                    <option value="">Año</option>
                                    @for ($i = 0; $i < 18; $i++)
                                        <option value="{{ $curYear - $i }}">{{ $curYear - $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">US$</span>
                                    <input type="number" class="form-control" placeholder="Valor" name="valormercado" id="valormercado" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="usos_id" id="usos_id" required class="form-control">
                                    <option value="">Uso</option>
                                    @foreach ($usos as $uso)
                                        <option value="{{ $uso->id }}">{{ $uso->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="edad">
                                <select name="edad" id="edad" required class="form-control">
                                    <option value="">Edad</option>
                                    @for ($i = 18; $i < 100; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label tamarind" for="formInput1066">Convertido a gas</label>
                                <select id="is_convertidogas" name="is_convertidogas" required class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label tamarind" for="formInput1066">Región</label>
                                <select id="region" name="region" required class="form-control">
                                    <option value="Lima">Lima</option>
                                    <option value="Provincia">Provincia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="celular" id="celular" placeholder="Teléfono" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombreprospecto" id="nombreprospecto" required placeholder="Nombre y Apellido">
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label class="control-label tamarind">
                                <input type="checkbox" value="1" name="is_comonuevo" id="is_comonuevo" style="z-index: 99999"> Vehículo es cero kilometros.
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label tamarind">¿Desearía recibir promociones y noticias por parte de nosotros?</label>
                        <div class="checkbox">
                            <label class="control-label tamarind">
                                <input type="checkbox" value="1" name="is_mailing" id="is_mailing" checked="checked" style="z-index: 99999"> Si, acepto recibir promociones y noticias.
                            </label>
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<input type="text" class="form-control" id="observacion" placeholder="Código Promocional" name="observacion">--}}
                    {{--</div>--}}
                    <div class="clearfix"></div>
                        <input type="hidden" class="form-control" id="observacion" name="observacion">
                    {{--<a class="btn btn-primary btn-block" id="botoncotizar">Cotizar ya</a>--}}
                    <input type="submit" class="btn btn-primary btn-block" value="Cotizar" id="btnCotizar" name="btnCotizar" >
                </form>
            </div>
        </div>
        <!--// END Row -->
    </div>
</section>
<section id="logoseguros" class="content-1-7 content-block grayscale">
    <div class="container">
        <div class="row">
            <div class="col-md-3 pad15 marginbot-iconos pad-bottom20">
                <img alt="Client Logo" src="{{ asset('rodas/images/partner-logos/rimac.png') }}">
            </div>
            <div class="col-md-2 marginbot-iconos margin-bottom20">
                <img alt="Client Logo" src="{{ asset('rodas/images/partner-logos/pacifico%20seguros.png') }}">
            </div>
            <div class="col-md-2 marginbot-iconos margin-bottom20" id="beneficios">
                <img alt="Client Logo" src="{{ asset('rodas/images/partner-logos/la%20positiva.png') }}">
            </div>
            <div class="col-md-2 marginbot-iconos margin-bottom20">
                <img alt="Client Logo" src="{{ asset('rodas/images/partner-logos/Mapfre_logo.svg.png') }}">
            </div>
            <div class="col-md-3 margin-top15 marginbot-iconos">
                <img alt="Client Logo" src="{{ asset('rodas/images/partner-logos/hdi_seguros_3.png') }}">
            </div>
        </div>
        <!--end of row-->
    </div>
    <!-- /.container -->
</section>
<section id="beneficios2" class="content-2-8 content-block-nopad bg-clouds">
    <div class="image-container col-sm-5 pull-left">
        <div class="background-image-holder" style="background-image:url({{ asset('rodas/images/chicacarro.jpg') }});">
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-6 col-sm-7 col-sm-offset-5 col-xs-12 content clearfix" style="color: #000000;">
                <h2 class="text-left">Simplificamos la forma de cotizar la mejor póliza para tu vehículo.</h2>
            <p class="lead"><b>Gustavo Castillo - Corredor de Seguros</b> nace como una iniciativa para simplificar los procedimientos de cotización de un seguro de vehículos y tener de forma rápida un comparativo de precios y coberturas de las principales compañías de seguros.</p>
            <p class="lead">Además, buscamos mejorar nuestros procesos de atención de clientes y siniestros, de tal manera que el ahorro que generan estas mejoras pueda trasladarse al precio final en favor de nuestros clientes. <b>Gustavo Castillo - Corredor de Seguros</b> está especializado en cotización y promoción digital de seguros a nivel nacional</p>
                <!-- /.row -->
                <!-- /.row -->
            </div>
        </div>
        <!-- /.row-->
    </div>
    <!-- /.container -->
</section>
<section id="totalnosotros" class="content-block content-1-3 bg-offwhite">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h1 class="pad-bottom20">Estamos a tu total servicio</h1>
                </div>
            </div>
        </div>
        <div class="row imagen-oculta">
            <img src="{{ asset('rodas/images/cuadros3.png') }}" alt="" class="img-responsive center-block">
        </div>
        <div class="row imagen-muestra">
            <img src="{{ asset('rodas/images/cuadros-lineal3.png') }}" alt="" class="img-responsive center-block">
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<section id="content-2-1" class="content-block content-2-1 bg-deepocean">
    <div class="container text-center container-llamanos">
        <div class="row">
            <h2>¿Dudas acerca de cómo cotizar?</h2>
        </div>
<div class="row">
            <h2> <i class="fa fa-whatsapp fa-1x fa-inverse fa-fw"></i> +51 981-456-650</h2>
        </div>
    </div>
    <!-- /.container -->
</section>

<div class="content-block contact-3 bg-clouds" id="contacto">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="contact" class="form-container">
                    <fieldset>
                        <div id="message"></div>
                        <form method="POST" action="{{ asset('send') }}" name="contactform" id="contactform">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input name="name" id="name" type="text" value="" placeholder="Nombre" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <input name="email" id="email" type="email" value="" placeholder="Email" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <input name="phone" id="phone" type="text" value="" placeholder="Teléfono" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" class="form-control" rows="3" placeholder="Mensaje" required ></textarea>
                                <div class="editContent">
                                    <p class="small text-muted"><span class="guardsman">* Todos los campos son requeridos, te responderemos a la brevedad posible.</span></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" id="cf-submit" name="submit">Enviar</button>
                            </div>
                        </form>
                    </fieldset>
                </div>
                <!-- /.form-container -->
            </div>
            <div class="col-md-6">
                <h2>¿Tienes alguna duda?</h2>
                <p>Despeja cualquier duda que tengas acerca de como conseguir la mejor póliza de seguro vehicular con nosotros. Te responderemos a la brevedad posible.</p>
                <img class="img-responsive map-img" src="{{ asset('rodas/images/foto-contacto.jpg') }}">
            </div>
        </div>
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
                            <a href="https://www.instagram.com/segurorodas/" target="_blank" span class="fa white fa-2x fa-instagram fa-fw"></a>
                        </div>
                        <div class="col-xs-10">
                            <a class="h3-mobile white" style="font-size:16px" href="https://www.instagram.com/segurorodas/" target="_blank">Síguenos en instagram</a>
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

        $("#marcas_id")
            .change(function () {

                if ($("#marcas_id").val() != "") {

                    var ModelosOptions = {};
                    ModelosOptions.url = "{{ asset('getmodelos') }}/" + $("#marcas_id").val();
                    ModelosOptions.type = "GET";
                    //ModelosOptions.data = JSON.stringify({id:$("#marcas_id").val()});
                    ModelosOptions.datatype = "json";
                    ModelosOptions.contentType = "application/json";
                    ModelosOptions.success = function (itemList) {
                        $("#modelos_id").empty();
                        $("#modelos_id").append("<option value=''>::Modelo::</option>");
                        for (var i = 0; i < itemList.length; i++) {
                            $("#modelos_id")
                                .append("<option value='" +
                                    //itemList[i] +
                                    itemList[i].id +
                                    "'>" +
                                    //itemList[i] +
                                    itemList[i].nombre +
                                    "</option>");
                        }
                    };
                    ModelosOptions.error = function() { alert("Error obteniendo modelos!!"); };
                    $.ajax(ModelosOptions);

                } else {
                    $("#modelos_id").empty();
                    $("#modelos_id").append("<option value=''>::Seleccione::</option>");
                    $("#valormercado").val("");
                }

            });

        $("#modelos_id")
            .change(function () {

                if ($("#modelos_id").val() != "") {

                    var ModelOptions = {};
                    ModelOptions.url = "{{ asset('getmodelo') }}/" + $("#modelos_id").val();
                    ModelOptions.type = "GET";
                    //ModelOptions.data = JSON.stringify({id:$("#marcas_id").val()});
                    ModelOptions.datatype = "json";
                    ModelOptions.contentType = "application/json";
                    ModelOptions.success = function (itemList) {
                        for (var i = 0; i < itemList.length; i++) {
                            if (itemList[i].valormercado > 0) {
                                $("#valormercado").val(itemList[i].valormercado.toString());
                            }
                        }
                    };
                    ModelOptions.error = function() { alert("Error obteniendo valor de mercado!!"); };
                    $.ajax(ModelOptions);

                } else {
                    $("#valormercado").val("");
                }

            });

    });
</script>
</body>
</html>
{{--<script>--}}
    {{--document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] +--}}
        {{--':35729/livereload.js?snipver=1"></' + 'script>')--}}
{{--</script>--}}

