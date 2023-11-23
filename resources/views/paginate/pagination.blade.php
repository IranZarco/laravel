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
                    @foreach ($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{asset('img/fff.png')}}" alt="" class="card-img-top">
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