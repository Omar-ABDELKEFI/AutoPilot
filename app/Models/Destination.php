<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'Iddestination';
    public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];
}
