<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarburantCarte extends Model
{
    use HasFactory;

    protected $primaryKey = 'Idcarte';
    public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];

    public function fournisseur()
    {
        return $this->belongsTo(CarburantFournisseur::class, 'IdFournisseur', 'IdFournisseur');
    }

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'Idvehicule', 'Idvehicule');
    }

    public function carburant()
    {
        return $this->belongsTo(Carburant::class, 'Idcarburant', 'Idcarburant');
    }

}
