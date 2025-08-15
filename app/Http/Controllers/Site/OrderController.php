<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected Cart $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function show()
    {
        return view('orders.checkout');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customerName' => 'required|string|max:255',
            'customerPhone' => 'required|string|max:20',
            'deliveryInfo' => 'required|string|max:500',
        ]);

        $cart = $this->cart->getCart();

        if (empty($cart['items'])) {
            return redirect()->back()->with('error', 'Empty cart');
        }

        $order = new Order;
        $order->number = 'ORD - ' . now()->format('YmdHis');
        $order->state_id = 1;
        $order->customer_name = $request->input('customerName');
        $order->customer_phone = $request->input('customerPhone');
        $order->delivery_address = $request->input('deliveryInfo');
        $order->save();

        foreach ($cart['items'] as $productId => $item) {
            $orderDetail = new OrderDetail;
            $orderDetail->order_id = $order->id;
            $orderDetail->prod_id = $productId;
            $orderDetail->price = $item['price'];
            $orderDetail->qty = $item['quantity'];
            $orderDetail->save();
        }

        $this->cart->clear();

        return view('orders.thankyou');
    }
}
