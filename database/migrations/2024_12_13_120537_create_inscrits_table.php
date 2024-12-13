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
        Schema::create('inscrits', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('libelle');
            $table->integer('num', false);
            $table->integer('id_annee', false);
            $table->integer('fgactif', false);
            $table->datetime('datedebut');
            $table->datetime('datefin');
            $table->integer('fg_traite', false);
            $table->integer('fg_complement', false);
            $table->integer('fg_resultat', false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inscrits');
    }
};
