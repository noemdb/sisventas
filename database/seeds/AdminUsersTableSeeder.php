<?php

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       	static $password;
       	$id = DB::table('users')->insertGetId([
            'username' => "admin",
        	'email' => "admin@admin.com",
        	'password' => $password ?: $password = bcrypt('admin'),
        	'is_active' => "Activo",
        	'remember_token' => str_random(10),
        ]);

        DB::table('profiles')->insert([
	        'firstname' => "Administrador",
	        'lastname' => "del Sistema",
	        'url_img' => "img/admin.png",
	        'is_admin' => "Administrador",
	        'is_user1' => "1",
	        'is_user2' => "2",
	        'is_user3' => "3",
	        'user_id' => $id,
        ]);
    }
}
