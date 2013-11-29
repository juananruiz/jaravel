<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosTable extends Migration {

	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 64);
			$table->string('password', 64);
			$table->string('avatar', 128);
		});
	}

	public function down()
	{
		Schema::drop('usuarios');
	}
}