<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pacientes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni')->unique()->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('domicilio')->nullable();
            $table->date('nacimiento')->nullable();
            $table->string('enviado')->nullable();
            $table->boolean('jubilado');
            $table->boolean('estudiante');
            $table->string('ocupacion');
            $table->boolean('aten_masc');
            $table->boolean('aten_fem');
            $table->boolean('aten_pb');
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
		Schema::drop('pacientes');
	}

}
