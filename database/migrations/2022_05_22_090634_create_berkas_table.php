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
        Schema::create('berkas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengguna');
            $table->string('ktp')->nullable();
            $table->string('transkip_nilai')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('npwp')->nullable();
            $table->timestamps();

            $table->foreign('id_pengguna')->references('id')->on('pengguna');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas');
    }
};
