<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelian extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class);
    }
}
