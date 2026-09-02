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
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->foreignId('bed_id')->constrained('beds');
            $table->dateTime('admission_date');
            $table->text('admission_diagnosis');
            $table->dateTime('discharge_date')->nullable();
            $table->text('discharge_diagnosis')->nullable();
            $table->enum('discharge_type', ['medical', 'voluntary', 'transfer', 'deceased'])->nullable();
            $table->text('evolution')->nullable();
            $table->enum('status', ['hospitalized', 'discharged', 'transferred', 'deceased'])->default('hospitalized');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hospitalizations');
    }
};
