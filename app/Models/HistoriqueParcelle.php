<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueParcelle extends Model
{
    use HasFactory;

    public function parcelle()
    {
        return $this->belongsTo(Parcelle::class);
    }

    public function oldProprietaire()
    {
        return $this->belongsTo(User::class, 'old_proprietaire_id');
    }

    public function newProprietaire()
    {
        return $this->belongsTo(User::class, 'new_proprietaire_id');
    }
}
