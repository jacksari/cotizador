<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <title>Omerlag</title>
    {{--<link href="{{ asset('favicon.ico') }}" rel="shortcut icon" type="image/x-icon">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('omerlag/css/custom.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/crudbooster/assets/sweetalert/dist/sweetalert.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('/vendor/crudbooster/assets/bootstrap/css/bootstrap.min.css') }}">--}}
</head>
<body>
<form action="{{ asset('store') }}" method="post">
    {{ csrf_field() }}

    <div class="main_content">
        <div class="row">
            <div class="logo-title-menu"><img src="{{ asset('omerlag/images/logoMain.png') }}" width="100%" alt=""/></div>
            <div class="heading2">
                Contáctenos<h2><span class="tel1">(01) 321-3131</span></h2>
            </div>
        </div>
        <div style="clear:both;"></div>
        <div class="espacio">
            <h1><span class="negrita1">COMPARA</span> EN SEGUNDOS TODOS LOS PRECIOS Y <span class="negrita1">AHORRA</span> CON EL <span class="negrita1">SEGURO VEHICULAR</span> QUE MÁS TE CONVIENE</h1>
        </div>
        <div class="row cuerpo" style="margin-top:0px;">
            <div class="cajaColor">
                <div class="barraL">
                    <div class="col-01"></div>
                    <div class="col-02">
                        <h1>Datos del vehículo</h1>
                    </div>
                    <div class="row">
                        <div class="col-01">Marca</div>
                        <div class="col-02">
                            <label for="select"></label>
                            <select id="marcas_id" name="marcas_id" class="select2_single" required>
                                <option value="">Seleccione la marca</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-01">Año de fabricación</div>
                        <div class="col-02">
                            <select id="aniofabricacion" name="aniofabricacion" class="select2_single">
                                @for ($i = 0; $i < 18; $i++)
                                    <option value="{{ $curYear - $i }}">{{ $curYear - $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-01">Modelo</div>
                        <div class="col-02">
                            <select name="modelos_id" id="modelos_id" class="select2_single" required>
                                <option value="">Selecciona el modelo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-01">Uso</div>
                        <div class="col-02">
                            <select id="usos_id" name="usos_id" class="select2_single">
                                @foreach ($usos as $uso)
                                    <option value="{{ $uso->id }}">{{ $uso->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-01">Valor de mercado US$</div>
                        <div class="col-02">
                            <input type="number" id="valormercado" name="valormercado" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-01">Convertido a gas</div>
                        <div class="col-02">
                            <span class="radio"><label>
                                    <input type="radio" value="1" name="is_convertidogas">
                                    Si</label></span>
                            <span class="radio"><label>
                                    <input type="radio" value="0" name="is_convertidogas" checked="">
                                    No</label></span>
                        </div>
                    </div>
                </div>
                <div class="barraR">
                    <div class="col-01"></div>
                    <div class="col-02">
                        <h1>Datos del conductor</h1>
                    </div>
                    <div class="row">
                        <div class="col-01">Edad</div>
                        <div class="col-02">
                            <label for="textfield"></label>
                            <select name="edad" id="edad" class="select2_single" required>
                                <option value="">Años</option>
                                @for ($i = 18; $i < 100; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-01">Celular</div>
                        <div class="col-02">
                            <input id="celular" name="celular" type="tel" placeholder="Celular" maxlength="9" required>
                        </div>
                        <div class="row">
                            <div class="col-01">E-mail</div>
                            <div class="col-02">
                                <input id="email" name="email" required type="email" placeholder="Te enviamos la cotización" maxlength="60">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-01">Región o departamento</div>
                            <div class="col-02">
                                <span class="radio"><label>
                                    <input type="radio" value="Lima" name="region" checked="checked">
                                    Lima</label></span>
                                <span class="radio"><label>
                                    <input type="radio" value="Provincia" name="region">
                                    Provincia</label></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-01"></div>
                            <div class="col-02">
                                <span class="radio"><label>
                                    <input type="checkbox" id="is_mailing" name="is_mailing" value="1" checked="checked">
                                    Quiero recibir información por e-mail</label></span>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row centrar"><button type="submit" class="btn btn-primary" name="btnCotizar" id="btnCotizar">COTIZAR</button></div>
            </div>
        </div>
        <div class="foto" style="background:#41494b; height:auto; position: relative;">
            <div>
                <div class="cuadrosL">
                    <img src="{{ asset('omerlag/images/icon01.png') }}" alt=""/>
                    <h1>Compara</h1>
                    Cotiza tu seguro vehicular con todas las aseguradoras del mercado en segundos.
                </div>
                <div class="cuadrosC">
                    <img src="{{ asset('omerlag/images/icon02.png') }}"  alt=""/>
                    <h1>Asegura</h1>
                    Te asistimos antes, durante y después de la contratación de tu seguro vehicular.
                </div>
                <div class="cuadrosR">
                    <img src="{{ asset('omerlag/images/icon03.png') }}" alt=""/>
                    <h1>Ahorra</h1>
                    El mejor precio garantizado
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="row">
            <div class="foto"><img src="{{ asset('omerlag/images/fotoMain.JPG') }}" width="100%" alt=""/></div>
            <h3>Qué cobertura tiene un seguro vehicular</h3>
            <div class="cuadrosL2">
                <h1>Daños materiales</h1>
                +Por choque, vuelco, incendio, robo parcial o total hasta el valor
                asegurado de tu vechículo.<br>
                +Robo de accesorios musicales, hasta el monto asegurado.<br>
                +Daños provocados por desastres naturales como terremotos, huaycos o vendavales.<br>
                +En caso de vandalismo y terrorismo, incluyendo daño malicioso y huelgas.
            </div>
            <div class="cuadrosR2">
                <h1>Daños personales</h1>
                +Responsabilidad civil frente a terceros: cubre los daños materiales
                o personales que tu vehiculo pudiera ocasionar a terceras personas.<br>
                +Responsabilidad civil de ocuapantes del vehículo:cubre las lesiones
                corporales a los ocupantes del nvehiculo, sin incluir al conductor.<br>
                +Accidentes personales de ocupantes: cubre gastos de curación, gastos por muerte o por invadilez  permanente de los ocupantes,
                incluido el conductor
            </div>
            <div class="row centrar"><button type="submit" class="btn btn-primary" name="btnCotiza2" id="btnCotiza2">COTIZAR</button></div>
        </div>
    </div>
</form>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
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

