<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Seguro Rápido</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/vendor/crudbooster/assets/sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" href="/vendor/crudbooster/assets/bootstrap/css/bootstrap.min.css">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: small;
            /*font-family: 'Raleway', sans-serif;*/
            font-weight: 300;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
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
            font-family: 'Raleway', sans-serif;
            font-size: 32px;
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
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<form action="/store" method="post">
<div class="flex-center position-ref full-height">
    <div class="content">
            {{ csrf_field() }}

            <div class="hidden-sm col-md-3"></div>
            <div class="col-sm-12 col-md-6">
                <div class="row">
                    <div class="col-md-12 text-center title">
                        <h2 class="" style="margin:0px; margin-bottom:5px;">Completa el formulario y cotiza al instante</h2>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-6 row-bottom">
                        <div class="col-md-12 text-center">
                            <h5><strong>DATOS DE VEHÍCULO</strong></h5>
                        </div>
                        <br>
                        <div class="row">
                            <div class="hidden-xs hidden-sm col-md-4 text-right">
                                Marca
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <select id="marcas_id" name="marcas_id" class="form-control" required>
                                    <option value="">Seleccione la marca</option>
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="hidden-xs hidden-sm col-md-4  text-right">
                                Año de fabricación
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <select id="aniofabricacion" name="aniofabricacion" class="form-control">
                                    @for ($i = 0; $i < 18; $i++)
                                        <option value="{{ $curYear - $i }}">{{ $curYear - $i }}</option>
                                    @endfor
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="hidden-xs hidden-sm col-md-4 text-right">
                                Modelo
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <select name="modelos_id" id="modelos_id" class="form-control" required>
                                    <option value="">Selecciona el modelo</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="hidden-xs hidden-sm col-md-4 text-right">
                                Uso
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <select id="usos_id" name="usos_id" class="form-control">
                                    @foreach ($usos as $uso)
                                        <option value="{{ $uso->id }}">{{ $uso->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-sm-3 col-md-4 text-right">
                                Valor de <br> mercado ($)
                            </div>
                            <div class="col-xs-8 col-sm-9 col-md-8">
                                <input class="form-control input-blanco" type="number" id="valormercado" name="valormercado" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-sm-3 col-md-4 text-right">
                                Convertido <br>a gas
                            </div>
                            <div class="col-xs-8 col-sm-9 col-md-8">
                                <table style="width:100%; text-align: left;">
                                    <tbody><tr>
                                        <td style="width:50%"><input type="radio" value="1" name="is_convertidogas"> Sí</td>
                                        <td style="width:50%"><input type="radio" value="0" name="is_convertidogas" checked=""> No</td>
                                    </tr>
                                    </tbody></table>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 row-bottom">
                        <div class="col-md-12 text-center">
                            <h5><strong>DATOS DE CONDUCTOR</strong></h5>
                        </div>
                        <br>
                        <div class="row">
                            <div class="hidden-xs hidden-sm col-md-4 text-right">
                                Edad
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <select name="edad" id="edad" class="form-control" required>
                                    <option value="">Años</option>
                                    @for ($i = 18; $i < 100; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="hidden-xs hidden-sm col-md-4 text-right">
                                Celular
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <input id="celular" name="celular" class="form-control input-blanco" type="tel" placeholder="Celular" maxlength="9" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="hidden-xs hidden-sm col-md-4 text-right">
                                E-mail
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <input id="email" name="email" class="form-control input-blanco" required type="email" placeholder="Te enviamos la cotización" maxlength="60">
                            </div>
                        </div>
                        <div class="row">
                            <div class="hidden-xs col-sm-3 col-md-4 text-right">
                                Región o departamento
                            </div>
                            <div class="col-xs-12 col-sm-9 col-md-8">
                                <table style="width:100%; text-align: left;">
                                    <tbody><tr>
                                        <td style="width:50%"><input type="radio" value="Lima" name="region" checked="checked"> Lima</td>
                                        <td style="width:50%"><input type="radio" value="Provincia" name="region"> Provincia</td>
                                    </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-offset-4 col-sm-8 col-md-offset-4 col-md-8" style="text-align: left">
                                <input type="checkbox" id="is_mailing" name="is_mailing" value="1" checked="checked">
                                <span>Quiero recibir información por <br>e-mail</span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 col-sm-12 text-center">
                        <button id="btnCotizar" type="submit" class="btn btn-primary">COTIZAR</button>
                    </div>

                </div>
            </div>

    </div>
</div>
</form>

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/jquery.validate.js"></script>
<script src="/vendor/crudbooster/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/vendor/crudbooster/assets/sweetalert/dist/sweetalert.min.js"></script>
<!-- Include this after the sweet alert js file -->
@include('sweet::alert')

<script>
    $(document).ready( function () {

        $("#marcas_id")
            .change(function () {

                if ($("#marcas_id").val() != "") {

                    var ModelosOptions = {};
                    ModelosOptions.url = "/getmodelos/" + $("#marcas_id").val();
                    ModelosOptions.type = "GET";
                    //ModelosOptions.data = JSON.stringify({id:$("#marcas_id").val()});
                    ModelosOptions.datatype = "json";
                    ModelosOptions.contentType = "application/json";
                    ModelosOptions.success = function (itemList) {
                        $("#modelos_id").empty();
                        $("#modelos_id").append("<option value=''>::Seleccione::</option>");
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
                    ModelOptions.url = "/getmodelo/" + $("#modelos_id").val();
                    ModelOptions.type = "GET";
                    //ModelOptions.data = JSON.stringify({id:$("#marcas_id").val()});
                    ModelOptions.datatype = "json";
                    ModelOptions.contentType = "application/json";
                    ModelOptions.success = function (itemList) {
                        for (var i = 0; i < itemList.length; i++) {
                            $("#valormercado").val(itemList[i].valormercado.toString());
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

