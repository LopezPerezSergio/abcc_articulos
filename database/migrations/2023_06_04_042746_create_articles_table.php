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
        Schema::create('articles', function (Blueprint $table) {
            $table->integer('sku')->primary();
            $table->string('article', 15);
            $table->string('brand', 15);
            $table->string('model', 20);
            $table->foreignId('family_id')->constrained()->cascadeOnDelete();
            $table->date('date_high')->format('Y-m-d');
            $table->integer('stock');
            $table->integer('quantity');
            $table->boolean('discontinued');
            $table->date('date_low')->format('Y-m-d')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
