<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('specialty_id')
                ->constrained('specialties')
                ->restrictOnDelete();

            $table->string('document_type', 20)->default('CC');
            $table->string('document_number', 30)->unique();

            $table->string('professional_license')->unique();

            $table->string('phone')->nullable();

            $table->text('schedule')->nullable();

            $table->boolean('active')->default(true);

            $table->timestamps();

            $table->softDeletes();

            $table->index('specialty_id');
            $table->index('active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
