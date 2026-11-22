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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete()->noActionOnUpdate();
            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete()->noActionOnUpdate();
            $table->foreignId('reviewer_id')->nullable()->constrained('users')->cascadeOnDelete()->noActionOnUpdate();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->enum('status', ['todo', 'in_progress', 'in_review', 'completed'])->default('todo');
            $table->enum('priority', ['high', 'medium', 'low'])->default('low');
            $table->smallInteger('progress')->default(0);
            $table->timestamp('due_date')->nullable();
            $table->foreignId('created_by')->constrained('users')->casca()->noActionOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
