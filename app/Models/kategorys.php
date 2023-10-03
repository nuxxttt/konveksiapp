<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategorys extends Model
{
    use HasFactory;
    protected $table = 'kategorys';
    protected $fillable =[
        'name',
        'status',
        'keterangan'
    ];
}
