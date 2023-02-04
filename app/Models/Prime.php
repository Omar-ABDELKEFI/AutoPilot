<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prime extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_prime';
    public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];

    /**
     * Get the user associated with the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class, 'Idchauffeur', 'Idchauffeur');
    }
     
}
