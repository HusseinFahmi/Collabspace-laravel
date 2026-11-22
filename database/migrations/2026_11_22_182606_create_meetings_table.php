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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete()->noActionOnUpdate();
            $table->string('title', 225);
            $table->text('description');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->string('meeting_url', 500);
            $table->string('recording_url', 500)->nullable();
            $table->text('ai_summary')->nullable();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete()->noActionOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
