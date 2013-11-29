@extends('layouts.base')

@section('contenido')

  <h2>{{ trans('lara.hello', array('name' => '$Usuario->nombre' )) }}</h2>
  <h3>Esta parte es secreta</h3>

@stop
