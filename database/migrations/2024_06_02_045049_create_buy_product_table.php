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
        Schema::create('buy_product', function (Blueprint $table) {
            $table->id('no');
            $table->unsignedBigInteger('camera_id');
            $table->integer('user_id');
            $table->string('camera_name', 255);
            $table->string('camera_foto', 255);
            $table->integer('quantity');
            $table->string('total_price', 50);
            $table->string('address', 500);
            $table->string('status', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buy_product');
    }
};
