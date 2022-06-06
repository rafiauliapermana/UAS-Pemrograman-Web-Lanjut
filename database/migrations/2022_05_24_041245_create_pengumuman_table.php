<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_berkas');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('pelaksanaan_ujian');
            $table->string('tempat');
            $table->timestamps();

            $table->foreign('id_berkas')->references('id')->on('berkas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengumuman');
    }
};
