@extends('layouts.layout')
@section('content')
<div class="container">
    <h2>Productos</h2>
    <a href="" class="btn btn-primary">Nuevo Producto</a>
    <table class="table table-bordered border-primary table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <body>
            @foreach ( $products as $product )
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->nombre }}</td>
                    <td>{{ $product->descripcion }}</td>
                    <td>${{ $product->precio }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}"  class="btn btn-primary">Editar</a>
                        <a href="{{ route('products.destroy', $product->id) }}" id="BotonEliminar" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </body>
    </table>
    <div>
        <a href="{{ route('products.create') }}" class="btn btn-danger">Registrar</a>
    </div>
    {{ $products->links() }}
</div>

@endsection