<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        $brands = \App\Models\Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'sizes.*.size' => 'required|string|max:255',
            'sizes.*.stock' => 'required|integer|min:0',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product = Product::create([
            'name' => $request->name,
            'slug' => $this->generateUniqueSlug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
        ]);

        if ($request->has('sizes')) {
            foreach ($request->sizes as $sizeData) {
                if (!empty($sizeData['size'])) {
                    $sizeData['stock'] = $sizeData['stock'] ?? 0; // Ensure stock is set, default to 0
                    $product->sizes()->create($sizeData);
                }
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
    }

    public function edit(Product $product)
    {
        $product->load('sizes'); // Load product sizes
        $categories = \App\Models\Category::all();
        $brands = \App\Models\Brand::all();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'sizes.*.size' => 'required|string|max:255',
            'sizes.*.stock' => 'required|integer|min:0',
        ]);

        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'name' => $request->name,
            'slug' => $this->generateUniqueSlug($request->name, $product->id),
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
        ]);

        // Handle product sizes
        if ($request->has('sizes')) {
            $submittedSizeIds = [];
            foreach ($request->sizes as $sizeData) {
                if (!empty($sizeData['size'])) { // Only process if size is not empty
                    $sizeData['stock'] = $sizeData['stock'] ?? 0; // Ensure stock is set, default to 0
                    if (isset($sizeData['id'])) {
                        // Update existing size
                        $product->sizes()->where('id', $sizeData['id'])->update($sizeData);
                        $submittedSizeIds[] = $sizeData['id'];
                    } else {
                        // Create new size
                        $newSize = $product->sizes()->create($sizeData);
                        $submittedSizeIds[] = $newSize->id;
                    }
                }
            }
            // Delete sizes that were removed from the form
            $product->sizes()->whereNotIn('id', $submittedSizeIds)->delete();
        } else {
            // If no sizes are submitted, delete all existing sizes for the product
            $product->sizes()->delete();
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

    protected function generateUniqueSlug($name, $ignoreId = null)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (Product::where('slug', $slug)->where('id', '!=', $ignoreId)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
