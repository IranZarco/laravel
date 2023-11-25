<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class CarritoController extends Controller
{

    public function carrito()
    {
        $cart = session('cart', []);
        $products = Product::all();
    
        return view('carrito', compact('cart', 'products'));
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
    
}
