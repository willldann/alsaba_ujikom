<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Logic to show admin dashboard or landing page
        return view('admin.dashboard');
    }
}

    