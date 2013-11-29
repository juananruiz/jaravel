<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('mensajes', function(Blueprint $table) {
			$table->foreign('usuario_id')->references('id')->on('usuarios')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('mensajes', function(Blueprint $table) {
			$table->foreign('conversacion_id')->references('id')->on('conversaciones')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('conversacion_usuario', function(Blueprint $table) {
			$table->foreign('conversacion_id')->references('id')->on('conversaciones')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('conversacion_usuario', function(Blueprint $table) {
			$table->foreign('usuario_id')->references('id')->on('usuarios')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('mensajes', function(Blueprint $table) {
			$table->dropForeign('mensajes_usuario_id_foreign');
		});
		Schema::table('mensajes', function(Blueprint $table) {
			$table->dropForeign('mensajes_conversacion_id_foreign');
		});
		Schema::table('conversacion_usuario', function(Blueprint $table) {
			$table->dropForeign('conversacion_usuario_conversacion_id_foreign');
		});
		Schema::table('conversacion_usuario', function(Blueprint $table) {
			$table->dropForeign('conversacion_usuario_usuario_id_foreign');
		});
	}
}