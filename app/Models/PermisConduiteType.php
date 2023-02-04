<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisConduiteType extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdtypeConduite';
    public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];

    public function chauffeur()
    {
        return $this->hasMany(Chauffeur::class, 'IdtypeConduite', 'IdtypeConduite');
    }

}
