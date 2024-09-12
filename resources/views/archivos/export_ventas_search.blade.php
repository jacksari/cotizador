<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
    <!-- Your custom  HTML goes here -->
    <div class='panel panel-default'>
        <form method='post' action='{{ CRUDBooster::mainpath('export-search') }}' enctype="multipart/form-data">
            {{--<form method='post' action='/admin/export_result'>--}}
            <div class='panel-heading'><b>Ventas por Fecha de Registro</b></div>
            <div class='panel-body'>
                {{ csrf_field() }}
                {{--<div class='form-group col-lg-12'>--}}
                {{--Buscar. <a href="/xls/creditos.xlsx" download="creditos.xlsx" >Descargar Plantilla</a>--}}
                {{--</div>--}}
                <div class='form-group col-lg-2'>
                    <label>Del</label>
                    <input type="date" id="desde" name="desde" required class="form-control">
                </div>
                <div class='form-group col-lg-2'>
                    <label>Al</label>
                    <input type="date" id="hasta" name="hasta" required class="form-control">
                </div>
{{--                <div class='form-group col-lg-2'>--}}
{{--                    <label>Ejecutivo</label>--}}
{{--                    <select id="ejecutivo_id" name="ejecutivo_id" class="form-control">--}}
{{--                        <option value="">Seleccionar</option>--}}
{{--                        @foreach($ejecutivos as $ejecutivo)--}}
{{--                            <option value="{{$ejecutivo->id}}">{{$ejecutivo->name}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class='form-group col-lg-2'>--}}
{{--                    <label>Operador</label>--}}
{{--                    <select id="operador_id" name="operador_id" class="form-control">--}}
{{--                        <option value="">Seleccionar</option>--}}
{{--                        @foreach($operadores as $operador)--}}
{{--                            <option value="{{$operador->id}}">{{$operador->name}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
                <div class='form-group col-lg-2'>
                    <label>Estado</label>
                    <select id="estado_venta" name="estado_venta" class="form-control">
                        <option value="">Seleccionar</option>
{{--                        <option value="Pendiente">Pendiente</option>--}}
{{--                        <option value="Solicitud Compra">Solicitud Compra</option>--}}
                        <option value="Seguimiento">Seguimiento</option>
                        <option value="Rechazado">Rechazado</option>
                        <option value="Aceptado">Aceptado</option>
                    </select>
                </div>
{{--                <div class='form-group col-lg-2'>--}}
{{--                    <label>Seguimiento</label>--}}
{{--                    <select id="estado_seguimiento" name="estado_seguimiento" class="form-control">--}}
{{--                        <option value="">Seleccionar</option>--}}
{{--                        <option value="En proceso de emisión">En proceso de emisión</option>--}}
{{--                        <option value="Pendiente de rpta. de cia.">Pendiente de rpta. de cia.</option>--}}
{{--                        <option value="En control técnico">En control técnico</option>--}}
{{--                        <option value="Falta completar información">Falta completar información</option>--}}
{{--                    </select>--}}
{{--                </div>--}}

            </div>
            <div class='panel-footer'>
                <input type='submit' class='btn btn-success' value='Procesar Archivo'/>
            </div>
        </form>
    </div>
@endsection