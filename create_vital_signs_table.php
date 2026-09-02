<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vital_signs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')
                ->constrained('patients')
                ->restrictOnDelete();

            $table->foreignId('hospitalization_id')
                ->nullable()
                ->constrained('hospitalizations')
                ->nullOnDelete();

            $table->foreignId('recorded_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->dateTime('recorded_at');

            $table->decimal('temperature', 4, 1)->nullable();

            $table->string('blood_pressure', 20)->nullable();

            $table->unsignedSmallInteger('heart_rate')->nullable();

            $table->unsignedSmallInteger('oxygen_saturation')->nullable();

            $table->decimal('weight', 6, 2)->nullable();

            $table->decimal('height', 5, 2)->nullable();

            $table->decimal('glucose', 6, 2)->nullable();

            $table->text('observations')->nullable();

            $table->timestamps();

            $table->index(['patient_id', 'recorded_at']);
            $table->index('hospitalization_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vital_signs');
    }
};
