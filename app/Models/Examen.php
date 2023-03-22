<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
  public $timestamps = false;
  use HasFactory;


//   function stagiaires()
//   {
//     return $this->belongsToMany(Stagiaire::class, 'note', 'examen_id', 'stagaire_id'); //->as('subscription')
//   }

    function note()
    {
        return $this->hasOne(Note::class);
    }
    function module()
    {
        return $this->belongsTo(Module::class);
    }
}
