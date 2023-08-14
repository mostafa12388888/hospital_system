<?php

use App\Models\FundAccount;
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
        Schema::create('patient_accounts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('patient_id')->references('id')->on('patients')->onDelete('cascade');

            $table->foreignId('invoice_id')->nullable()->references('id')->on('invoices')->onDelete('cascade');
           $table->foreignId('recipt_id')->nullable()->references('id')->on('recipt_acouts')->cascadeOnDelete();
           $table->foreignId('Payment_id')->nullable()->references('id')->on('payment_acounts')->cascadeOnDelete();
           $table->decimal('Debit',8,2)->nullable();
            $table->decimal('Credit',8,2)->nullable();
            $table->timestamps();
        });
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_accounts');
    }
};
