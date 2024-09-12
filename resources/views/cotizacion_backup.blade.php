<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
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
            margin: 0;
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
            font-size: medium;
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
            float:left; width:20%;
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
            height: 44px;
            width: 117px;
            max-width: 117px;
            max-height: 44px;
        }

        .left-div-60 {
            float:left; width:60%;
            margin-bottom: -30px;
        }

        .left-div-20-b {
            float:left; width:20%;
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

</style>
</head>
<body>
    <div class="content">
        <div class="left-div-20-a">
            {{--<img src="{{ asset('centrose/images/logoMain.png') }}" alt="">--}}
            <img src="{{ asset($logo_cotizacion) }}" alt=""><br>
            {{$telefono_cotizacion}}<br><br>
            {{$nombreprospecto}}
        </div>
        <div class="left-div-60">
            <div class="title m-b-md">
                Cotización {{$marca}} {{$modelo}} {{$aniofabricacion}} - ${{$valormercado}}
            </div>
            <div class="title-vigencia m-b-md">
                PARA USO: {{$uso}}
            </div>
            <div class="title-vigencia m-b-md">
                VÁLIDA DEL {{$validezini}} AL {{$validezfin}}
            </div>
        </div>
        <div class="left-div-20-b">{{ $cotizacion_id }}</div>
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
                <td >Solicita tu cotización especial</td>
                <td class="prima">{{$prima2}}</td>
                <td class="prima">{{$prima3}}</td>
                <td class="prima">{{$prima4}}</td>
                <td class="prima">{{$prima5}}</td>
            </tr>
            <tr>
                <td class="text-left">Cuotas $</td>
                <td>---</td>
                <td>{{$cuotasB[0]}}</td>
                <td>{{$cuotasC[0]}}</td>
                <td>{{$cuotasD[0]}}</td>
                <td>{{$cuotasE[0]}}</td>
            </tr>
            <tr>
                <td class="text-left">Cuotas $</td>
                <td>---</td>
                <td>{{$cuotasB[1]}}</td>
                <td>{{$cuotasC[1]}}</td>
                <td>{{$cuotasD[1]}}</td>
                <td>{{$cuotasE[1]}}</td>
            </tr>
            <tr>
                <td class="text-left">Cuotas $</td>
                <td>---</td>
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
                <td>Suma Asegurada</td>
                <td>Suma Asegurada</td>
                <td>Suma Asegurada</td>
                <td>Suma Asegurada</td>
                <td>Valor Pactado</td>
            </tr>
            <tr>
                <td class="text-left">Responsabilidad Civil frente a terceros hasta</td>
                <td>US$ 150,000</td>
                <td>US$ 150,000</td>
                <td>US$ 100,000</td>
                <td>US$ 150,000</td>
                <td>S/.500,000</td>
            </tr>
            <tr>
                <td class="text-left">Accidentes Personales (según Tarj. De Prop., hasta 05 personas)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="text-left">Muerte e Invalidez Permanente c/u hasta</td>
                <td>US$ 25,000 </td>
                <td>US$ 20,000 </td>
                <td>US$ 20,000 </td>
                <td>US$ 20,000 </td>
                <td>S/.60,000 </td>
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
                <td class="text-left">Amparo Familiar</td>
                <td>No Cubre</td>
                <td>No Cubre</td>
                <td>No Cubre</td>
                <td>US$ 500.00</td>
                <td>No</td>
            </tr>
            <tr>
                <td class="text-left">Protección al Utomovilista por Robo y Asalto dentro del Vehículo</td>
                <td>No Cubre</td>
                <td>No Cubre</td>
                <td>No Cubre</td>
                <td>US$ 100.00</td>
                <td>No</td>
            </tr>
            <tr>
                <td class="text-left">Cobertura Internacional</td>
                <td>No Cubre</td>
                <td>No Cubre</td>
                <td>No Cubre</td>
                <td>Chile, Ecuador, Brazil, Bolivia, Argenina</td>
                <td>No</td>
            </tr>
            <tr>
                <td class="text-left">Responsabilidad Civil frente a Ocupantes por vehículo (no chofer), hasta</td>
                <td>US$ 25,000 c/u</td>
                <td>US$ 50,000 c/u</td>
                <td>US$ 30,000 c/u</td>
                <td>US$ 50,000</td>
                <td>S/.30,000 max. 4 ocupantes</td>
            </tr>
            <tr>
                <td class="text-left">Riesgos de la Naturaleza (Terremoto, Maremoto, Lluvia, Inundación, Huayco y Aluvión)</td>
                <td>Suma Asegurada</td>
                <td>Suma Asegurada</td>
                <td>Suma Asegurada</td>
                <td>Suma Asegurada</td>
                <td>Valor Pactado</td>
            </tr>
            <tr>
                <td class="text-left">Riesgos Políticos (Huelga y Conmoción Civil, Daño Malicioso, Vandalismo y Terrorismo)</td>
                <td>Suma Asegurada</td>
                <td>Suma Asegurada</td>
                <td>Suma Asegurada</td>
                <td>Suma Asegurada</td>
                <td>Valor Pactado</td>
            </tr>
            <tr>
                <td class="text-left">Alcoholemia ( Hasta 0.5 gr/L )</td>
                <td>Cubierto</td>
                <td>Cubierto</td>
                <td>Cubierto</td>
                <td>Cubierto</td>
                <td>No</td>
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
                <td>Valor Comercial</td>
                <td>según póliza</td>
                <td>según póliza</td>
                <td>según póliza</td>
                <td>Valor Pactado</td>
            </tr>
            <tr>
                <td class="text-left">Rotura Accidental de lunas</td>
                <td>Cubierto</td>
                <td>Cubierto</td>
                <td>Cubierto</td>
                <td>Cubierto</td>
                <td>Hasta S/.4,000</td>
            </tr>
            <tr>
                <td class="text-left">Rehabilitación Automática (excepto por acces. musicales)</td>
                <td>Cubierto</td>
                <td>Cubierto</td>
                <td>Cubierto</td>
                <td>Cubierto</td>
                <td>Cubierto</td>
            </tr>
            <tr>
                <td class="text-left">Servicio de Vehículos de reemplazo</td>
                <td>Hasta 15 días</td>
                <td>Hasta 15 días</td>
                <td>Hasta 15 días</td>
                <td>Hasta 15 días</td>
                <td>Hasta 15 dias x choque 30 das por robo total</td>
            </tr>
            <tr>
                <td class="text-left">Perdida Total por Choque</td>
                <td>Según Póliza</td>
                <td>Según Póliza</td>
                <td>Según Póliza</td>
                <td>Según Póliza</td>
                <td>Según Póliza</td>
            </tr>
            <tr>
                <td class="text-left">Por Robo Total</td>
                <td>Despues de 30 días</td>
                <td>Despues de 30 días</td>
                <td>Despues de 30 días</td>
                <td>Despues de 30 días</td>
                <td>Despues de 30 días</td>
            </tr>
            <tr>
                <td class="text-left">Auxilio Macanico, Grua, ambulancia en caso de siniestro</td>
                <td>Hasta US$ 250 por evento</td>
                <td>Hasta US$ 250 por evento</td>
                <td>Hasta US$ 250 por evento</td>
                <td>Hasta US$ 250 por evento</td>
                <td>Según Póliza</td>
            </tr>
            <tr>
                <td class="text-left">Servicio de Chofer de Reemplazo,</td>
                <td>Max. 3 asistencias</td>
                <td>Max. 5 asistencias</td>
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
                <td class="text-left">Volcadura</td>
                <td>10%, mínimo US$ 150</td>
                <td>15%, mínimo US$ 150</td>
                <td>15%, mínimo US$ 150</td>
                <td>10%, mínimo US$ 150</td>
                <td>S/.1,100</td>
            </tr>
            <tr>
                <td class="text-left">Robo Parcial</td>
                <td>10%, mínimo US$ 150</td>
                <td>10% mínimo US$ 150</td>
                <td>10%, mínimo US$ 150</td>
                <td>10%, mínimo US$ 150</td>
                <td>S/.1,100</td>
            </tr>
            <tr>
                <td class="text-left">Ausencia de control y pérdida total por ausencia de control</td>
                <td>25%, mínimo US$ 500</td>
                <td>si se otorga 25% mínimo US$ 300</td>
                <td>si se otorga 25% mínimo US$ 500</td>
                <td>10%, mínimo US$ 150</td>
                <td>20% del monto total del siniestro</td>
            </tr>
            <tr>
                <td class="text-left">Huelgas y Conmoción Civil, Daño Malicioso, Vandalismo y terrorismo</td>
                <td>10%, mínimo US$ 150</td>
                <td>10%, mínimo US$ 150</td>
                <td>10%, mínimo US$ 150</td>
                <td>10%, mínimo US$ 150</td>
                <td>S/.1,100</td>
            </tr>
            <tr>
                <td class="text-left">Riesgos de la Naturaleza</td>
                <td>10%, mínimo US$ 150</td>
                <td>10%, mínimo US$ 150</td>
                <td>10%, mínimo US$ 150</td>
                <td>10%, mínimo US$ 150</td>
                <td>S/.1,100</td>
            </tr>
            <tr>
                <td class="text-left">Vías no autorizadas</td>
                <td>según póliza</td>
                <td>según póliza</td>
                <td>según póliza</td>
                <td>según póliza</td>
                <td>S/.1,100</td>
            </tr>
            <tr>
                <td class="text-left">Siniestro con Conductor menor de</td>
                <td>26 años 15% minimo US$ 300</td>
                <td>29 años, 15% minimo US$ 300</td>
                <td>29 años, 15% minimo US$ 300</td>
                <td>25 años, 15% min $ 300</td>
                <td>S/.2,200</td>
            </tr>
            <tr>
                <td class="text-left">Vehículo de reemplazo</td>
                <td>US$ 90 + IGV</td>
                <td>US$ 100 + IGV</td>
                <td>US$ 100 + IGV</td>
                <td>US$ 70 + IGV</td>
                <td>S/.330</td>
            </tr>
            <tr>
                <td class="text-left">Rotura de lunas Accidental: Lunas Importadas</td>
                <td>10%, mínimo US$ 150</td>
                <td>10%, mínimo US$ 150</td>
                <td>10%, mínimo US$ 150</td>
                <td>10%, mínimo US$ 150</td>
                <td>S/.0</td>
            </tr>
            <tr>
                <td class="text-left">Rotura de lunas Accidental: Lunas Nacional</td>
                <td>Sin deducible</td>
                <td>Sin deducible</td>
                <td>Sin deducible</td>
                <td>Sin deducible</td>
                <td>S/.0</td>
            </tr>
{{--            <tr>
                <td class="text-left">&nbsp;</td>
                <td>Las personas menores de 26 años, están sujetos a recargo de prima</td>
                <td>Sin deducible</td>
                <td>Las personas menores de 26 años, se duplica el deducible</td>
                <td>Sin deducible</td>
                <td>Sin deducible</td>
            </tr>--}}
            <tr class="cell-sm">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="{{ $table_td_colspan }}" class="subtitulo">Cobertura de Daño Propio, Robo Parcial y Responsabilidad Civil</td>
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

        <br>
        <br>
        <div class="left-div-60-b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class="left-div-40">
            {{ $responsable }}<br>
            {{ $subagente  }}
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>
</body>
</html>