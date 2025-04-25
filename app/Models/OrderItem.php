<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // Menentukan nama tabel (opsional, jika menggunakan nama tabel kustom)
    protected $table = 'order_items';

    // Atribut yang dapat diisi (fillable) untuk mass assignment
    protected $fillable = [
        'order_id',
        'product_name',
        'quantity',
        'price',
        'total',
        'weight', // Menambahkan kolom weight
    ];

    // Definisikan relasi dengan model Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
