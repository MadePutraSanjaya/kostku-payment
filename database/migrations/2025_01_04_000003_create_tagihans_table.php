<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihansTable extends Migration
{
    public function up()
    {
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id('id_tagihan');
            $table->unsignedBigInteger('id_penghuni');
            $table->unsignedBigInteger('id_kamar');
            $table->integer('bulan_tagihan');
            $table->year('tahun_tagihan');
            $table->decimal('total_tagihan', 10, 2);
            $table->enum('status_pembayaran', ['Lunas', 'Belum Lunas'])->default('Belum Lunas');
            $table->timestamps();

            $table->foreign('id_penghuni')->references('id_penghuni')->on('penghunis')->onDelete('cascade');
            $table->foreign('id_kamar')->references('id_kamar')->on('kamar_kosts')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tagihans');
    }
}
