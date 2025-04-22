<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    // Menampilkan halaman checkout
    public function index()
    {
        $user = Auth::user(); // Ambil data user
        $cartItems = Session::get('cart', []); // Ambil item yang ada di keranjang
        $total = 0;

        // Validasi dan hitung total harga
        if (is_array($cartItems) && count($cartItems) > 0) {
            foreach ($cartItems as $item) {
                // Pastikan item memiliki data yang valid
                if (isset($item['price'], $item['quantity'])) {
                    $total += $item['price'] * $item['quantity'];
                } else {
                    // Log kesalahan jika ada item yang tidak lengkap
                    Log::warning('Item dalam keranjang tidak lengkap: ' . json_encode($item));
                }
            }
        } else {
            // Log kesalahan jika cartItems bukan array atau kosong
            Log::error('Cart items tidak valid, bukan array atau kosong: ' . json_encode($cartItems));
            return redirect()->route('home')->with('error', 'Keranjang Anda kosong atau tidak valid.');
        }

        return view('users.checkout', compact('user', 'cartItems', 'total'));
    }

    // Proses pemesanan
    public function placeOrder(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'address' => 'required|string|max:255', // Menggunakan 'address' sesuai form
            'phone' => 'required|string|max:20', // Menggunakan 'phone' sesuai form
            'payment_method' => 'required|string|in:credit_card,paypal,bca,mandiri', // Validasi metode pembayaran
        ]);

        // Ambil item keranjang yang ada di session
        $cartItems = Session::get('cart', []);

        // Cek jika keranjang kosong atau tidak valid
        if (empty($cartItems) || !is_array($cartItems)) {
            return redirect()->route('checkout.index')->with('error', 'Keranjang Anda kosong atau tidak valid.');
        }

        // Simpan order
        $order = Order::create([
            'user_id' => Auth::id(),
            'alamat' => $request->address, // Pastikan ini konsisten dengan field di form
            'telepon' => $request->phone, // Pastikan ini konsisten dengan field di form
            'payment_method' => $request->payment_method,
            'status' => 'pending', // Status default
        ]);

        // Simpan item order
        foreach ($cartItems as $item) {
            if (isset($item['name'], $item['price'], $item['quantity'])) {
                // Simpan item order hanya jika data lengkap
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'total' => $item['price'] * $item['quantity'],
                ]);
            } else {
                // Log jika ada item yang tidak lengkap
                Log::warning('Item tidak lengkap saat pemesanan: ' . json_encode($item));
            }
        }

        // Hapus keranjang setelah pemesanan
        Session::forget('cart');

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat!');
    }
}

