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
        Schema::create('conversation_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id')->constrained('conversations')->cascadeOnDelete()->noActionOnUpdate();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->noActionOnUpdate();
            $table->enum('role', ['admin', 'owner', 'member'])->default('member');
            $table->timestamp('joined_at');
            $table->foreignId('last_read_message_id')->nullable()->constrained('messages')->cascadeOnDelete()->noActionOnUpdate();
            $table->timestamp('muted_at')->nullable();
            $table->timestamp('archived_at')->nullable();

            $table->unique(['user_id', 'conversation_id'], 'conversation_members_unique_0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversation_members');
    }
};
