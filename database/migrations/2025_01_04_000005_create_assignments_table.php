<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id('id_assignment');
            $table->unsignedBigInteger('id_penghuni');
            $table->unsignedBigInteger('id_kamar');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir')->nullable();
            $table->timestamps();

            $table->foreign('id_penghuni')->references('id_penghuni')->on('penghunis')->onDelete('cascade');
            $table->foreign('id_kamar')->references('id_kamar')->on('kamar_kosts')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}
