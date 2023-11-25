<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;


class CartItemController extends Controller
{

public function index()
{
    $cart = session('cart', []);
    $products = Product::all();

    return view('welcome', compact('cart', 'products'));
}

public function removeFromCart($productId)
{
    $cart = session('cart', []);

    $cart = array_values(array_filter($cart, function ($item) use ($productId) {
        return $item['id'] != $productId;
    }));

    session(['cart' => $cart]);

    return redirect('/');
}

public function addToCart(Request $request)
{
    $productId = $request->input('product_id');
    $cantidad = $request->input('cantidad', 1);

    $product = Product::find($productId);

    $cart = session('cart', []);

    $cart[] = [
        'id' => $product->id,
        'nombre' => $product->nombre,
        'precio' => $product->precio,
        'cantidad' => $cantidad,
    ];

    session(['cart' => $cart]);

    return redirect('/');
}

public function checkout()
{
    // Guardar la información del carrito en la base de datos
    $cart = session('cart', []);

    $user_id= 1;
    $cartModel = Cart::create(['total' => 0, 'user_id' => $user_id]);

    foreach ($cart as $item) {
        $product = Product::find($item['id']);

        CartItem::create([
            'cart_id' => $cartModel->id,
            'product_id' => $item['id'],
            'cantidad' => $item['cantidad'],
            'total' => $item['cantidad'] * $item['precio'],
        ]);
    }

    // Limpiar el carrito de la sesión
    session(['cart' => []]);

    return redirect('/')->with('success', 'Compra exitosa');
}
    public function data(){
        $cart = CartItem::with ('product')->get();
        
        return view ('index',['cart' => $cart]);
    
    }

    ////////////////////////////////////////////////////////////////////7

    public function edit($cart)
    {

        $cart = CartItem::find($cart);
        return view('update', compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        try {
            $validateData = $request->validate([
                'nombre' =>  'required|string|max:50',
                'cantidad'  => 'required|numeric|min:0|max:10000',
                'precio'  =>  'required|numeric|min:0|max:10000',
            ]);
            Pro::query()->whereid($request->id)->update([
                'nombre' =>  $request->nombre,
                'cantidad'  =>  $request->cantidad,
                'precio'  =>  $request->precio,
            ]);
        } catch (Throwable $e) {


            dd($e);

            return false;
        }

        return redirect()->route('index');
        
    }

}