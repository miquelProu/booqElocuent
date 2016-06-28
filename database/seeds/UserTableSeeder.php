<?php

/**
 * Agregamos un usuario nuevo a la base de datos.
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {
	public function run(){
//		User::create(array(
//			'username'  => 'admin',
//			'email'     => 'admin@admin.com',
//			'name'=> 'Administrator',
//			'password' => Hash::make('admin') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
//		));

		DB::table('users')->insert(array(
			'username'  => 'admin',
			'email'     => 'admin@admin.com',
			'name'=> 'Administrator',
			'password' => Hash::make('admin') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
		));
	}
}