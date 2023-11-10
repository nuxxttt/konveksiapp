<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('category_id');
            $table->string('supplier_id');
            $table->string('kode_barang');
            $table->string('harga_jual',20);
            $table->string('harga_pokok', 20);
            $table->string('stok');

            $table->string('judul')->required();

            $table->string('status');
            $table->string('keterangan');
            $table->string('satuan');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
