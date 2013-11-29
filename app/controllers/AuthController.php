<?php

class AuthController extends BaseController {
  
  // Attempt login de usuario
  public function doLogin()
  {
    $name = trim(Input::get('name'));
    $password = Input::get('password');
    $check_remember = Input::get('remember', false);

    $remember = true;
    if( !$check_remember )
    {
      $remember = false;
    }

    if(Auth::attempt(['name' => $name, 'password' => $password], $remember))
    {
      return Redirect::intended('/secreta');
    }
    else
    { 
      $msg = "El usuario o la clave son incorrectos";
      return Redirect::to('/login')->with('msg', $msg);
    }
  }

  public function doLogout()
  {
    Auth::logout();
    return Redirect::to('/login');
  }
}
