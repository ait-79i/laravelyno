<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stagiaire extends Model
{
  public $timestamps = false;
  use HasFactory,SoftDeletes;

  function groupe()
  {
    return $this->belongsTo(Groupe::class);
  }
  function notes()
  {
    return $this->hasMany(Note::class);
  }
//   function exemens()
//   {
//     return $this->belongsToMany(Examen::class, 'note', 'stagaire_id', 'examen_id'); //->as('subscription')

//     //! hna ila ma7taremtich l9awa3id t tsmiya spicifier next
//     //*return $this->belongsToMany(Examen::class,table,foreignPivotKey,relatedPivotKey);

//   }


}
