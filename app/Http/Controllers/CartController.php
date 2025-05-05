<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    // Menampilkan halaman keranjang
    public function index()
    {
        $user = Auth::user();

        $cartItems = Cart::with('product')
            ->where('user_id', $user->id)
            ->where('is_flag', false)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('users.product')->with('error', 'Keranjang Anda kosong.');
        }

        return view('users.cart', compact('cartItems'));
    }

    // Menambahkan produk ke cart
    public function addToCart(Request $request, $id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil jumlah produk dari input
        $quantity = (int) $request->input('quantity', 1);
        if ($quantity < 1) {
            return redirect()->route('users.cart')->with('error', 'Jumlah produk tidak valid.');
        }

        // Ambil produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Berat tetap produk, yaitu 50 gram (0.05 kg)
        $productWeight = 50; // Berat produk dalam gram

        // Hitung total berat berdasarkan jumlah produk yang dipilih pengguna
        $totalWeight = $productWeight * $quantity;

        // Cek apakah produk sudah ada di keranjang
        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $id)
            ->where('is_flag', false)
            ->first();

        if ($cartItem) {
            // Jika produk sudah ada, update kuantitas dan hitung ulang total berat
            $cartItem->quantity += $quantity;
            $cartItem->weight = $cartItem->quantity * $productWeight; // Update total berat
            $cartItem->save();
        } else {
            // Jika produk belum ada di keranjang, buat item baru di keranjang
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $id,
                'quantity' => $quantity,
                'weight' => $totalWeight, // Simpan total berat
            ]);
        }

        return redirect()->route('users.cart')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    // Menghapus produk dari cart
    public function removeFromCart($id)
    {
        $user = Auth::user();
        Cart::where('user_id', $user->id)
            ->where('product_id', $id)
            ->where('is_flag', false)
            ->delete();

        return redirect()->route('users.cart')->with('success', 'Produk dihapus dari keranjang!');
    }

    // Update kuantitas produk di cart (+/-)
    public function updateCart(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);

        if ($cartItem->user_id !== Auth::id()) {
            abort(403);
        }

        $change = (int) $request->input('change', 0);
        $newQuantity = $cartItem->quantity + $change;

        if ($newQuantity < 1) {
            $cartItem->delete();
        } else {
            $cartItem->quantity = $newQuantity;
            $cartItem->weight = $cartItem->quantity * 50; // Update berat berdasarkan kuantitas
            $cartItem->save();
        }

        return redirect()->route('users.cart');
    }
}
