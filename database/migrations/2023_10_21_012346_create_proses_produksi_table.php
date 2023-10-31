<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProsesProduksiTable extends Migration
{
    public function up()
    {
        Schema::create('proses_produksi', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->string('jumlah');
            $table->date('mulai');
            $table->date('deadline');
            $table->string('status');
            $table->string('mitra');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proses_produksi');
    }
}
