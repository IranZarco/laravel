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
                    <div class="col-md4 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="https://i.kinja-img.com/image/upload/c_fit,q_60,w_645/513c7346bc0ed61c82da107933c587a9.jpg" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex-justify-content-center"></div>
            </div>
        </section>
    </main>

    <main class="contrainer"></main>
    <main class="contrainer"></main>

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

 