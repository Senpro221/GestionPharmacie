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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_medoc');
            $table->unsignedBigInteger('id_commande');
            $table->integer('quantite');
            $table->timestamps();
            $table->foreign('id_medoc')->references('id')->on('medicaments');
            $table->foreign('id_commande')->references('id')->on('commandes');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
