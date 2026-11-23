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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id')->constrained('conversations')->cascadeOnDelete()->noActionOnUpdate();
            $table->foreignId('sender_id')->nullable()->constrained('users')->nullOnDelete()->noActionOnUpdate();
            $table->text('body')->nullable();
            $table->enum('type', ['text', 'image', 'file'])->default('text');
            $table->foreignId('reply_to_message_id')->nullable()->constrained('messages')->cascadeOnDelete()->noActionOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
