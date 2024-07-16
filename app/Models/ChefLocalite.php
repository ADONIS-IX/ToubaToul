<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChefLocalite extends Model
{
    use HasFactory;

    //protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = [
        'prenom',
        'nom',
        'numero_cni',
        'email',
        'telephone',
        'photo_cni',
    ];

    public function localite(): BelongsTo
    {
        return $this->belongsTo(Localite::class);
    }
}
