<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category') && !empty($request->category)) {
            $categorySlug = $request->category;
            $category = Category::where('slug', $categorySlug)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            } else {
                // If category not found, no products will match, so return empty or handle as needed
                $products = collect(); // Return an empty collection
                $categories = Category::all();
                $brands = Brand::all();
                return view('shop', compact('products', 'categories', 'brands'));
            }
        }

        if ($request->has('brand') && !empty($request->brand)) {
            $brandSlug = $request->brand;
            $brand = Brand::where('slug', $brandSlug)->first();
            if ($brand) {
                $query->where('brand_id', $brand->id);
            } else {
                // If brand not found, no products will match, so return empty or handle as needed
                $products = collect(); // Return an empty collection
                $categories = Category::all();
                $brands = Brand::all();
                return view('shop', compact('products', 'categories', 'brands'));
            }
        }

        

        $products = $query->paginate(12); // Paginate with 12 products per page
        $categories = Category::all();
        $brands = Brand::all();

        return view('shop', compact('products', 'categories', 'brands'));
    }
}
