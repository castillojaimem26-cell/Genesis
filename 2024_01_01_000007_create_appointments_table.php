<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->foreignId('specialty_id')->constrained('specialties');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->enum('type', ['consultation', 'follow_up', 'urgency', 'procedure'])->default('consultation');
            $table->text('reason')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'attended', 'cancelled', 'no_show'])->default('pending');
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->text('cancellation_reason')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['appointment_date', 'status']);
            $table->index(['doctor_id', 'appointment_date']);
            $table->index(['patient_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
