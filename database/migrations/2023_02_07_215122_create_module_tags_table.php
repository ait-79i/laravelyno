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
    Schema::create('module_tags', function (Blueprint $table) {

      $table->foreignId('module_id')->constrained('modules')->onUpdate('cascade')->onDelete('cascade');
      $table->foreignId('tags_id')->constrained('tags')->onUpdate('cascade')->onDelete('cascade');
      $table->primary(['module_id', 'tags_id']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('module_tags');
  }
};
