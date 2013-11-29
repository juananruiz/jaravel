<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMensajesTable extends Migration {

	public function up()
	{
		Schema::create('mensajes', function(Blueprint $table) {
			$table->increments('id');
			$table->varchar('text', 256);
			$table->timestamps();
			$table->integer('usuario_id')->unsigned();
			$table->integer('conversacion_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('mensajes');
	}
}
