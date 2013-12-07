<?php
// http://culttt.com/2013/08/12/building-out-restful-controller-methods-in-laravel-4/
// Esto es un intento de controlador RESTful
class Conversacion extends BaseController
{
  public function index()
  {
    //TODO: aquí iría el id del usuario que se ha autenticado
    $usuario_id = 1;
    $conversaciones = Conversacion::where('usuario_id', '=', $usuario_id)->get();
    return View::make('conversaciones', array('conversaciones' => $conversaciones));
  }
  
  public function create()
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
    $conversacion = Conversacion::find($id)
    return $conversacion;
  }

}
