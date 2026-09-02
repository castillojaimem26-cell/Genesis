<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory_movements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('medication_id')
                ->constrained('medications')
                ->restrictOnDelete();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('type', 20);

            $table->integer('quantity');

            $table->integer('stock_before');
            $table->integer('stock_after');

            $table->string('lot_number')->nullable();

            $table->date('expiration_date')->nullable();

            $table->string('reference_type')->nullable();
            $table->unsignedBigInteger('reference_id')->nullable();

            $table->text('reason')->nullable();

            $table->timestamps();

            $table->index(['medication_id', 'type']);
            $table->index('lot_number');
            $table->index('expiration_date');
            $table->index(['reference_type', 'reference_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventory_movements');
    }
};
