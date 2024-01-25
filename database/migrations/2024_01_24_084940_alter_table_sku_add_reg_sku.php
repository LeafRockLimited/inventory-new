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
        Schema::table('skus', function (Blueprint $table) {
            $table->uuid('reg_sku')->nullable();
            $table->integer('minimum_stock')->default(0);
            $table->integer('maximum_stock')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('skus', function (Blueprint $table) {
            $table->dropColumn('reg_sku');
            $table->dropColumn('minimum_stock');
            $table->dropColumn('maximum_stock');
        });
    }
};
