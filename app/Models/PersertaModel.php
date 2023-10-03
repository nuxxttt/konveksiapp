<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersertaModel extends Model
{
    use HasFactory;
    protected $table = 'Persertas';
    protected $fillable =[
        'id_perserta',
        'id_kontigen',
        'gender',
        'usia_category',
        'berat_badan',
        'tinggi_badan',
        'category',
        'kelas'
    ];
}
