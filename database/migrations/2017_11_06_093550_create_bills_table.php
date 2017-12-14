<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('invoice_number');
            $table->float('elec_unit',8,2);
            $table->float('water_unit',8,2);
            $table->date('date');
            $table->string('status');
            $table->string('client_ssn');
            $table->integer('room_id')->unsigned();
            $table->integer('dorm_id')->unsigned();

            $table->foreign('client_ssn')->references('ssn')->on('clients');
            $table->foreign('room_id')->references('id')->on('rooms');
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
        Schema::dropIfExists('bills');
    }
}
