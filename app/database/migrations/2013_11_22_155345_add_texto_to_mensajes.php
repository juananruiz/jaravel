<?php

use Illuminate\Database\Migrations\Migration;

class AddTextoToMensajes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Agregando el campo 'texto' a los mensajes
    Schema::table('mensajes', function($table)
 		{
 			$table->string('texto',256);
 		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Quitando el campo
    Schema::table('mensajes', function($table)
 		{
 			$table->dropColumn('texto');
 		});
	}

}
