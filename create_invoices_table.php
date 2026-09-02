<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')
                ->constrained('patients')
                ->restrictOnDelete();

            $table->string('invoice_number')->unique();

            $table->date('issue_date');

            $table->date('due_date')->nullable();

            $table->decimal('subtotal', 12, 2)->default(0);

            $table->decimal('tax', 12, 2)->default(0);

            $table->decimal('discount', 12, 2)->default(0);

            $table->decimal('total', 12, 2)->default(0);

            $table->decimal('amount_paid', 12, 2)->default(0);

            $table->string('status', 20)->default('pending');

            $table->text('notes')->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->index(['patient_id', 'status']);
            $table->index('issue_date');
            $table->index('due_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
