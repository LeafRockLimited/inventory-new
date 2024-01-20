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
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamp('tanggal')->default(date('Y-m-d'));
            $table->integer('stok_masuk')->default(0);
            $table->integer('stok_keluar')->default(0);
            $table->decimal('nominal',15,2)->default(0);
            $table->string('bukti_tf')->nullable();
            $table->string('pembeli')->nullable();
            $table->unsignedBigInteger('pemasok')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('transaksi_id')->on('transaksis')->references('id')
            ->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('product_id')->on('products')->references('id')
            ->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('pemasok')->on('pemasoks')->references('id')
            ->onDelete('Cascade')->onUpdate('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksis');
    }
};
