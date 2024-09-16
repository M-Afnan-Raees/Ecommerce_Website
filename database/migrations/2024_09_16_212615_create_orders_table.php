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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('Name')->nullable();
            $table->string('Email')->nullable();
            $table->string('Phone')->nullable();
            $table->string('Address')->nullable();
            $table->string('User_Id')->nullable();

            $table->string('Product_Title')->nullable();
            $table->string('Quantity')->nullable();
            $table->string('Price')->nullable();
            $table->string('Image')->nullable();
            $table->string('Product_Id')->nullable();
            
            $table->string('Payment_Status')->nullable();
            $table->string('Delivery_Status')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
