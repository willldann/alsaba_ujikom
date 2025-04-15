<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Menampilkan halaman keranjang
    public function index()
    {
        // Ambil data cart dari session
        $cart = session()->get('cart', []);

        // Ambil semua produk dari database berdasarkan id yang ada di session
        $productIds = array_keys($cart);

        $products = Product::whereIn('id', $productIds)->get()->map(function ($product) use ($cart) {
            $product->quantity = $cart[$product->id];
            return $product;
        });

        return view('users.cart', compact('products'));
    }

    // Menambahkan produk ke cart
    public function addToCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        session()->put('cart', $cart);
        return redirect()->route('users.cart')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    // Menghapus produk dari cart
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('users.cart')->with('success', 'Produk dihapus dari keranjang!');
    }
}
