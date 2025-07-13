<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart));
        return view('checkout', compact('cart', 'total'));
    }

    public function process(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->withInput()->withErrors(['auth_error' => 'Anda harus login untuk menyelesaikan pesanan.']);
        }

        $validatedData = $request->validate([
            'shipping_first_name' => 'required|string|max:255',
            'shipping_last_name' => 'required|string|max:255',
            'shipping_country' => 'required|string|max:255',
            'shipping_address' => 'required|string|max:255',
            'shipping_city' => 'required|string|max:255',
            'shipping_state' => 'required|string|max:255',
            'shipping_zip' => 'required|string|max:255',
            'shipping_phone' => 'required|string|max:255',
            'shipping_email' => 'required|email|max:255',
            'bill_same_as_ship' => 'boolean',
            'billing_first_name' => 'nullable|string|max:255',
            'billing_last_name' => 'nullable|string|max:255',
            'billing_country' => 'nullable|string|max:255',
            'billing_address' => 'nullable|string|max:255',
            'billing_city' => 'nullable|string|max:255',
            'billing_state' => 'nullable|string|max:255',
            'billing_zip' => 'nullable|string|max:255',
            'billing_phone' => 'nullable|string|max:255',
            'billing_email' => 'nullable|email|max:255',
            'payment_method' => 'required|string|in:bank_transfer,e_wallet,cod',
            'delivery_method' => 'required|string|in:express,regular',
            'order_notes' => 'nullable|string|max:1000',
        ]);

        $cart = session()->get('cart', []);
        $totalAmount = array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart));

        $shippingCost = 0;
        if ($validatedData['delivery_method'] === 'express') {
            $shippingCost = 25000;
        } elseif ($validatedData['delivery_method'] === 'regular') {
            $shippingCost = 10000;
        }

        try {
            $order = Order::create([
                'user_id' => Auth::id(),
                'shipping_first_name' => $validatedData['shipping_first_name'],
                'shipping_last_name' => $validatedData['shipping_last_name'],
                'shipping_country' => $validatedData['shipping_country'],
                'shipping_address' => $validatedData['shipping_address'],
                'shipping_city' => $validatedData['shipping_city'],
                'shipping_state' => $validatedData['shipping_state'],
                'shipping_zip' => $validatedData['shipping_zip'],
                'shipping_phone' => $validatedData['shipping_phone'],
                'shipping_email' => $validatedData['shipping_email'],
                'billing_first_name' => $validatedData['bill_same_as_ship'] ? $validatedData['shipping_first_name'] : $validatedData['billing_first_name'],
                'billing_last_name' => $validatedData['bill_same_as_ship'] ? $validatedData['shipping_last_name'] : $validatedData['billing_last_name'],
                'billing_country' => $validatedData['bill_same_as_ship'] ? $validatedData['shipping_country'] : $validatedData['billing_country'],
                'billing_address' => $validatedData['bill_same_as_ship'] ? $validatedData['shipping_address'] : $validatedData['billing_address'],
                'billing_city' => $validatedData['bill_same_as_ship'] ? $validatedData['shipping_city'] : $validatedData['billing_city'],
                'billing_state' => $validatedData['bill_same_as_ship'] ? $validatedData['shipping_state'] : $validatedData['billing_state'],
                'billing_zip' => $validatedData['bill_same_as_ship'] ? $validatedData['shipping_zip'] : $validatedData['billing_zip'],
                'billing_phone' => $validatedData['bill_same_as_ship'] ? $validatedData['shipping_phone'] : $validatedData['billing_phone'],
                'billing_email' => $validatedData['bill_same_as_ship'] ? $validatedData['shipping_email'] : $validatedData['billing_email'],
                'total_amount' => $totalAmount,
                'status' => 'pending',
                'payment_method' => $validatedData['payment_method'],
                'delivery_method' => $validatedData['delivery_method'],
                'shipping_cost' => $shippingCost,
                'order_notes' => $request->input('order_notes'),
            ]);

            // Create order items
            foreach ($cart as $cartKey => $details) {
                $productId = explode('-', $cartKey)[0];
                $order->items()->create([
                    'product_id' => $productId,
                    'quantity' => $details['quantity'],
                    'price' => $details['price'],
                    'size' => $details['size'],
                ]);
            }

            session()->forget('cart');

            // Redirect based on payment method
            Log::info('Order placed successfully. Redirecting for payment method: ' . $validatedData['payment_method'] . ' with Order ID: ' . $order->id);
            switch ($validatedData['payment_method']) {
                case 'bank_transfer':
                    return redirect()->route('payment.bank_transfer', $order->id);
                case 'e_wallet':
                    return redirect()->route('payment.e_wallet', $order->id);
                case 'cod':
                    return redirect()->route('payment.cod', $order->id);
                default:
                    return redirect()->route('order.details', $order->id)->with('success', 'Your order has been placed successfully!');
            }
        } catch (\Exception $e) {
            Log::error('Order placement failed: ' . $e->getMessage());
            Log::error('Stack Trace: ' . $e->getTraceAsString());
            return redirect()->back()->withInput()->withErrors(['order_error' => 'Gagal menempatkan pesanan. Silakan coba lagi atau hubungi dukungan.']);
        }
    }
}
