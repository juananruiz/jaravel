<?php

class Usuario extends Eloquent {

	protected $table = 'usuarios';
	public $timestamps = false;
	protected $softDelete = false;
  protected $guarded = array('id', 'password');

	public function mensajes()
	{
		return $this->hasMany('Mensaje');
	}

	public function conversaciones()
	{
		return $this->belongsToMany('Conversacion');
	}

}
