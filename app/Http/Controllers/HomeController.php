<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Post; // Import the Post model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(8)->get(); // Fetch some products for the home page
        $latestPosts = Post::latest()->take(3)->get(); // Fetch 3 latest blog posts
        return view('home', compact('products', 'latestPosts'));
    }
}