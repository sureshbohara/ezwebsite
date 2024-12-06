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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->integer('rating');
            $table->longText('review');
            $table->longText('content');
            $table->string('image')->nullable();
            $table->string('display_on');
            $table->integer('order_level')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
             $table->index('status'); 
            $table->index('order_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
