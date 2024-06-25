<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Un utilisateur possède plusieurs parcelles
    public function parcelles()
    {
        return $this->hasMany(Parcelle::class, 'proprietaire_id');
    }

    // Un utilisateur gère plusieurs parcelles
    public function managedParcelles()
    {
        return $this->belongsToMany(Parcelle::class, 'parcelle_user');
    }

    public function dossiers(): BelongsToMany
    {
        return $this->belongsToMany(Dossier::class);
    }

    public function userDossiers(): HasMany
    {
        return $this->hasMany(Dossier::class)->latest();
    }

    public function piece()
    {
        return $this->hasOne(PieceDossier::class);
    }

    public function pieces()
    {
        return $this->hasMany(PieceDossier::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'role',
        'password',
        'profession',
        'genre',
        'adresse',
        'numero_cni',
        'telephone',
        'date_naissance',
        'lieu_naissance',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => Role::class,
        ];
    }

    public function isProprietaire(): bool
    {
        return $this->role === Role::Proprietaire;
    }
}
