<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\State;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Order $order)
    {
        return view('dashboard.orders.index', [
        'orders' => $order->all(),
        ]);
    }

    public function edit(Order $order, State $state)
    {
        return view('dashboard.orders.edit', [
            'order' => $order,
            'states' => $state->all(),
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $order->state_id = $request->input('status');
        $order->save();

        return redirect()->route('dashboard.orders.index');
    }
}
