<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    protected string $sessionKey = 'cart';

    public function get(): array
    {
        return Session::get($this->sessionKey, [
            'items' => [],
            'totalQty' => 0,
            'amount' => 0,
        ]);
    }

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

    public function clear(): void
    {
        Session::forget($this->sessionKey);
    }
}
