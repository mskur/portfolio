<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained('users')->onDelete('cascade');
            $table->string('full_name', 100);
            $table->string('profession', 100);
            $table->string('headline', 255);
            $table->longText('bio');
            $table->string('photo', 255)->nullable();
            $table->string('cv', 255)->nullable();
            $table->string('email', 150);
            $table->string('phone', 30)->nullable();
            $table->string('city', 100);
            $table->string('province', 100);
            $table->string('country', 100)->default('Indonesia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
