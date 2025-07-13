<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function explain(Product $product)
    {
        $product->load('category', 'brand', 'sizes');

        $relatedProducts = Product::where('category_id', $product->category_id)
                                ->where('id', '!=', $product->id)
                                ->inRandomOrder()
                                ->limit(4)
                                ->get();

        return view('product-explanation', compact('product', 'relatedProducts'));
    }
}


