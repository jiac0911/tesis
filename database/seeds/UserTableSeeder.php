<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$role_user = Role::where('nombre', 'user')->first();
		$role_admin = Role::where('nombre', 'admin')->first();
		$user = new User();
		$user->name = 'User';
		$user->email = 'user@example.com';
		$user->password = bcrypt('secret');
		$user->save();
		$user->roles()->attach($role_user);
		$user = new User();
		$user->name = 'Admin';
		$user->email = 'admin@example.com';
		$user->password = bcrypt('secret');
		$user->save();
		$user->roles()->attach($role_admin);
	}
}
