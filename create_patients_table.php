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

            $table->string('document_type', 20)->default('CC');
            $table->string('document_number', 30)->unique();

            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('second_last_name')->nullable();

            $table->date('birth_date');
            $table->string('gender', 30)->nullable();

            $table->string('blood_type', 5)->nullable();

            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->text('address')->nullable();
            $table->string('city')->nullable();

            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('emergency_contact_relationship')->nullable();

            $table->boolean('active')->default(true);

            $table->timestamps();

            $table->softDeletes();

            $table->index('last_name');
            $table->index('birth_date');
            $table->index('active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
