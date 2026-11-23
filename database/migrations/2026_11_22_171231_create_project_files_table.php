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
        Schema::create('project_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete()->noActionOnUpdate();
            $table->foreignId('upload_by')->nullable()->constrained('users')->nullOnDelete()->noActionOnUpdate();
            $table->string('name', 255);
            $table->string('file_path', 500);
            $table->string('mime_type', 100);
            $table->string('extension', 20);
            $table->bigInteger('file_size');
            $table->timestamp('uploaded_at');
            $table->softDeletes();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_files');
    }
};
