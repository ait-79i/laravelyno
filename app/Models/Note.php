<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Note extends Model
{
  public $timestamps =  false;
  use HasFactory;
  public function stagiaire()
  {
    return $this->belongsTo(Stagiaire::class);
  }



  public function examen()
  {
    return $this->belongsTo(Examen::class);
  }


}
