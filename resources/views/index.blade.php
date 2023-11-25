@extends('layouts.layout')
@section('content')

    <table class="table table-bordered border-primary table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>precio</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <body>
            @foreach($cart as $item)
                <tr>
                    <td>{{ $item->product->nombre}}</td>
                    <td>{{ $item['cantidad'] }}</td>
                    <td>{{ $item->product->precio}}</td>
                    <td>
                        
                    </td>
                </tr>
            @endforeach
        </body>
    </table>

 @endsection