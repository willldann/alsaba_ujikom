<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed', // Laravel 10+ mendukung hashing otomatis
        'email_verified_at' => 'datetime',
    ];

     // Relasi ke Address (jika ingin dapat alamat terbaru)
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    // Jika Anda ingin ambil alamat terakhir
    public function latestAddress()
    {
        return $this->hasOne(Address::class)->latestOfMany();
    }
}

