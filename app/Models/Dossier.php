<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dossier extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function parcelle(): BelongsTo
    {
        return $this->belongsTo(Parcelle::class);
    }

    public function pieceDossier(): HasMany
    {
        return $this->hasMany(PieceDossier::class);
    }

    public function observations(): HasMany
    {
        return $this->hasMany(Observation::class)->latest();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    protected $table = 'dossiers';

    protected $fillable = ['type','statut', 'slug', 'user_id'];
}
