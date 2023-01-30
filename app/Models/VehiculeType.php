<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculeType extends Model
{
    use HasFactory;

    protected $primaryKey = 'Idtypevehicule';
    public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];

    public function vehicule()
    {
        return $this->hasMany(Vehicule::class, 'Idtypevehicule', 'Idtypevehicule');
    }
}
