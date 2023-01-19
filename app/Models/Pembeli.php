<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembeli extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pembelians()
    {
        return $this->hasMany(Pembelian::class);
    }
}
