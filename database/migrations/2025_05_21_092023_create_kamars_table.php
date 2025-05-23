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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->integer('no_kamar');
            $table->enum('lantai_kamar', ['1','2','3','4']);
            $table->integer('jlh_bed');
            $table->enum('kelas_kamar', ['A', 'B', 'C']);
            $table->integer('harga_perhari');
            $table->enum('status_kamar', ['Sudah Dibooking', 'Belum Dibooking']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
