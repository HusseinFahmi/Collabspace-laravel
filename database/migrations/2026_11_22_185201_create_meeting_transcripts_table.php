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
        Schema::create('meeting_transcripts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meeting_id')->constrained('meetings')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('speaker_id')->nullable()->constrained('users')->nullOnDelete()->noActionOnUpdate();
            $table->string('speaker_name', 150);
            $table->unsignedInteger('offset_seconds')->default(0);   
            $table->string('language', 20)->default('en');
            $table->text('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_transcripts');
    }
};
