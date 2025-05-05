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

        $userId = Auth::id();

        Cart::where('user_id', $userId)
            ->where('is_flag', false)
            ->update(['is_flag' => true]);

        // Simpan alamat pengiriman
        Address::create([
            'user_id' => Auth::id(),
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'nomor_hp' => $request->nomor_hp,
        ]);

        // Siapkan pesan untuk dikirim ke WhatsApp Admin
        $pesan = urlencode(
            "Halo Admin, Saya ingin memesan dengan detail berikut:" .
                "Alamat: {$request->alamat}" .
                "Kota: {$request->kota}" .
                "Kode Pos: {$request->kode_pos}" .
                "No HP: {$request->nomor_hp}"
        );

        $nomorAdmin = '6282220481641';

        // Redirect ke WhatsApp
        return redirect("https://wa.me/{$nomorAdmin}?text={$pesan}");
    }
}
