<?php

namespace App\Http\Controllers;

use App\Helpers\Cart\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
//        return $cart;
//        return session('cart');
        return view('products.cart');
    }

    public function addToCart(Product $product,Request $request)
    {
//        return $request->input_color;
        $cart = Cart::instance('cart');
        if ($cart->has($product)){
            if($cart->count($product) < $product->inventory)
                $cart->update($product , 1);
        }
        else{
            $cart->put([
                'quantity'=>1,
                'color'=>$request->input_color,
                'size'=>$request->input_size,
            ],
                $product
            );
        }
        return back();
    }

    public function quantityChange(Request $request)
    {
        $data = $request->validate([
           'quantity'=>'required',
           'id'=>'required',
//           'cart'=>'required',
        ]);
        if (Cart::has($data['id'])){
            Cart::update($data['id'] , [
               'quantity'=> $data['quantity']
            ]);
            return response(['status'=>'success']);
        }
        return response(['status'=>'error'],404);
    }

    public function deleteFromCart($id)
    {
        Cart::delete($id);
        return back();
    }
}
