<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;

    protected $fillable = [
        'demande_id',
        'technician_id',
        'feedback',
        'tache_id', 
    ];

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }

    public function tache()
{
    return $this->belongsTo(Tache::class);
}

}
