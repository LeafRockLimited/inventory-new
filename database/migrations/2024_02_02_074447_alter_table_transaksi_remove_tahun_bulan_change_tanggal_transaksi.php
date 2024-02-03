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
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropColumn('tahun');
            $table->dropColumn('bulan');
            $table->date('tanggal_transaksi');
            $table->unsignedBigInteger('gudang_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->integer('tahun');
            $table->integer('bulan');
            $table->dropColumn('tanggal_transaksi');
        });
    }
};
