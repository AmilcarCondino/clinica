<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('turns', function(Blueprint $table) {

            $table->increments('id');
            $table->dateTime('appointment');
            $table->integer('turn');
            $table->integer('patient_id')->unsigned();
            $table->integer('office_id')->unsigned();
            $table->integer('therapist_id')->unsigned();
            $table->integer('observer_id')->unsigned();
            $table->timestamps();

            $table->foreign('patient_id')
                ->references('id')
                ->on('patients');

            $table->foreign('office_id')
                ->references('id')
                ->on('offices');

            $table->foreign('therapist_id')
                ->references('id')
                ->on('therapists');

            $table->foreign('observer_id')
                ->references('id')
                ->on('therapists');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
