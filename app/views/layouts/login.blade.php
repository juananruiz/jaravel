@extends('layouts.base')

@section('contenido')

  <div class="container">
    <div class="row">
      <div class="main">

        @if(Session::get('msg'))
          <div class="alert alert-danger">{{ Session::get('msg') }}</div>
        @endif

        <h3>Inicia sesión, o <a href="#">crea una cuenta</a></h3>

        <form role="form" action="{{url('/login')}}" method="post">
          <div class="form-group">
            <label for="name">Usuario</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <a class="pull-right" href="#">He olvidado la clave :( </a>
            <label for="password">Clave</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="checkbox pull-right">
            <label>
              <input type="checkbox">
              Recuérdame </label>
          </div>
          <button type="submit" class="btn btn btn-primary">
            Iniciar sesión
          </button>
        </form>
      
      </div>
    </div>
  </div>

@stop
