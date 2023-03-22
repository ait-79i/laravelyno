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
        Schema::create('notes', function (Blueprint $table) {
            $table->foreignId('examen_id')->constrained('examens')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('stagiaire_id')->constrained('stagiaires')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['examen_id', 'stagiaire_id']);
            $table->double('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');


    }
};
