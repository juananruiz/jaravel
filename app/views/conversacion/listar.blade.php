@extends('layouts.base')

@section('contenido')
  <ul>
  @foreach ($conversaciones as $conversacion)
    <li>{{$conversacion->name}}</li>
  @endforeach
  </ul>
@stop
