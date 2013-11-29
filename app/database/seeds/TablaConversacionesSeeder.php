<?php

class TablaConversacionesSeeder extends Seeder
{
  public function run()
  {
    $conversaciones = [
                        ['name' => 'La primera'],
                        ['name' => 'La segunda'],
                        ['name' => 'De profundis'],
                      ];

    DB::table('conversaciones')->insert($conversaciones);

  }
}


