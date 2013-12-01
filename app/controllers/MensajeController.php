<?php

class MensajeController extends BaseController 
{
	public function listar($conversacion_id = 1)
  {
    $conversacion = Conversacion::find($conversacion_id);
    $mensajes = Mensaje::where('conversacion_id','=',$conversacion_id)->get();
    return View::make('mensajes', array('mensajes' => $mensajes, 'conversacion' => $conversacion));
  }

	public function enviar()
  {
    $mensaje = Mensaje::create(Input::all());
        
    if ($mensaje['error'] == true)
    {
      return "Error";
    }
    else
    {
      return $mensaje;
    }
  }
}
