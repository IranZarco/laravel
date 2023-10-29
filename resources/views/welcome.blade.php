@extends('layouts.layout')
@section('content')
   <header class='py-5 text-center'>
       <h1>Bienvenido a la tiendita PUTO</h1>
       <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias natus similique dolor sunt dicta assumenda et delectus. Placeat omnis porro dolorem tempora. Facilis eius dicta, laudantium tempore maxime iusto exercitationem!</p>
       <a href="#" class="btn btn-primary" id='search-toggle-btn'> 
          Explorar productos</a>
   </header>

    <section class="py-3" id="search-form" style="display:none">
    <div class="container">
        <div class="row">
           <div class="input-group">
               <input type="text" name="search" 
               class='form-control' placeholder="buscar productos">
               <div class="imput.group-appened">
                <button class="btn btn-primary">
                    buscar
                </button>
                </div>
            </div>
        </div>
    </div>
    </section>

    <main>
        <section class="py-5">
            <div class="container">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4 mb-4">
                                <div class="card">
                                <img
                                src="{{asset('img/cometas.jpg')}}" alt="" class="card-img-top">
                                <div class="card-body">
                                <h5>{{$product->nombre}}</h5>
                                <p>{{truncateText($product->descripcion), 3}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                    </div>
                </div>
            </div>
        </section>
        </main>

    <script>
        $(document).ready(function(){
            $('#search-toggle-btn').click(function(){
                var searchForm = $('#search-form');
                if(searchForm.css('display')==='none'){
                    searchForm.css('display', 'block')
                }else{
                    searchForm.css('display', 'none')
                }
            });
        });
    </script>
 @endsection

 