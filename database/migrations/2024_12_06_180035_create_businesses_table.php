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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('website')->unique();
            $table->string('domain_request')->nullable();
            $table->string('owner_name');
            $table->string('email');
            $table->string('phone');
            $table->string('s_date')->nullable();
            $table->string('e_date')->nullable();
            $table->string('designing_cost')->nullable();
            $table->string('hosting_cost')->nullable();
            $table->string('details')->nullable();
            $table->string('card_name')->nullable();
            $table->string('card_number')->nullable();
            $table->string('expiration_date')->nullable();
            $table->string('security_code')->nullable();
            $table->string('billing_address')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('business_status')->nullable();
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
             $table->foreignId('businesses_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->longText('comments');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
            