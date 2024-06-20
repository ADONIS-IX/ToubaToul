<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChefLocalite extends Model
{
    use HasFactory;

    public function localite(): BelongsTo
    {
        return $this->belongsTo(Localite::class);
    }
}
