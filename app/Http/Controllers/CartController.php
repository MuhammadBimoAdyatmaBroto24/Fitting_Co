<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Support\Facades\Log; // Add this line

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('shopping-cart', compact('cart'));
    }

    public function add(Request $request, Product $product)
    {
        try {
            $cart = session()->get('cart', []);
            $sizeValue = $request->input('size');
            $quantityToAdd = $request->input('quantity', 1);

            // Find the specific product size
            $productSize = ProductSize::where('product_id', $product->id)
                                    ->where('size', $sizeValue)
                                    ->first();

            if (!$productSize) {
                return redirect()->back()->with('error', 'Ukuran produk tidak ditemukan.');
            }

            $cartKey = $product->id . '-' . $productSize->id; // Use product_id and product_size_id as key

            $currentCartQuantity = 0;
            if (isset($cart[$cartKey])) {
                $currentCartQuantity = $cart[$cartKey]['quantity'];
            }

            $newQuantityInCart = $currentCartQuantity + $quantityToAdd;

            if ($productSize->stock < $newQuantityInCart) {
                return redirect()->back()->with('error', 'Stok tidak mencukupi untuk ukuran ini.');
            }

            if (isset($cart[$cartKey])) {
                $cart[$cartKey]['quantity'] = $newQuantityInCart;
            } else {
                $cart[$cartKey] = [
                    "name" => $product->name,
                    "quantity" => $quantityToAdd,
                    "price" => $product->price,
                    "image" => $product->image,
                    "size" => $sizeValue,
                    "product_id" => $product->id,
                    "product_size_id" => $productSize->id // Store product_size_id
                ];
            }

            session()->put('cart', $cart);

            // Decrement stock for the specific product size
            $productSize->decrement('stock', $quantityToAdd);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        } catch (\Exception $e) {
            Log::error("Failed to add product to cart: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to add product to cart. Please try again.');
        }
    }

    public function remove(Request $request, Product $product)
    {
        $cart = session()->get('cart');
        $sizeValue = $request->input('size');
        $cartKey = $product->id . '-' . $product->sizes->where('size', $sizeValue)->first()->id;

        if(isset($cart[$cartKey])) {
            $productSize = ProductSize::find($cart[$cartKey]['product_size_id']);
            if ($productSize) {
                $productSize->increment('stock', $cart[$cartKey]['quantity']);
            }
            unset($cart[$cartKey]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    public function update(Request $request, Product $product)
    {
        $cart = session()->get('cart');
        $sizeValue = $request->input('size');
        $cartKey = $product->id . '-' . $product->sizes->where('size', $sizeValue)->first()->id;

        if(isset($cart[$cartKey])) {
            $oldQuantity = $cart[$cartKey]['quantity'];
            $newQuantity = $request->quantity;

            $productSize = ProductSize::find($cart[$cartKey]['product_size_id']);

            if ($productSize) {
                $difference = $newQuantity - $oldQuantity;
                if ($difference > 0) { // Quantity increased
                    if ($productSize->stock < $difference) {
                        return redirect()->back()->with('error', 'Stok tidak mencukupi untuk menambah kuantitas.');
                    }
                    $productSize->decrement('stock', $difference);
                } elseif ($difference < 0) { // Quantity decreased
                    $productSize->increment('stock', abs($difference));
                }
            }

            $cart[$cartKey]['quantity'] = $newQuantity;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }
}
