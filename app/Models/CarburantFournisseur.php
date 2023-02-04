<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarburantFournisseur extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdFournisseur';
    public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];
}
