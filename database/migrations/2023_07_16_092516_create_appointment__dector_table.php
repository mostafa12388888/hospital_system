<?php

use App\Models\Doctor;
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
        Schema::create('appointment__dector', function (Blueprint $table) {
            $table->id();
            $table->foreignId('docutor_id')->references('id')->on('doctors')->cascadeOnDelete();
            $table->foreignId('appointment_id')->references('id')->on('appointments')->cascadeOnDelete();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment__dector');
    }
};
