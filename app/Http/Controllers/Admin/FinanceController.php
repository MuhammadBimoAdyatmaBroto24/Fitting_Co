<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class FinanceController extends Controller
{
    public function index()
    {
        $totalRevenue = Order::whereNotIn('status', ['cancelled'])->sum('total_amount');
        $totalOrders = Order::whereNotIn('status', ['cancelled'])->count();

        // You might also want to show recent orders or other financial metrics
        $recentOrders = Order::latest()->take(10)->get(); // Get 10 most recent orders

        return view('admin.finance.index', compact('totalRevenue', 'totalOrders', 'recentOrders'));
    }
}
