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
        Schema::create('service_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->unique(['locale','service_id']);
            $table->string('name');
            $table->foreignId('service_id')->references('id')->on('services')->cascadeOnDelete();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_translations');
    }
};
