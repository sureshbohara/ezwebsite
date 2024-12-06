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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('display_on');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->longText('excerpt');
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('order_level')->default(0);
            $table->string('template');
            $table->text('page_list')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
