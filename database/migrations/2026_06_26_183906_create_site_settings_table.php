<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name', 150);
            $table->string('hero_title', 255);
            $table->text('hero_subtitle');
            $table->longText('about');
            $table->string('logo', 255)->nullable();
            $table->string('favicon', 255)->nullable();
            $table->text('footer')->nullable();
            $table->string('primary_color', 20)->default('#0d6efd');
            $table->string('secondary_color', 20)->default('#212529');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
