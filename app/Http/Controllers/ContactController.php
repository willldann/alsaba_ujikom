<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'message' => 'required|string',
            // 'title'   => 'nullable|string'
        ]);

        Mail::to('fahmiabror516@gmail.com')->send(new ContactMessage($request->all()));

        return back()->with('success', 'Pesan berhasil dikirim!');
}
}