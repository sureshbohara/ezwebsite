<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->tinyInteger('status')->default(1); 
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('image')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->longText('info')->nullable();
            $table->tinyInteger('status')->default(0); 
            $table->rememberToken();
            $table->timestamps();
            $table->index('role_id');
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->json('permission');
            $table->timestamps();
            $table->unique('role_id');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });
        Schema::dropIfExists('users');

        Schema::table('permissions', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles');
    }
};
