<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lotissement extends Model
{
    use HasFactory;

    protected $fillable = [
        'localite_id',
        'titre',
        'slug',
        'plan_lotissement',
        'plan_urbanisme_directeur',
    ];

    public function parcelles(): HasMany
    {
        return $this->hasMany(Parcelle::class);
    }

    public function localite(): BelongsTo
    {
        return $this->belongsTo(Localite::class);
    }
}
