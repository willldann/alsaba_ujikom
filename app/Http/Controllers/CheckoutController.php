<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    // Menampilkan halaman checkout
    public function index()
    {
        $user = Auth::user(); // Ambil data user

        $cart = Cart::where('user_id', 13)->get(); // Ambil keranjang berdasarkan user yang sedang login

        // dd($cart);
        
        if ($cart->isEmpty()) {
            // Jika keranjang kosong, arahkan kembali dengan pesan error
            return redirect()->route('home')->with('error', 'Keranjang Anda kosong.');
        }        

        // Ambil item keranjang dari tabel cart_items
        $cartItems = $cart->quantity; 
        $total = 0;

        // Validasi dan hitung total harga
        if ($cartItems->count() > 0) {
            foreach ($cartItems as $item) {
                // Pastikan item memiliki data yang valid
                $total += $item->product->price * $item->quantity;
            }
        } else {
            return redirect()->route('home')->with('error', 'Keranjang Anda kosong.');
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

        // Ambil keranjang pengguna
        $user = Auth::user();
        $cart = $user->cart; // Ambil keranjang pengguna dari database

        if (!$cart || $cart->items->count() == 0) {
            return redirect()->route('checkout.index')->with('error', 'Keranjang Anda kosong.');
        }

        // Simpan order
        $order = Order::create([
            'user_id' => $user->id,
            'alamat' => $request->address, // Pastikan ini konsisten dengan field di form
            'telepon' => $request->phone, // Pastikan ini konsisten dengan field di form
            'payment_method' => $request->payment_method,
            'status' => 'pending', // Status default
        ]);

        // Simpan item order dari cart_items
        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $item->product->name, // Asumsi ada field 'name' di produk
                'quantity' => $item->quantity,
                'price' => $item->product->price, // Ambil harga produk dari tabel products
                'total' => $item->product->price * $item->quantity,
            ]);
        }

        // Hapus item keranjang setelah pemesanan
        $cart->items()->delete(); // Hapus semua item di keranjang  
        $cart->delete(); // Hapus keranjang itu sendiri

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat!');
    }
}

