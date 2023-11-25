@extends('layouts.layout')
@section('content')

    <table class="table table-bordered border-primary table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>precio</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <body>
            @foreach($cart as $item)
                <tr>
                    <td>{{ $item['nombre'] }}</td>
                    <td>{{ $item['cantidad'] }}</td>
                    <td>{{ $item['precio'] * $item['cantidad'] }}</td>
                    <td>
                        <form action="/cart/remove/{{ $item['id'] }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <form action="/cart/checkout" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Realizar Compra</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </body>
    </table>

 @endsection