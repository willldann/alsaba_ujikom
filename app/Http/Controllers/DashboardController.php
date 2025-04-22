<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'user') {
            return redirect()->route('dashboard');
        }

        // Mengambil data statistik
        $newOrders = Order::where('status', 'new')->count(); // Hitung jumlah pesanan baru
        $visitors = User::count(); // Hitung jumlah pengunjung (asumsi ada entitas User untuk pengunjung)
        $totalSales = Order::sum('total_amount'); // Hitung total penjualan

        // Mengambil 5 pesanan terbaru
        $recentOrders = Order::latest()->take(5)->get();

        // Kirim data ke view
        return view('admin.index', compact('newOrders', 'visitors', 'totalSales', 'recentOrders'));
    }
}
