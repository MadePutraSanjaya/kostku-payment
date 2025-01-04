<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarKostsTable extends Migration
{
    public function up()
    {
        Schema::create('kamar_kosts', function (Blueprint $table) {
            $table->id('id_kamar');
            $table->string('lokasi_kamar');
            $table->text('fasilitas');
            $table->enum('status_kamar', ['Available', 'Occupied'])->default('Available');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kamar_kosts');
    }
}
