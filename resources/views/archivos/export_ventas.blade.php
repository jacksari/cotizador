<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Export</title>
</head>
<body>
<h3>VENTAS</h3>
<table>
    <tr>
        <td colspan="15"><b>del {{ Carbon\Carbon::parse($desde)->format('d-m-Y') }} al {{ Carbon\Carbon::parse($hasta)->format('d-m-Y') }}</b></td>
        {{--<td></td>--}}
        {{--<td></td>--}}
        {{--<td></td>--}}
        {{--<td></td>--}}
        {{--<td></td>--}}
        {{--<td></td>--}}
        {{--<td></td>--}}
        {{--<td></td>--}}
    </tr>
    <tr>
        <td colspan="15"><b>Total de registros = {{ count($ventas) }}</b></td>
        {{--<td></td>--}}
        {{--<td></td>--}}
        {{--<td></td>--}}
        {{--<td></td>--}}
        {{--<td></td>--}}
        {{--<td></td>--}}
        {{--<td></td>--}}
        {{--<td></td>--}}
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td><b>NUM_COTIZACION</b></td>
        <td><b>FECHA_REGISTRO</b></td>
        <td><b>TIENDA</b></td>
        <td><b>RESPONSABLE</b></td>
        <td><b>MARCA</b></td>
        <td><b>MODELO</b></td>
        <td><b>FABRICACION</b></td>
        <td><b>PLAN</b></td>
        <td><b>USO</b></td>
        <td><b>PROSPECTO</b></td>
        <td><b>EDAD</b></td>
        <td><b>CELULAR</b></td>
        <td><b>EMAIL</b></td>
        <td><b>REGION</b></td>
        <td><b>ESTADO</b></td>
    </tr>
    @foreach($ventas as $venta)
        <tr>
            <td>{{ str_pad($venta->num_cotizacion, 10, "0", STR_PAD_LEFT) }}</td>
            <td>{{ $venta->created_at ? Carbon\Carbon::parse($venta->created_at)->format('d-m-Y'): null }}</td>
            <td>{{ $venta->tienda }}</td>
            <td>{{ $venta->responsable }}</td>
            <td>{{ $venta->marca }}</td>
            <td>{{ $venta->modelo }}</td>
            <td>{{ $venta->fabricacion }}</td>
            <td>{{ $venta->plan }}</td>
            <td>{{ $venta->uso }}</td>
            <td>{{ $venta->prospecto }}</td>
            <td>{{ $venta->edad }}</td>
            <td>{{ $venta->celular }}</td>
            <td>{{ $venta->email }}</td>
            <td>{{ $venta->region }}</td>
            <td>{{ $venta->estado }}</td>
            {{--<td>{{ number_format($venta->prima_neta, 2, '.', ',') }}</td>--}}
        </tr>
    @endforeach
</table>
</body>
</html>