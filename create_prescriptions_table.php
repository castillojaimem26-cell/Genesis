<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('consultation_id')
                ->constrained('consultations')
                ->cascadeOnDelete();

            $table->foreignId('medication_id')
                ->constrained('medications')
                ->restrictOnDelete();

            $table->string('dose')->nullable();
            $table->string('frequency')->nullable();
            $table->string('route')->nullable();

            $table->integer('duration_days')->nullable();
            $table->integer('quantity')->nullable();

            $table->text('instructions')->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->index('medication_id');
            $table->index('consultation_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
