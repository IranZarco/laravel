@extends('layouts.layout')
@section('content')
<h1>Bienvenido a mi tiendita 🤩</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam nisi, fugit molestias quam animi non recusandae ullam, quaerat quos iure nihil excepturi delectus ipsum. Vel asperiores fuga ducimus alias? Impedit!</p>
    <a href="#" class="btn btn-primary btn" id="search-toggle-btn">
        Explorar productos
    </a>
    <section class="py-3" id="search-form" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="input-group">
                    <input type="text" placeholder="Buscar productos" class="form-control">
                </div>
            </div>
        </div>
    </section>


<main>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="products-container">

                </div>
                <div class="pagination-container">
                    
                </div>
            </div>
        </div>
    </section>
</main>

<script>
$(document).ready(function(){
    $('#search-toggle-btn').click(function(){
        var searchForm = $('#search-form');
        if (searchForm.css('display') === 'none') {
            searchForm.css('display', 'block');
        }
        else{
            searchForm.css('display', 'none');
        }
    });

    function loadProductsPage($page) {
        $.ajax({
            url: '/products?page=' + page,
            method: 'GET',
            success: function (data) {
                $('#products-container').html(data);
            }.error, function (error){
                console.error(error);
            }
        });        
    }
});
</script>
@endsection