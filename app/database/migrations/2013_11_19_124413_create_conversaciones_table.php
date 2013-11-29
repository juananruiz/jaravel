<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConversacionesTable extends Migration {

	public function up()
	{
		Schema::create('conversaciones', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 64)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('conversaciones');
	}
}