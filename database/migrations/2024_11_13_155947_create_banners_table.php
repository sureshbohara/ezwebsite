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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('banner_title');
            $table->string('banner_sub_title')->nullable(); 
            $table->longText('description')->nullable(); 
            $table->string('image')->nullable();
            $table->string('banner_link')->nullable(); 
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
        Schema::dropIfExists('banners');
    }
};
