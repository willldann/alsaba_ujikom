<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Ambil semua produk dari database
        $products = Product::all();
// dd($products);
        // Kirim data produk ke view
        return view('users.product', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        // Tambahan jika produk memiliki array thumbnails dan sizes (sementara dibuat manual)
        $product->thumbnails = ['dendeng-pedas.jpg', 'dendeng-pedas.jpg', 'dendeng-manis.jpg'];
        $product->sizes = ['100 gram', '250 gram', '500 gram'];

        return view('users.detail_produk', compact('product'));

        // Gambar-gambar thumbnail (pastikan file-nya ada di public/assets/)
        $product->thumbnails = [
            'dendeng-manis.jpg',
            'dendeng-pedas.jpg',
            'dendeng-sapi.jpg'
        ];
    }
}
