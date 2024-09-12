<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <title>Seguro Fácil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('centrose/css/custom.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/crudbooster/assets/sweetalert/dist/sweetalert.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('/vendor/crudbooster/assets/bootstrap/css/bootstrap.min.css') }}">--}}

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
<body>

    <div class="main_content">
        <div class="row">
            <div class="logo-title-menu"><img src="{{ asset('centrose/images/logoMain.png') }}" width="100%" alt=""/></div>
            <div class="heading2">Contáctenos<h2><span class="tel1">(01) 993 484 481</span></h2></div>
        </div>
        <div class="row espacio"><h1><span class="negrita1">COMPARA</span> EN SEGUNDOS TODOS LOS PRECIOS Y <span class="negrita1">AHORRA</span><br>CON EL <span class="negrita1">SEGURO VEHICULAR</span> QUE MÁS TE CONVIENE</h1></div>

        <div class="row">
            <div class="row centrar">

                <div class="title m-b-md">
                    Cotización {{$marca}} {{$modelo}} {{$aniofabricacion}} - ${{$valormercado}}
                </div>
                <div class="title-vigencia m-b-md">
                    PARA USO: {{$uso}}
                </div>
                <div class="title-vigencia m-b-md">
                    VÁLIDA DEL {{$validezini}} AL {{$validezfin}}
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
                        <td class="text-left">Daño Propio (Choque, Vuelvo, Incendio, Robo Total/Parcial)</td>
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
                        <td class="text-left">Cirujia Estetica</td>
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
                        <td class="text-left">Auxilio Macanico, Grua, ambulancia en caso de siniestro</td>
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

            </div>
            <div class="row centrar">
                <br>
                <a href="{{ asset('/') }}" class="btn btn-primary" style="text-decoration-line: none">COTIZAR OTRO VEHICULO</a>
            </div>
        </div>
    </div>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
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

