<?php

use App\Models\Transactions;
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
            $table->dateTime('transaction_time');
            $table->decimal('total_amount', 10)->default(0);
            $table->foreignId('payment_methods_id')->constrained('payment_methods')->restrictOnDelete();
            $table->enum('status', array_keys(Transactions::getStatusLabel()));
            $table->text('notes')->nullable();
            $table->text('edited_notes')->nullable();
            $table->timestamps();
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
