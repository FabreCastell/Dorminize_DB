<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_rooms', function (Blueprint $table) {
            $table->string('client_ssn');
            $table->integer('room_id')->unsigned();

            $table->primary(['client_ssn', 'room_id']);
            $table->foreign('client_ssn')->references('ssn')->on('clients');
            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients_rooms');
    }
}
