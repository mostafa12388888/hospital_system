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
        Schema::create('payment_acounts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('patiant_id')->references('id')->on('patients')->cascadeOnDelete();
            $table->decimal('amount',8,2)->nullable();
            $table->string('descrption');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_acounts');
    }
};
