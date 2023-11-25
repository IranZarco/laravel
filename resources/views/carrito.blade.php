@extends('layouts.layout')
@section('content')

    <main>
        <section class="py-5">
            <div class="container">
                <div class="row">
                <h2>Carrito de Compras</h2>
                    <ul>
                        @foreach($cart as $item)
                            <li>
                                {{ $item['nombre'] }} - Cantidad: {{ $item['cantidad'] }} - Precio: ${{ $item['precio'] * $item['cantidad'] }}
                                <form action="/cart/remove/{{ $item['id'] }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Eliminar</button>
                                </form>
                            </li>
                        @endforeach
                        @if(count($cart) > 0)
                            <form action="/cart/checkout" method="post">
                                @csrf
                                <button type="submit">Realizar Compra</button>
                            </form>
                        @endif
                    </ul>
                </div>
            </div>
        </section>
    </main>

 @endsection