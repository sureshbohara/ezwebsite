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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('display_on');
            $table->string('name');
            $table->string('menu_icon')->nullable();
            $table->string('url')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('order_level')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->string('is_cms_page')->nullable()->default('NO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
