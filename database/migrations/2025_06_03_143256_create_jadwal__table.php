<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id('id_jadwal'); // primary key auto increment
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->string('hari');
            
            // Foreign key ke tabel dokter
            $table->unsignedBigInteger('id_dokter');
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
}
