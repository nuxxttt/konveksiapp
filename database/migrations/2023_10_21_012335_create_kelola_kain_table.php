<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelolaKainTable extends Migration
{
    public function up()
    {
        Schema::create('kelola_kain', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kain');
            $table->string('nama_kain');
            $table->string('harga_jual', 10);
            $table->decimal('harga_pokok', 10);
            $table->integer('stok');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kelola_kain');
    }
}
