<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('konversi', function (Blueprint $table) {
            $table->id();
            $table->string("satuan_id1");
            $table->string("satuan_id2");
            $table->string("hasil_id1");
            $table->string("hasil_id2");
            $table->string("nama_konversi");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konversi');
    }
};
