<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'idDirection',
        'usertype',
        'bureau',
        'batiment',
        'disponible'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the direction that the user belongs to.
     */
    public function direction()
    {
        return $this->belongsTo(Direction::class, 'idDirection', 'idDirection');
    }

    /**
     * Relation avec les équipements (un utilisateur peut avoir plusieurs équipements).
     */
    public function equipements()
    {
        return $this->hasMany(Equipement::class);
    }


    /**
     * Vérifie si l'utilisateur a le rôle de technicien.
     */
    public function isTechnician()
    {
        return $this->usertype === 'technicien';
    }

    /**
     * Vérifie si l'utilisateur a le rôle d'utilisateur.
     */
    public function isUser()
    {
        return $this->usertype === 'user';
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class,'user_id');
    }

    public function taches()
{
    return $this->hasMany(Tache::class, 'technicien_id');
}

}
