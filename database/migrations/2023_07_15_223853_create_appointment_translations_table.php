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
        Schema::create('appointment_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->string('name');
            $table->foreignId('appointment_id')->references('id')->on('appointments')->cascadeOnDelete();
            $table->unique(['locale','appointment_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_translations');
    }
};
