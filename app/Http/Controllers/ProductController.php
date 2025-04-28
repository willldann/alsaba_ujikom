<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        // Ambil semua produk dari database, urutkan dari yang terbaru
        $products = Product::orderBy('created_at', 'desc')->get();

        // Kirim data produk ke view
        return view('users.product', compact('products'));
    }

    public function wildan()
    {
        // Ambil semua produk dari database, urutkan dari yang terbaru
        $products = Product::orderBy('created_at', 'desc')->get();

        // Kirim data produk ke view
        return view('users.product', compact('products'));
    }

    // Menampilkan detail produk
    public function show($id)
    {
        // Ambil produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Tambahkan data thumbnail dan ukuran untuk kebutuhan tampilan
        $product->thumbnails = [
            asset('storage/products/dendeng_manis.jpg'),
            asset('storage/products/dendeng_pedas.jpg'),
            asset('storage/products/dendeng_sapi.jpg')
        ];

        $product->sizes = [
            '100 gram',
            '250 gram',
            '500 gram'
        ];

        // Kirim data produk ke view
        return view('users.detail_produk', compact('product'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string', // Kolom kategori baru
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Simpan gambar produk
        $path = $request->file('image')->store('products', 'public');

        // Simpan data produk ke database
        Product::create([
            'name' => $validated['name'],
            'category' => $validated['category'] ?? '', // Menggunakan kategori baru
            'price' => $validated['price'],
            'image' => $path,
        ]);

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->route('admin.product_admin')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    // Menampilkan halaman produk yang dimiliki
    public function myStore()
    {
        // Ambil semua produk dari database, urutkan dari yang terbaru
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.my_store', compact('products'));
    }

    // Menampilkan form untuk mengedit produk
    public function edit($id)
    {
        // Ambil produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Kirim data produk ke view edit
        return view('admin.edit', compact('product'));
    }

    // Memperbarui produk
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Ambil produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Perbarui data produk
        $product->name = $validated['name'];
        $product->category = $validated['category'] ?? '';
        $product->price = $validated['price'];

        // Jika ada gambar baru, simpan dan update path
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        $product->save();

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->route('admin.product_admin')->with('success', 'Produk berhasil diperbarui!');
    }
}
