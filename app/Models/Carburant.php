<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carburant extends Model
{
    use HasFactory;

    protected $primaryKey = 'Idcarburant';
    public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];

    public function vehicule()
    {
        return $this->hasMany(Vehicule::class, 'Idcarburant', 'Idcarburant');
    }
}
