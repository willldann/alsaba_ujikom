<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
protected $table = 'address';

    protected $fillable = ['user_id', 'alamat', 'kota', 'kode_pos', 'nomor_hp'];
}
