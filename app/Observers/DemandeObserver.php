<?php

namespace App\Observers;

use App\Models\Demande;

class DemandeObserver
{
    /**
     * Handle the Demande "created" event.
     */
    public function created(Demande $demande): void
    {
        $demande->codification = 'DEM' . $demande->id;
        $demande->save();
    }


    /**
     * Handle the Demande "updated" event.
     */
    public function updated(Demande $demande): void
    {
        //
    }

    /**
     * Handle the Demande "deleted" event.
     */
    public function deleted(Demande $demande)
    {
        // Récupérer toutes les demandes restantes et les réordonner
        $demandes = Demande::orderBy('id')->get();

        // Réassigner les numéros
        foreach ($demandes as $index => $d) {
            $d->codification = 'DEM' . ($index + 1);
            $d->save();
        }
    }

    /**
     * Handle the Demande "restored" event.
     */
    public function restored(Demande $demande): void
    {
        //
    }

    /**
     * Handle the Demande "force deleted" event.
     */
    public function forceDeleted(Demande $demande): void
    {
        //
    }
}
