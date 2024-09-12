<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
    <!-- Your html goes here -->
    <form method='post' action='{{ CRUDBooster::adminPath('storeconfig') }}'>
        {{ csrf_field() }}

        <p><a title="Return" href="{{CRUDBooster::mainpath('')}}"><i class="fa fa-chevron-circle-left "></i> &nbsp; Volver al listado Cotizaciones</a></p>
        <div class='panel panel-default'>
            <div class='panel-heading'>{{ $page_title }}</div>
            <div class='panel-body'>
                <div class='form-group'>
                    <label>Usuario Recibe Alertas</label>
                    <input type='text' id="contenido" name='contenido' required class='form-control' value='{{$row->content}}' />
                </div>

                <!-- etc .... -->

            </div>
            <div class='panel-footer'>
                <input type='submit' class='btn btn-primary' value='Guardar cambios'/>
            </div>
        </div>


    </form>
@endsection