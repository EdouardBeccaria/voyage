<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapes', function (Blueprint $table) {
            $table->id();
            $table->integer('voyage_id');
            $table->string('type');
            $table->string('transport_number');
            $table->string('departure');
            $table->string('arrival');
            $table->string('seat')->nullable();
            $table->string('gate')->nullable();
            $table->string('baggage_drop')->nullable();
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
        Schema::dropIfExists('etapes');
    }
}
