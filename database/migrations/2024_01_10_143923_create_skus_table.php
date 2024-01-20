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
        Schema::create('skus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->decimal('harga',15,2)->default(0);
            $table->integer('masuk')->default(0)->comment('mutasi');
            $table->integer('keluar')->default(0)->comment('mutasi');
            $table->integer('penyesuaian')->default(0)->comment('mutasi');
            $table->integer('total')->default(0);
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
        Schema::dropIfExists('skus');
    }
};
