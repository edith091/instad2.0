<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    protected $fillable=[
        'nom',
        'bureau',
        'batiment',
    ];

    // Relation one-to-many avec la table User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}