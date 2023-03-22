<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('stagiaires', function (Blueprint $table) {
      $table->id();
      $table->string('nom');
      $table->string('prenom');
      $table->date('dateNaissance');
      $table->string('genre');
      $table->string('addresse');
      $table->string('tel');
      $table->foreignId('groupe_id')->constrained('groupes')
        ->onDelete('restrict')
        ->onUpdate('restrict');
      $table->foreignId('user_id')->constrained('users')
        ->onUpdate('cascade')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('stagiaires');
  }
};
