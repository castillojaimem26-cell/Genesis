<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laboratory_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('doctor_id')->constrained('doctors'); // Solicitante
            $table->foreignId('laboratory_test_id')->constrained('laboratory_tests');
            $table->foreignId('consultation_id')->nullable()->constrained('consultations');
            $table->dateTime('requested_at');
            $table->dateTime('sample_taken_at')->nullable();
            $table->dateTime('processed_at')->nullable();
            $table->dateTime('result_date')->nullable();
            $table->text('result')->nullable();
            $table->string('attachment_path')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->enum('status', ['requested', 'sample_taken', 'in_process', 'available', 'cancelled'])->default('requested');
            $table->text('observations')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laboratory_results');
    }
};
