<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\State;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of all orders.
     * @param Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(Order $order)
    {
        return view('dashboard.orders.index', [
        'orders' => $order->all(),
        ]);
    }

    /**
     * Show the form for editing the specified order.
     * @param Order $order
     * @param State $state
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Order $order, State $state)
    {
        return view('dashboard.orders.edit', [
            'order' => $order,
            'states' => $state->all(),
        ]);
    }

    /**
     * Update the specified order in storage.
     * @param Request $request
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Order $order)
    {
        $order->state_id = $request->input('status');
        $order->save();

        return redirect()->route('dashboard.orders.index');
    }
}
