<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesilatModel extends Model
{
    use HasFactory;
    protected $table = 'pesilats';
    protected $fillable =[
        'nik',
        'nama',
        'hp',
        'jenis_kelamin',
        'tanggal_lahir',
        'provinsi',
        'kota',
        'kecamatan',
        'desa',
        'alamat',
        'foto',
        'persyaratan',
        'id_kontigen',
        'status',
        'keterangan'
    ];
}
