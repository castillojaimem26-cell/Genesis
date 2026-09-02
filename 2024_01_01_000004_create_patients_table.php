<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('document_type', 10);
            $table->string('document_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('insurance_provider')->nullable();
            $table->string('insurance_type')->nullable();
            $table->enum('status', ['active', 'inactive', 'deceased'])->default('active');
            $table->text('allergies')->nullable();
            $table->text('current_medications')->nullable();
            $table->text('personal_history')->nullable();
            $table->text('family_history')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['document_number']);
            $table->index(['last_name', 'first_name']);
            $table->index(['status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
