<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Localite extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'population',
        'superficie',

    ];

    public function lotissements(): HasMany
    {
        return $this->hasMany(Lotissement::class);
    }

    public function chefLocalites(): HasMany
    {
        return $this->hasMany(ChefLocalite::class);
    }
}
