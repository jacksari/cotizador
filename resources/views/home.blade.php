<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <title>Seguro Fácil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('centrose/css/custom.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/crudbooster/assets/sweetalert/dist/sweetalert.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('/vendor/crudbooster/assets/bootstrap/css/bootstrap.min.css') }}">--}}
</head>
<body>
<form action="{{ asset('store') }}" method="post">
    {{ csrf_field() }}

    <div class="main_content">
        <div class="row">
            <div class="logo-title-menu"><img src="centrose/images/logoMain.png" width="100%" alt=""/></div>
            <div class="heading2">Contáctenos<h2><span class="tel1">(01) 993 484 481</span></h2></div>
        </div>
        <div class="row espacio"><h1><span class="negrita1">COMPARA</span> EN SEGUNDOS TODOS LOS PRECIOS Y <span class="negrita1">AHORRA</span><br>CON EL <span class="negrita1">SEGURO VEHICULAR</span> QUE MÁS TE CONVIENE</h1></div>

        <div class="row cuerpo">
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

        <div class="row">
            <div class="gris">Dentro de nuestro portafolio contamos con seguros para  vehículos de distintos  usos: particular, comercial, transporte de personal, camiones de todo tipo,  y cualquier otro uso, así poder proteger al conductor, pasajeros y al mismo vehículo con las mejores coberturas ante posibles pérdidas inesperadas.
                También podemos diseñar una póliza especial que se adecúe a tú requerimiento.<br>
                Trabajamos con las compañías aseguradoras más solventes del país.<br>
                <p><img src="centrose/images/logoRimac.png" width="128" height="54" alt=""/> <img src="centrose/images/logoPacifico.png" width="116" height="54" alt=""/> <img src="centrose/images/logoPositiva.png" width="121" height="54" alt=""/> <img src="centrose/images/logoHDI.png" width="125" height="54" alt=""/></p>
            </div>
            <div class="foto"><img src="centrose/images/fotoMain.JPG" width="100%" alt=""/></div>
            <br>
            <h3>Ofrecemos 3 tipos de seguro vehicular:</h3>
            <div class="cuadrosL"><h1>Todo Riesgo:</h1>
                El Seguro que protege a su vehículo ante: Choque, Vuelco, Incendio, Robo Total o parcial Daño Malicioso, vandalismo, terrorismo, Riesgos de la naturaleza, despistes, Gastos de curación para conductor y ocupantes, Grúa y ambulancia, alquiler de vehículos, hasta el valor contratado en su póliza.
            </div>
            <div class="cuadrosC"><h1>Pérdida Total</h1>
                Es un tipo de seguro vehicular que va a cubrir a la unidad asegurado en caso que; por accidente, este supere el 70% del valor asegurado o en su defecto ya sea por robo total, la Compañía le pagará el valor asegurado en póliza.
            </div>
            <div class="cuadrosR"><h1>Responsabilidad Civil:</h1>
                Este seguro solo cubre daños a terceros que pueda ocasionar el vehículo asegurado a otro vehículo, propiedad o persona. Este seguro No cubre los daños producidos al propio vehículo.
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

