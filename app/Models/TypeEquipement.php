<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeEquipement extends Model
{
    use HasFactory;
    protected $fillable=[
        'idTypeEquipement',
        'nom',
    ];

    public function equipement()
    {
        return $this->hasMany(Equipement::class);
    }

    public function caracteristiques()
    {
        return $this->hasMany(Caracteristique::class, 'idTypeEquipement');
    }
}

























