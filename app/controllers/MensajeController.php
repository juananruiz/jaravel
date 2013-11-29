<?php

class MensajeController extends BaseController 
{

	public function listar()
  {
    $mensajes = Mensaje::all();
    return View::make('mensajes', compact('mensajes'));
  }

	public function enviar()
  {
    $respuesta = Mensaje::agregarVendedor(Input::all());
        
    if ($respuesta['error'] == true)
    {
      return "Falla";
    }
  }
}

