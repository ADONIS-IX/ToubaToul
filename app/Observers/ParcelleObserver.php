<?php

namespace App\Observers;

use App\Models\HistoriqueParcelle;
use App\Models\Parcelle;

class ParcelleObserver
{
    /**
     * Handle the Parcelle "created" event.
     */
    public function created(Parcelle $parcelle): void
    {
        //
    }

    /**
     * Handle the Parcelle "updated" event.
     */
    public function updated(Parcelle $parcelle): void
    {
        if ($parcelle->isDirty('proprietaire_id')) {
            HistoriqueParcelle::create([
                'parcelle_id' => $parcelle->id,
                'old_proprietaire_id' => $parcelle->getOriginal('proprietaire_id'),
                'new_proprietaire_id' => $parcelle->proprietaire_id,
                ]);
            }
    }

    /**
     * Handle the Parcelle "deleted" event.
     */
    public function deleted(Parcelle $parcelle): void
    {
        //
    }

    /**
     * Handle the Parcelle "restored" event.
     */
    public function restored(Parcelle $parcelle): void
    {
        //
    }

    /**
     * Handle the Parcelle "force deleted" event.
     */
    public function forceDeleted(Parcelle $parcelle): void
    {
        //
    }
}
