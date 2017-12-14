<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('number');
            $table->string('status');
            $table->dateTime('checkin_date');
            $table->timestamps();

            $table->integer('type_id')->unsigned();
            $table->integer('dorm_id')->unsigned();

            $table->foreign('type_id')->references('id')->on('room_types');
            $table->foreign('dorm_id')->references('id')->on('dorms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
