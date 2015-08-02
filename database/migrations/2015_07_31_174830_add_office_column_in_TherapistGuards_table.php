<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOfficeColumnInTherapistGuardsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('therapist_guards', function(Blueprint $table) {

            $table->integer('office')->unsigned();

            $table->foreign('office')
                ->references('number')
                ->on('offices');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('therapist_guards', function(Blueprint $table) {

        });
    }

}
