<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsommationsCarburantFacture extends Model
{
    use HasFactory;
    use \Awobaz\Compoships\Compoships;
    protected $primaryKey = 'IdFacture';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];

    public function carte()
    {
        return $this->belongsTo(CarburantCarte::class, 'Idcarte', 'Idcarte');
    }
}
