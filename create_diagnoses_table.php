<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('diagnoses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('consultation_id')
                ->constrained('consultations')
                ->cascadeOnDelete();

            $table->string('cie10_code', 20);
            $table->string('name');

            $table->boolean('primary')->default(false);

            $table->text('description')->nullable();

            $table->timestamps();

            $table->index('cie10_code');
            $table->index(['consultation_id', 'primary']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diagnoses');
    }
};
