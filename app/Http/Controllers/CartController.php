<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {
        $cart = session('cart',[]);
        $totalQty = 0;
        $totalPrice = 0;

        $prodId = $product->id;
        $qty = $request->input('qty', 0);

        if(isset($cart[$prodId])){
            $cart[$prodId]['quantity'] += $qty;
        }else{
            $cart[$prodId] = [
                'name' => $product->name,
                'quantity' => $qty,
                'price' => $product->price,
            ];
        };

        foreach ($cart as $item){
            $totalQty += $item['quantity'];
            $totalPrice += $item['price'] * $item['quantity'];
        }

        session([
            'cart' => $cart,
            'cartTotal' => [
                'totalQty' => $totalQty,
                'totalPrice' => $totalPrice
            ],
        ]);

        return redirect()->back()->withInput();
    }



}
