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
        Schema::create('group_translations', function (Blueprint $table) {
            $table->id();
           $table->string('locale')->index();
           $table->unique(['locale','group_id','name']);
           $table->string('name');
           $table->string('notes')->nullable();
           $table->foreignId('group_id')->references('id')->on('groups')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_translations');
    }
};
