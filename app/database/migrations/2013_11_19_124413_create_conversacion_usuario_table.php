<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConversacionUsuarioTable extends Migration {

	public function up()
	{
		Schema::create('conversacion_usuario', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('conversacion_id')->unsigned();
			$table->integer('usuario_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('conversacion_usuario');
	}
}