<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $wishlistProducts = $user->wishlist()->paginate(12); // Paginate for larger wishlists
        return view('wishlist', compact('wishlistProducts'));
    }

    public function toggleWishlist(Product $product)
    {
        $user = Auth::user();

        if ($user->wishlist->contains($product->id)) {
            $user->wishlist()->detach($product->id);
            $message = 'Product removed from wishlist.';
            $added = false;
        } else {
            $user->wishlist()->attach($product->id);
            $message = 'Product added to wishlist.';
            $added = true;
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'added' => $added
        ]);
    }
}