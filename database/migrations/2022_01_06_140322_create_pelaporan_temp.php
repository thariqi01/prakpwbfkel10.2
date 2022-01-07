<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelaporanTemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaporan_temp', function (Blueprint $table) {
            $table->increments('id_laporantemp');
            $table->string('nama_pelapor');
            $table->string('email_pelapor');
            $table->string('nama_bencana');
            $table->string('lokasi_bencana');
            $table->string('status_bencana');
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
        Schema::dropIfExists('pelaporan_temp');
    }
}
