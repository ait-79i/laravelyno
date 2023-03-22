<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

  public function up()
  {
    Schema::create('examens', function (Blueprint $table) {
      $table->id();
      $table->date('date_ex');
      $table->string('salle');
      $table->foreignId('module_id')->constrained('modules')
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table->foreignId('groupe_id')->constrained('groupes')
        ->onUpdate('cascade')
        ->onDelete('cascade');
    });
  }

  
  public function down()
  {
    Schema::dropIfExists('examens');
  }
};
