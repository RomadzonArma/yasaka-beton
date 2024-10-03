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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->foreignId('customer_id')->constrained('customers');
            $table->date('order_date');
            $table->date('delivery_date');
            $table->string('delivery_location');
            $table->enum('order_status', ['Pending', 'Processing', 'Completed', 'Canceled']);
            $table->decimal('total_volume', 10, 2);
            $table->decimal('price_per_unit', 10, 2);
            $table->decimal('total_price', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
