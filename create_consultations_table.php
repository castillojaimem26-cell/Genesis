<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('appointment_id')
                ->nullable()
                ->constrained('appointments')
                ->nullOnDelete();

            $table->foreignId('patient_id')
                ->constrained('patients')
                ->restrictOnDelete();

            $table->foreignId('doctor_id')
                ->constrained('doctors')
                ->restrictOnDelete();

            $table->dateTime('consulted_at');

            $table->text('chief_complaint')->nullable();
            $table->text('symptoms')->nullable();
            $table->text('physical_examination')->nullable();
            $table->text('diagnosis_summary')->nullable();
            $table->text('treatment')->nullable();
            $table->text('evolution')->nullable();
            $table->text('observations')->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->index(['patient_id', 'consulted_at']);
            $table->index(['doctor_id', 'consulted_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
