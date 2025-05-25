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
        Schema::table('reservasi', function (Blueprint $table) {
        $table->unsignedBigInteger('id_kamar')->after('id_reservasi');

        //membuat relasi foreign key
        $table->foreign('id_kamar')->references('id_kamar')->on('kamars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservasi', function (Blueprint $table) {
        $table->dropForeign(['id_kamar']);
        $table->dropColumn('id_kamar');
        });
    }
};
