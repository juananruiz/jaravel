<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::model('usuario', 'Usuario');
Route::model('conversacion', 'Conversacion');

Route::get('/borrar/{conversacion}', 'ConversacionController@borrar');
Route::post('/borrar', 'ConversacionController@gestionaBorrado');

Route::get('/', function()
{
	return View::make('layouts.base');
});

Route::get('/usuarios', function()
{
	return View::make('usuarios');
});

Route::get('/lahora', function()
{
  $dt = Carbon::now();
  setlocale(LC_TIME, 'es_ES');
  return $dt->formatlocalized('%A %d %B %Y');
});

Route::get('/secreta',  array('before' => 'auth', function() 
{
	return View::make('layouts.secreta');
}));

Route::get('/login', function()
{
  return View::make('layouts.login');
});

Route::post('/login', 'AuthController@doLogin');

Route::get('users', function()
{ 
  return View::make('users');
});

Route::get('/ws/user', function()
{
  return  Response::json(Usuario::All());
});

Route::get('/mensajes', 'MensajeController@listar');

Route::post('/mensaje_enviar', 'MensajeController@enviar');

Route::get('/libros/{genero}', function($genero)
{
     return "Libros en la categoría {$genero}.";
});
