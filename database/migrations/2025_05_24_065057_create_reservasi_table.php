<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservasi', function (Blueprint $table) {
            $table->bigIncrements('id_reservasi');
            $table->string('nama_tamu');
            $table->string('no_tlpn');
            $table->integer('jlh_tamu');
            $table->integer('no_kamar');
            $table->enum('lantai_kamar',['1','2','3','4']);
            $table->integer('jlh_bed');
            $table->enum('kelas_kamar',['A','B','C']);
            $table->integer('harga_perhari');
            $table->enum('status_kamar',['Sudah Dibooking','Belum Dibooking']);
            $table->date('tgl_check_in');
            $table->date('tgl_check_out');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
