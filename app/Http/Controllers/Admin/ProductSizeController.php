<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    public function index()
    {
        $productSizes = ProductSize::with('product')->paginate(10);
        return view('admin.product-sizes.index', compact('productSizes'));
    }

    public function edit(ProductSize $productSize)
    {
        return view('admin.product-sizes.edit', compact('productSize'));
    }

    public function update(Request $request, ProductSize $productSize)
    {
        $request->validate([
            'stock' => 'required|integer|min:0',
        ]);

        $productSize->update(['stock' => $request->stock]);

        return redirect()->route('admin.product-sizes.index')->with('success', 'Stok ukuran produk berhasil diperbarui.');
    }
}
