<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * @var Cart
     */
    protected Cart $cart;

    /**
     * CartController constructor.
     */
    public function __construct()
    {
        $this->cart = new Cart;
    }

    /**
     * Add a product to the shopping cart.
     * @param Product $product
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Product $product, Request $request)
    {
        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $qty = (int) $request->input('qty', 1);

        $this->cart->add($product->id, $qty);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
