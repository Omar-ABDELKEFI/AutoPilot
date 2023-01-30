<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constructeur extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'Idconstructeur';
    public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];
    
    /**
     * Get all of the Modele for the VehiculeModele
     *
     */
    public function modele()
    {
        return $this->hasMany(VehiculeModele::class, 'Idconstructeur', 'Idconstructeur');
    }

    public function vehicule()
    {
        return $this->hasManyThrough(Vehicule::class,VehiculeModele::class,'Idconstructeur','IdModele','Idconstructeur','IdModele');
    }
}
