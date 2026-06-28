<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('project_categories')->onDelete('restrict');
            $table->string('title', 200);
            $table->string('slug', 220)->unique();
            $table->text('short_description');
            $table->longText('description');
            $table->string('thumbnail', 255);
            $table->string('github_url', 255)->nullable();
            $table->string('live_demo', 255)->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('role', 100);
            $table->enum('status', ['Completed', 'Development', 'Archived']);
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
