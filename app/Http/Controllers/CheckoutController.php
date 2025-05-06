<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')
            ->where('user_id', $user->id)
            ->where('is_flag', false)
            ->get();

        // Jika cart kosong, redirect ke halaman utama dengan pesan error
        if ($cartItems->isEmpty()) {
            return redirect()->route('users.product')->with('error', 'Keranjang Anda kosong.');
        }

        $total = 0;
        $totalWeight = 0;

        // Menghitung total harga dan total berat
        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
            $totalWeight += $item->product->weight * $item->quantity;
        }

        // Mengambil alamat pengiriman terakhir yang disimpan oleh user
        $latestAddress = Address::where('user_id', $user->id)->latest()->first();

        return view('users.checkout', compact('user', 'cartItems', 'total', 'totalWeight', 'latestAddress'));
    }

    public function placeOrder(Request $request)
    {
        // Validasi data alamat pengiriman
        $request->validate([
            'alamat' => 'required|string',
            'kota' => 'required|string',
            'kode_pos' => 'required|string',
            'nomor_hp' => 'required|string',
        ]);

        $user = Auth::user();
        $userId = $user->id;

        // Ambil item di keranjang
        $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->where('is_flag', false)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('users.product')->with('error', 'Keranjang Anda kosong.');
        }

        // Hitung total harga dan total berat
        $total = 0;
        $totalWeight = 0;
        $productDetails = '';
        foreach ($cartItems as $index => $item) {
            $total += $item->product->price * $item->quantity;
            $totalWeight += $item->product->weight * $item->quantity;
            // Format detail produk
            $productDetails .= ($index + 1) . ". {$item->product->name} ({$item->quantity} pcs)\n";
        }

        // Tandai item di keranjang sebagai sudah dipesan
        Cart::where('user_id', $userId)
            ->where('is_flag', false)
            ->update(['is_flag' => true]);

        // Simpan alamat pengiriman
        Address::create([
            'user_id' => $userId,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'nomor_hp' => $request->nomor_hp,
        ]);

        // Format tanggal pemesanan (contoh: 06 May 2025)
        $orderDate = now()->format('d M Y');

        // Siapkan pesan untuk WhatsApp
        $pesan = urlencode(
            "Halo admin! Saya mau pesan produk dari website Dendeng.ID\n\n" .
            "Detail Pesanan:\n" .
            $productDetails . "\n" .
            "Total Berat: {$totalWeight} gram\n" .
            "Total Harga: Rp " . number_format($total, 0, ',', '.') . "\n\n" .
            "Data Saya:\n" .
            "Nama: {$user->name}\n" .
            "Alamat: {$request->alamat}\n" .
            "Kota: {$request->kota}\n" .
            "Kode Pos: {$request->kode_pos}\n" .
            "No. HP: {$request->nomor_hp}\n\n" .
            "Tanggal Pemesanan: {$orderDate}\n\n" .
            "Mohon dibantu prosesnya ya, terima kasih!"
        );

        $nomorAdmin = '6282220673341';

        // Redirect ke WhatsApp
        return redirect("https://wa.me/{$nomorAdmin}?text={$pesan}");
    }
}