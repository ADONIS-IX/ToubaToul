<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatutParcelle extends Model
{
    use HasFactory;

    public function parcelles(): HasMany
    {
        return $this->hasMany(Parcelle::class);
    }
}
