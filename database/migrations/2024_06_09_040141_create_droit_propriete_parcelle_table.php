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
        Schema::create('droit_propriete_parcelle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('droit_propriete_id')->constrained()->cascadeOnDelete();
            $table->foreignId('parcelle_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('droit_propriete_parcelle');
    }
};
