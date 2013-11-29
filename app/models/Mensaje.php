<?php

class Mensaje extends Eloquent {

	protected $table = 'mensajes';
	public $timestamps = true;
	protected $softDelete = false;
  protected $guarded = array('id');

	public function usuario()
	{
		return $this->belongsTo('Usuario');
	}

	public function conversacion()
	{
		return $this->belongsTo('Conversacion');
	}

}
