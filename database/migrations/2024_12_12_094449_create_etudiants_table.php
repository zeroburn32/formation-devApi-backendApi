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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code_foner');
            $table->integer('nbaide', false);
            $table->integer('nbpret', false);
            $table->string('telephone');
            $table->string('nom');
            $table->string('prenoms');
            $table->string('sexe');
            $table->date('datenais');
            $table->string('numeropiece');
            $table->string('email');
            $table->string('ine');
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
        Schema::drop('etudiants');
    }
};
