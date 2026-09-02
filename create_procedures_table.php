<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')
                ->constrained('patients')
                ->restrictOnDelete();

            $table->foreignId('hospitalization_id')
                ->nullable()
                ->constrained('hospitalizations')
                ->nullOnDelete();

            $table->foreignId('performed_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('name');

            $table->text('description')->nullable();

            $table->dateTime('performed_at');

            $table->text('observations')->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->index(['patient_id', 'performed_at']);
            $table->index('hospitalization_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('procedures');
    }
};
