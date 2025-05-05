<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart; // Tambahkan model Cart
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Cek apakah user memiliki akses sebagai admin
        if ($user->role == 'user') {
            return redirect()->route('dashboard');
        }

        // Mengambil data statistik
        $visitors = User::count(); // Hitung jumlah pengunjung (asumsi ada entitas User untuk pengunjung)

        $recentOrders = Cart::with('user', 'product')  // bagian orders
        ->where('is_flag', true)
        ->latest()->get();

        $recentCarts = Cart::with('user', 'product')
        ->where('is_flag', false)
        ->latest()->get();

        // Kirim data ke view
        return view('admin.index', compact('visitors', 'recentCarts','recentOrders'));
    }
}
