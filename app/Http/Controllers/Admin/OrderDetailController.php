<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;

class OrderDetailController extends Controller
{
    private string $section = 'order-details';

    public function index(OrderDetail $orderDetail)
    {
        return view("dashboard.{$this->section}.index", [
            'order' => $orderDetail->all(),
        ]);
    }
}
