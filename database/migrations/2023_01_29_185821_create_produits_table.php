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
        Schema::create('produits', function (Blueprint $table) {
            //$table->engine='InnoDB';
            $table->id();
            $table->text('nom');
            $table->string('image');
            $table->integer('quantite');
            $table->string('categorie');
            $table->integer('prix_unitaire');
            $table->string('libelle');
            $table->String('dlc');
           
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
        Schema::dropIfExists('produits');
    }
};
