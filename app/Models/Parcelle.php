<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parcelle extends Model
{
    use HasFactory;

    protected $with = [
        'statutParcelle',
        'lotissement',
    ];

    /*
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    */

    public function lotissement(): BelongsTo
    {
       return $this->belongsTo(Lotissement::class);
    }

    public function droitProprietes(): BelongsToMany
    {
        return $this->belongsToMany(DroitPropriete::class);
    }

    public function statutParcelle(): BelongsTo
    {
        return $this->belongsTo(StatutParcelle::class);
    }

    public function dossiers(): HasMany
    {
        return $this->hasMany(Dossier::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function managedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function historique()
    {
        return $this->hasMany(HistoriqueParcelle::class);
    }
}