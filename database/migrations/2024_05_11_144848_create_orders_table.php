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
            $table->string('order_no');
            $table->string('customer_name');
            $table->string('phone');
            $table->text('address')->nullable();
            $table->integer('amount');
            $table->integer('discount')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('product_qty');
            $table->string('order_status')
                ->default('pending')
                ->comment('pending,confirmed,follow_up,shipped,delivery,returned,cancel');
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