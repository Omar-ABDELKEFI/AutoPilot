<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Voyage extends Model
{
    use HasFactory;
    use \Awobaz\Compoships\Compoships;

    protected $primaryKey = 'IdVoyage';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class, 'Idchauffeur', 'Idchauffeur');
    }
    
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'Idvehicule', 'Idvehicule');
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'Iddestination', 'Iddestination');
    }
}
