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
        Schema::create('task_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('tasks')->cascadeOnDelete()->noActionOnUpdate();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->noActionOnUpdate();
            $table->foreignId('assigned_by')->nullable()->constrained('users')->nullOnDelete()->noActionOnUpdate();
            $table->timestamp('assigned_at')->useCurrent();

            $table->unique(['task_id', 'user_id'], 'Task_assignment_unique_0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_assignments');
    }
};
