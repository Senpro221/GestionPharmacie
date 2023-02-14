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
        Schema::create('stocks', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id();
            $table->integer('quantiteStock');
            $table->integer('quantiteMinim');
            $table->unsignedBigInteger('id_pharma');
            $table->unsignedBigInteger('id_medoc');
            $table->timestamps();
            $table->foreign('id_pharma')->references('id')->on('pharmacies');
            $table->foreign('id_medoc')->references('id')->on('medicaments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
};
