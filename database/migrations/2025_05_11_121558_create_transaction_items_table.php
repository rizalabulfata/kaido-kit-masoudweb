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
        Schema::create('transaction_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transactions_id')->constrained('transactions')->restrictOnDelete();
            $table->foreignId('items_id')->constrained('items')->restrictOnDelete();
            $table->decimal('qty')->default(0);
            $table->decimal('unit_price', 10)->default(0);
            $table->decimal('total_price', 10)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_items');
    }
};
