<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailkorbanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailkorban', function (Blueprint $table) {
            $table->increments('id_detailkorban');
            $table->integer('id_pelaporan')->unsigned();
            $table->foreign('id_pelaporan')->references('id_pelaporan')->on('pelaporan');
            $table->integer('nik');
            $table->string('nama');
            $table->integer('umur');
            $table->text('kondisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailkorban');
    }
}
