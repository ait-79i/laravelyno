<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    public $timestamps = false;
    use HasFactory;
    function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    function stagaires()
    {
        return $this->hasMany(Stagiaire::class);
    }
}
