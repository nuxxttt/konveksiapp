<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory;

    protected $table = 'distribusi';
    protected $fillable = ['mitra_id', 'kode_barang', 'kuantitas'];

}
