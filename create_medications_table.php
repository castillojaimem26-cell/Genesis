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
            $table->string('presentation');

            $table->string('concentration')->nullable();

            $table->string('laboratory')->nullable();

            $table->integer('stock')->default(0);
            $table->integer('minimum_stock')->default(0);

            $table->decimal('price', 12, 2)->default(0);

            $table->boolean('active')->default(true);

            $table->timestamps();

            $table->softDeletes();

            $table->index('name');
            $table->index('active_ingredient');
            $table->index('active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
};
