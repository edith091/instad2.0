<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nomM',
        'codification',
        'etat',
        'date_acquisition',
        'idTypeEquipement'
    ];

    /**
     * Get the user that owns the equipement.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the type of the equipement.
     */
    public function typeEquipement()
    {
        return $this->hasOne(TypeEquipement::class,  'idTypeEquipement');
    }

    public function caracteristique()
    {
        return $this->hasOne(Caracteristique::class);
    }
    

     public function demandes()
    {
        return $this->hasMany(Demande::class,'equipement_id');
    } 

}


