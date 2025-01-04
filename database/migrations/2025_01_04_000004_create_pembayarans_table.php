<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->unsignedBigInteger('id_tagihan');
            $table->date('tanggal_pembayaran');
            $table->decimal('jumlah_dibayar', 10, 2);
            $table->string('metode_pembayaran')->nullable();
            $table->timestamps();

            $table->foreign('id_tagihan')->references('id_tagihan')->on('tagihans')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
}
