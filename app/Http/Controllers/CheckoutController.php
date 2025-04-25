<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Menampilkan halaman checkout
    public function index()
    {
        $user = Auth::user();

        // Ambil item di keranjang user dengan data produk
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('home')->with('error', 'Keranjang Anda kosong.');
        }

        $total = 0;
        $totalWeight = 0; // Inisialisasi variabel untuk total berat

        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
            $totalWeight += $item->product->weight * $item->quantity; // Tambahkan perhitungan berat
        }

        return view('users.checkout', compact('user', 'cartItems', 'total', 'totalWeight'));
    }

    // Proses pemesanan
    public function placeOrder(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'payment_method' => 'required|string|in:credit_card,paypal,bca,mandiri',
        ]);

        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('checkout.index')->with('error', 'Keranjang Anda kosong.');
        }

        // Buat order baru
        $order = Order::create([
            'user_id' => $user->id,
            'alamat' => $request->address,
            'telepon' => $request->phone,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

        // Simpan detail produk ke OrderItem
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $item->product->name,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
                'total' => $item->product->price * $item->quantity,
                'weight' => $item->product->weight, // Tambahkan ini
            ]);
        }

        // Hapus cart setelah checkout
        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat!');
    }
}
