@extends('layouts.layout')
@section('content')

<div class="container">

<h2>Guardar producto</h2>

    {{ Form::open(['route' => 'products.store' ,'method' =>'POST']) }}
        <div class="form-group">
            {{ Form::label('name_product', 'nombre del producto') }}
            {{ Form::text('name',null,['class' => 'form-control']) }}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('description_product', 'Descripción producto') }}
            {{ Form::textarea('description', null, ['class'=>'form-control','rows' => 6]) }}
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('price', 'Precio del producto') }}
            {{ Form::number('price', null, ['class' => 'form-control']) }}
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('stock', 'Productos disponibles') }}
            {{ Form::number('stock', null, ['class' => 'form-control']) }}
            @error('stock')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::submit('Guardar',['class'=>'btn btn-primary']) }}
            <td>
                <a href="{{ route('products.index') }}"  class="btn btn-primary">Registro</a>
            </td>
        </div>
    {{ Form::close()}}
    

</div>

@endsection