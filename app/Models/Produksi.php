<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $table = 'proses_produksi';
    protected $fillable = [
        'product',
        'jumlah',
        'mulai',
        'deadline',
        'status',
        'mitra'
    ];
}
