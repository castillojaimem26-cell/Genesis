<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('active_ingredient');
            $table->string('presentation'); // Tableta, Jarabe, etc.
            $table->string('concentration');
            $table->string('laboratory')->nullable();
            $table->string('batch')->nullable();
            $table->date('expiration_date')->nullable();
            $table->integer('stock')->default(0);
            $table->integer('min_stock')->default(10);
            $table->decimal('price', 10, 2)->default(0);
            $table->enum('status', ['active', 'inactive', 'expired'])->default('active');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status']);
            $table->index(['expiration_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
};
