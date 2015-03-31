<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonWorkingDaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('non_working_days', function(Blueprint $table)
		{
            $table->increments('id');
            $table->date('date');
            $table->boolean('holiday');
            $table->boolean('ateneo');
            $table->string('course')->nullable();
            $table->string('note')->nullable();
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
		Schema::drop('non_working_days');
	}

}
