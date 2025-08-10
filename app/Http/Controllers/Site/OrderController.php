<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show(Request $request)
    {
        return view('orders.checkout');
    }

    public function store(Request $request, Product $product)
    {
        $cart = session('cart');

        $order = new Order;
        $order->number = 'ORD - ' . now()->format('YmdHis');
        $order->state_id = 1;
        $order->customer_name = $request->input('customerName');
        $order->customer_phone = $request->input('customerPhone');
        $order->delivery_address = $request->input('deliveryInfo');
        $order->save();

        foreach ($cart as $productId => $item) {
            $orderDetail = new OrderDetail;
            $orderDetail->order_id = $order->id;
            $orderDetail->prod_id = $productId;
            $orderDetail->price = $item['price'];
            $orderDetail->qty = $item['quantity'];
            $orderDetail->save();
        }

        session()->forget('cart');
        session()->forget('cartTotal');
        return view('orders.thankyou',[
            'order' => $order->number,
            'date' => $order->created_at,
            'qty' => $order->qty,
            'state' => '',
        ]);
    }
}
