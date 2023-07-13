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
        Schema::create('actecrimes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('typeacte_id');
            $table->foreign('typeacte_id')->references('id')->on('typeactes');
            $table->text('commentaire')->nullable();
            $table->string('lieu');
            $table->string('region');
            $table->date('date');
            $table->time('heure');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
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
        Schema::dropIfExists('actecrimes');
    }
};
