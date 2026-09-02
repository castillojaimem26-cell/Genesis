<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lab_results', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lab_exam_id')
                ->unique()
                ->constrained('lab_exams')
                ->cascadeOnDelete();

            $table->foreignId('uploaded_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('approved_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->text('result')->nullable();

            $table->text('reference_values')->nullable();

            $table->string('file_path')->nullable();

            $table->string('file_name')->nullable();

            $table->string('file_type')->nullable();

            $table->unsignedBigInteger('file_size')->nullable();

            $table->dateTime('uploaded_at')->nullable();

            $table->dateTime('approved_at')->nullable();

            $table->text('observations')->nullable();

            $table->timestamps();

            $table->index('uploaded_by');
            $table->index('approved_by');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lab_results');
    }
};
