<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function showOrderDetails($orderId)
    {
        $order = Order::with('items.product')->findOrFail($orderId);

        return view('order-details', compact('order'));
    }
}
