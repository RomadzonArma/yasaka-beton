<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('phone_number');
            $table->string('email');
            $table->enum('payment_method', ['transfer', 'cash']);
            $table->foreignId('concrete_type_id')->constrained('concrete_types');
            $table->decimal('area_width', 10, 2);
            $table->decimal('area_length', 10, 2);
            $table->decimal('total_area', 10, 2);
            $table->integer('total_trucks');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
