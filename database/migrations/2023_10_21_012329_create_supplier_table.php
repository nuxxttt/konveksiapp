<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierTable extends Migration
{
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->id('id');
            $table->string('supplier', 255);
            $table->string('address', 255);
            $table->string('phone', 20);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('supplier');
    }
}
