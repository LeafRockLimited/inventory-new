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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->integer('tahun');
            $table->integer('bulan');
            $table->integer('total_stok_masuk')->default(0);
            $table->integer('total_stok_keluar')->default(0);
            $table->decimal('nominal_masuk',15,2)->default(0);
            $table->decimal('nominal_keluar',15,2)->default(0);
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('product_id')->on('products')->references('id')
            ->onDelete('Cascade')->onUpdate('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
