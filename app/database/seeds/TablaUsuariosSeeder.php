<?php

class TablaUsuariosSeeder extends Seeder
{
  public function run()
  {
    $usuarios = [
                  ['name' => 'juanan' , 'password' => Hash::make('pepe')] ,
                  ['name' => 'jjmc' , 'password' => Hash::make('pepe')] ,
                  ['name' => 'mario' , 'password' => Hash::make('pepe')] ,
                  ['name' => 'vtellez' , 'password' => Hash::make('pepe')],
                ];

    DB::table('usuarios')->insert($usuarios);

    // Como se insertaría lo mismo con Eloquent
    //$usuario = new Usuario(['name' => 'Juanan', 'password' => Hash::make('pepe')],);
    //$usuario->save();
  }
}
