<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenghunisTable extends Migration
{
    public function up()
    {
        Schema::create('penghunis', function (Blueprint $table) {
            $table->id('id_penghuni');
            $table->string('nama_penghuni');
            $table->string('no_telepon');
            $table->string('email')->unique()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penghunis');
    }
}
