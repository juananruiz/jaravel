<?php
// http://culttt.com/2013/08/12/building-out-restful-controller-methods-in-laravel-4/
// Esto es un intento de controlador RESTful
class ConversacionController extends BaseController
{
  public function listar()
  {
    $conversaciones = Conversacion::All();
    return View::make('conversacion.listar', array('conversaciones' => $conversaciones));
  }
  
  public function crear()
  {
    // muestra el formulario para crear una nueva conversacion
    return View::make('conversacion.crear');
  }

  public function store()
  {
    // gestiona el formulario de creación
    $conversacion = Conversacion::create(Input::all());
    return $conversacion;
  }

  public function show($id)
  {
    $conversacion = Conversacion::find($id);
    return $conversacion;
  }

}
