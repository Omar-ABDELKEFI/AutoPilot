<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculeModele extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdModele';
    public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];
    
    /**
     * Get the constructeur that owns the VehiculeModele
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function constructeur()
    {
        return $this->belongsTo(Constructeur::class, 'Idconstructeur', 'Idconstructeur');
    }

    public function vehicule()
    {
        return $this->hasMany(Vehicule::class, 'IdModele', 'IdModele');
    }
}
