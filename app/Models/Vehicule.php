<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $primaryKey = 'Idvehicule';
    public $incrementing = true;
    public $timestamps = false;
    protected $keyType = 'int';

    protected $guarded = [];

    public function modele()
    {
        return $this->belongsTo(VehiculeModele::class, 'IdModele', 'IdModele');
    }
    
    public function typeVehicule()
    {
        return $this->belongsTo(VehiculeType::class, 'Idtypevehicule', 'Idtypevehicule');
    }

    public function carburant()
    {
        return $this->belongsTo(Carburant::class, 'Idcarburant', 'Idcarburant');
    }

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class, 'Idchauffeur', 'Idchauffeur');
    }
}
