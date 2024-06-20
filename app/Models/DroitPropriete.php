<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DroitPropriete extends Model
{
    use HasFactory;

    public function parcelles(): BelongsToMany
    {
        return $this->belongsToMany(Parcelle::class);
    }
}
