<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('email');
            $table->string('phone', 50)->nullable();
            $table->string('timezone', 50)->default('UTC');
            $table->char('currency', 3)->default('USD');
            $table->boolean('is_active')->default(true);
            $table->json('settings')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
