<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = [
        'uuid',
        'category_id',
        'supplier_id',
        'kode_barang',
        'harga_jual',
        'harga_pokok',
        'stok',
        'created_by',
        'satuan',
        'judul',
        'status',
        'keterangan'
    ];


    public $timestamps = false;

    // Definisikan relasi ke tabel 'category' dan 'supplier' jika diperlukan
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
