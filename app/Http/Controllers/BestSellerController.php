<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BestSellerController extends Controller
{
    public function index()
    {
        // In a real application, this logic would fetch actual best-selling products
        // For now, we'll just get some products as a placeholder
        $bestSellers = Product::orderBy('rating', 'desc')->take(8)->get();

        return view('best-sellers', compact('bestSellers'));
    }
}