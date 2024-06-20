<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lotissement extends Model
{
    use HasFactory;

    public function parcelles(): HasMany
    {
        return $this->hasMany(Parcelle::class);
    }

    public function localite(): BelongsTo
    {
        return $this->belongsTo(Localite::class);
    }
}
