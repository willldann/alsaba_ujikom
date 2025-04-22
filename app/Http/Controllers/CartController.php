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
            ->get();

        return view('users.cart', compact('cartItems'));
    }

    // Menambahkan produk ke cart
    public function addToCart(Request $request, $id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $cartItem = Cart::where('user_id', $user->id)
                        ->where('product_id', $id)
                        ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $id,
                'quantity' => 1,
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
            $cartItem->save();
        }

        return redirect()->route('users.cart');
    }
}
