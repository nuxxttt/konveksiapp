<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konversi extends Model
{
    use HasFactory;
    protected $table = "konversi";
    protected $fillable = [
        "satuan_id1",
        "satuan_id2",
        "hasil_id1",
        "hasil_id2",
        "nama_konversi",
    ];
}
