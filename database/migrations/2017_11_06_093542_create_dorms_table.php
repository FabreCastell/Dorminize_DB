<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dorms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('location');
            $table->integer('building_amt');
            $table->integer('room_amt');
            $table->integer('elec_unit_cost');
            $table->integer('water_unit_cost');
            $table->text('description');
            $table->text('rule');
            $table->text('pic_dest')->nullable();
            $table->timestamps();
            $table->string('owner_ssn');

            $table->foreign('owner_ssn')->references('ssn')->on('owners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dorms');
    }
}
