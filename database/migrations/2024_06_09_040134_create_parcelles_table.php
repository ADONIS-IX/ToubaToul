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
        Schema::create('parcelles', function (Blueprint $table) {
            $table->id();
            $table->string('numeroLot')->unique();
            $table->double('superficie');
            $table->double('coordonne_x');
            $table->double('coordonne_y');
            $table->foreignId('lotissement_id')->constrained()->cascadeOnDelete();
            $table->foreignId('statut_parcelle_id')->constrained()->cascadeOnDelete();
            $table->foreignId('proprietaire_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcelles');
    }
};
