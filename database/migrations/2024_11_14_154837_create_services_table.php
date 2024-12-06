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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_title');
            $table->string('service_sub_title')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->longText('excerpt');
            $table->longText('description')->nullable();
            $table->string('display_on')->nullable();
            $table->string('image')->nullable();
            $table->string('feature_image')->nullable(); 
            $table->text('service_feature')->nullable();
            $table->integer('order_level')->default(0); 
            $table->tinyInteger('status')->default(1);
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable(); 
            $table->timestamps();
            // Indexes for frequently queried columns
            $table->index('status'); 
            $table->index('order_level'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
