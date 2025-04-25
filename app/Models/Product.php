<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tentukan kolom-kolom yang bisa diisi
    protected $fillable = [
        'name', 'category', 'price', 'stock', 'status', 'image',  'weight'
    ];
}

