@extends('layouts.base')

@section('contenido')
  <ul>
  @foreach ($conversaciones as $conversacion)
    <li>{{$conversacion}}</li>
  @endforeach
  </ul>
@stop
