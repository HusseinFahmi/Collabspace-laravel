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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name', 255);
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->date('deadline')->nullable();
            $table->enum('status', ['active', 'done', 'archived'])->default('active');
            $table->enum('priority', ['high', 'medium', 'low'])->default('low');
            $table->string('project_type', 100);
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->noActionOnUpdate();
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
