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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('Title')->nullable();
            $table->string('Description')->nullable();
            $table->string('Image')->nullable();
            $table->string('Price')->nullable();
            $table->string('Quantity')->nullable();
            $table->string('Category')->nullable();
            $table->string('Discount_price')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
