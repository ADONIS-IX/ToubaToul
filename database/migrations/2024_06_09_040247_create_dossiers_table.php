<?php

use App\Enums\EtatDossier;
use App\Enums\TypeDossier;
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
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parcelle_id')->nullable()->constrained()->cascadeOnDelete();
            $table->enum('type', array_column(TypeDossier::cases(), 'value'));
            $table->string('slug')->nullable();
            $table->enum('statut', array_column(EtatDossier::cases(), 'value'))->default(EtatDossier::En_attente->value);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossiers');
    }
};
