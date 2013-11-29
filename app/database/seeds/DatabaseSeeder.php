<?php

class DatabaseSeeder extends Seeder 
{
	public function run()
	{
		Eloquent::unguard();
    $this->call('TablaUsuariosSeeder');
    $this->command->info('Tabla usuarios poblada');
    $this->call('TablaConversacionesSeeder');
    $this->command->info('Tabla conversaciones poblada');
    $this->call('TablaMensajesSeeder');
    $this->command->info('Tabla mensajes poblada');
	}
}
