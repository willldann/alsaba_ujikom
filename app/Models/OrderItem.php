<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // Define the table (optional, if you use a custom table name)
    protected $table = 'order_items';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'order_id',
        'product_name',
        'quantity',
        'price',
        'total',
    ];

    // Define relationship with Order model
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
