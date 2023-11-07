<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('category_id');
            $table->string('supplier_id');
            $table->string('harga_pokok',20);
            $table->string('harga_jual',20);
            $table->string('stok');
            $table->string('status');
            $table->string('kode_transaksi');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('history');
    }
}
