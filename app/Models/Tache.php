<?php

// app/Models/Tache.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        'demande_id',
        'user_id',
        'technicien_id',
        'statut',
        'feedback',
        'rapport_utilisateur',
        'date_debut',
        'date_fin',
    ];

    /**
     * Get the demand associated with this task.
     */
    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

    /**
     * Get the user assigned to this task.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the technician assigned to this task.
     */
    public function technicien()
    {
        return $this->belongsTo(User::class, 'technicien_id');
    }

    public function rapports()
    {
        return $this->hasMany(Rapport::class);
    }

    /**
     * Update the task status based on the associated demand's `motif_indisponibilite`.
     */
    public function updateStatut()
    {
        if ($this->demande && $this->demande->motif_indisponibilite) {
            $this->statut = 'annulé'; // ou autre valeur selon vos besoins
            $this->save();
        }
    }
}
