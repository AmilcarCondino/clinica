<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTherapistGuardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('therapist_guards', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('therapist_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('turn');
            $table->timestamps();

            $table->foreign('therapist_id')
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
		Schema::drop('therapist_guards');
	}

}
