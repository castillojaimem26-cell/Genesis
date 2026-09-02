<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hospitalizations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')
                ->constrained('patients')
                ->restrictOnDelete();

            $table->foreignId('bed_id')
                ->constrained('beds')
                ->restrictOnDelete();

            $table->foreignId('admitted_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->dateTime('admitted_at');

            $table->dateTime('discharged_at')->nullable();

            $table->string('status', 30)->default('active');

            $table->text('admission_reason')->nullable();

            $table->text('discharge_notes')->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->index(['patient_id', 'status']);
            $table->index(['bed_id', 'status']);
            $table->index('admitted_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hospitalizations');
    }
};
