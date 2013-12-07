<?php

class Conversacion extends Eloquent {

	protected $table = 'conversaciones';
	public $timestamps = true;
	protected $softDelete = true;

	public function usuarios()
	{
		return $this->belongsToMany('Usuario');
	}

	public function mensajes()
	{
		return $this->hasMany('Mensaje');
	}

}
