<?php

class TablaMensajesSeeder extends Seeder
{
  public function run()
  {
    $mensajes = [
                  ['usuario_id' => 1, 'conversacion_id' => 1, 'texto' => 'Hola mundo soy laraveliense'],
                  ['usuario_id' => 2, 'conversacion_id' => 1, 'texto' => 'Me parece estupendo, tienes que llevarlo con orgullo a pesar del que dirán'],
                  ['usuario_id' => 1, 'conversacion_id' => 1, 'texto' => 'Gracias por entenderlo'],
                ];

    DB::table('mensajes')->insert($mensajes);

  }
}

