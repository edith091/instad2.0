<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Caracteristique extends Model
{
    protected $fillable = [
        'idTypeEquipement', 'marque', 'modele', 'processor', 'ram', 'storage', 'os', 'ecran', 'gpu', 'printer_type', 'print_speed', 'scanner_type', 'resolution', 'other_type', 'details','equipement_id'
    ];

    public function typeEquipement()
    {
        return $this->belongsTo(TypeEquipement::class, 'idTypeEquipement');
    }

    public function equipement()
    {
        return $this->belongsTo(Equipement::class);
    }

}
