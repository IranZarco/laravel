<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use Auth;
use Illuminate\Support\Facades\Session;

class CartItemController extends Controller
{
    public function add_cart(Request $request){
        $product_id = $request->product_id;
        $user_id= 1;
        $sessionCartId =  Session::get('cart_id');

        if($sessionCartId == null){
            $cart = Cart::create([
                'user_id' => $user_id,
                'total' => 1
            ]);
            Session::put('cart_id', $cart->id );
        }

        $cartCreado = CartItem::create([
            'cart_id' => Session::get('cart_id'),
            'product_id' => $product_id,
            'cantidad' => 1
        ]);

        dd('termina');
    }
}
