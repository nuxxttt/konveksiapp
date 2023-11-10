<?php

// app/Models/Penjualan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Category;
use App\Models\Supplier;

class History extends Model
{
    use HasFactory;

    protected $table = 'history';

    protected $fillable = [
        'kode_barang',
        'category_id',
        'supplier_id',
        'harga_pokok',
        'harga_jual',
        'stok',
        'created_by',
        'status',
        'kode_transaksi',
        'keterangan',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
