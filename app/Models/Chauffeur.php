<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;

    protected $primaryKey = 'Idchauffeur';
    public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];

    public function vehicule()
    {
        return $this->hasMany(Vehicule::class, 'Idchauffeur', 'Idchauffeur');
    }

    public function typePermis()
    {
        return $this->belongsTo(PermisConduiteType::class, 'IdtypeConduite', 'IdtypeConduite');
    }

    public function nom_et_prenom(){
        return "{$this->Prenom_chauffeur} {$this->Nom_chauffeur}";
    }
}
