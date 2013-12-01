@extends('layouts.base')

@section('contenido')

  <div class="container"> 
    <div class="row"> 
      <div class="col-md-5"> 
        <div class="panel panel-primary"> 
          <div class="panel-heading"> 
            <span class="glyphicon glyphicon-comment"></span> {{ $conversacion->name }} <span class="contador">{{$mensajes->count()}}</span>
            <div class="btn-group pull-right"> 
              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown"> 
              <span class="glyphicon glyphicon-chevron-down"></span> 
              </button> 
              <ul class="dropdown-menu slidedown"> 
                <li><a href="#"><span class="glyphicon glyphicon-refresh"> </span>Recargar</a></li>  
                <li><a href="#"><span class="glyphicon glyphicon-ok-sign"> </span>Disponible</a></li> 
                <li><a href="#"><span class="glyphicon glyphicon-remove"> </span>Ocupado</a></li> 
                <li><a href="#"><span class="glyphicon glyphicon-time"></span>He salido</a></li> 
                <li class="divider"></li> 
                <li><a href="/logout"><span class="glyphicon glyphicon-off"></span> Salir</a> </li> 
              </ul> 
            </div> 
          </div> 
          <div class="panel-body"> 
            @if ($mensajes->isEmpty())
              <h3>No hay mensajes</h3>
            @else
              <ul class="chat"> 
                @foreach($mensajes as $mensaje)
                  <!-- == Auth::user()->id) -->
                  @if ($mensaje->usuario->id == 1)
                    <li class="right clearfix">
                      <span class="chat-img pull-right"> <img src="uploads/avatar/{{$mensaje->usuario->name}}.png" alt="User Avatar" class="img-circle" /> </span> 
                      <div class="chat-body clearfix"> 
                        <div class="header"> 
                          <small class=" text-muted">
                            <span class="glyphicon glyphicon-time"></span>
                            <?php echo Carbon::createFromTimeStamp(strtotime($mensaje->created_at))->diffForHumans() ?>
                          </small> 
                          <strong class="pull-right primary-font" style="margin-left:10px;">{{$mensaje->usuario->name}}</strong> 
                        </div> 
                        <p style="margin-right:60px;"> {{$mensaje->texto}} </p> </div> 
                    </li>
                  @else
                    <li class="left clearfix">
                      <span class="chat-img pull-left"> <img src="uploads/avatar/{{$mensaje->usuario->name}}.png" alt="User Avatar" class="img-circle" /> </span> 
                      <div class="chat-body clearfix"> 
                        <div class="header">
                          <strong class="primary-font" style="margin-left:10px;"> {{$mensaje->usuario->name}} </strong> 
                          <small class="pull-right text-muted"> 
                            <span class="glyphicon glyphicon-time"></span>
                            <?php echo Carbon::createFromTimeStamp(strtotime($mensaje->created_at))->diffForHumans() ?>
                          </small> 
                        </div> 
                        <p style="margin-left:60px;"> {{ $mensaje->texto }} </p> 
                      </div> 
                    </li> 
                  @endif
                @endforeach 
              </ul>
            @endif
          </div> 

          <div class="panel-footer"> 

            <div class="input-group"> 
              <input type="hidden" id="conversacion_id" value="{{ $conversacion->id }}">
              <input id="btn-input" type="text" class="form-control input-sm" placeholder="Escribe un mensaje..." /> 
              <span class="input-group-btn"> 
                <button class="btn btn-warning btn-sm" id="btn-chat"><span class="glyphicon glyphicon-envelope"></span> Enviar</button> 
              </span> 
            </div> 
          </div> 
        </div> 
      </div> 
    </div> 
  </div>

  <script>
    $("#btn-chat").on('click', function(e){
      var mensaje = $('#btn-input').val();
      var usuario_id = 1;
      var conversacion_id = $('#conversacion_id').val();
      if (mensaje != "")
      {
          // Envía mensaje al servidor mediante ajax
        $.ajax(
        {
          type: 'POST',
          url: 'mensaje_enviar',
          data: { 
            'texto': mensaje,
            'usuario_id': usuario_id,
            'conversacion_id': conversacion_id,
          },
          beforeSend : function (data) {
          },
          success: function(data) 
          {  
            //Procesar la respuesta
            console.log(data);
            $('#btn-input').val('');

          },                    
          error: function (xhr, ajaxOptions, thrownError) {
           console.log(xhr.status);
           console.log(thrownError);
          }
        });    
      }
    });
  </script>

@stop
