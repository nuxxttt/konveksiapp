<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsiRak extends Model
{
    use HasFactory;
    protected $table = 'isi_rak';
    protected $fillable =[
        'id_rak', 'nama_barang', 'kuantitas', 'satuan', 'created_by'
    ];
}
