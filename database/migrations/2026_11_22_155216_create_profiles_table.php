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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained('users')->cascadeOnDelete()->noActionOnUpdate();
            $table->string('full_name', 255);
            $table->string('avatar_path', 255)->nullable();
            $table->string('specialty', 255)->nullable();
            $table->text('about')->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->enum('availability_status', ['available', 'not available'])->default('available');
            $table->string('job_title', 255)->nullable();
            $table->tinyInteger('years_of_experience')->nullable();
            $table->timestamp('joined_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
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
