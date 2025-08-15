<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    /**
     * The session key used to store the cart data.
     * @var string
     */
    protected string $sessionKey = 'cart';

    /**
     * Get the current cart from the session.
     * @return array
     */
    public function get(): array
    {
        return Session::get($this->sessionKey, [
            'items' => [],
            'totalQty' => 0,
            'amount' => 0,
        ]);
    }

    /**
     * Add a product to the cart or update its quantity.
     * @param int $productId
     * @param int $quantity
     * @return array
     */
    public function add(int $productId, int $quantity): array
    {
        $product = Product::findOrFail($productId);
        $price = $product->price;
        $path = $product->path;
        $name = $product->name;

        $cart = $this->get();

        if (isset($cart['items'][$productId])) {
            $cart['items'][$productId]['quantity'] += $quantity;
        } else {
            $cart['items'][$productId] = [
                'quantity' => $quantity,
                'price' => $price,
                'name' => $name,
                'path' => $path,
            ];
        }

        $totalQty = 0;
        $amount = 0;

        foreach ($cart['items'] as $item) {
            $totalQty += $item['quantity'];
            $amount += $item['quantity'] * $item['price'];
        }

        $cart['totalQty'] = $totalQty;
        $cart['amount'] = $amount;

        Session::put($this->sessionKey, $cart);

        return $cart;
    }

    /**
     * Clear the cart from the session.
     * @return void
     */
    public function clear(): void
    {
        Session::forget($this->sessionKey);
    }
}
