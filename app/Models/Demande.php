<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'equipement_id',
        'description',
        'date_demande',
        'statut',
        'priorite',
        'technicien_id',
        'codification',
        'motif_indisponibilite',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function equipement()
    {
        return $this->belongsTo(Equipement::class);
    }

    public function taches()
    {
        return $this->hasMany(Tache::class, 'idDemande');
    }

    public function technicien()
    {
        return $this->belongsTo(User::class, 'technicien_id');
    }

    public function rapports()
    {
        return $this->hasMany(Rapport::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($demande) {
            $latestDemand = self::latest('id')->first();
            $nextId = $latestDemand ? $latestDemand->id + 1 : 1;
            $demande->codification = 'DEM' . str_pad($nextId, 5, '0', STR_PAD_LEFT);
        });
    }
}












