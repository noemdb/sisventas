<?php

use Illuminate\Database\Seeder;
//use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUsersTableSeeder::class);
        $this->call(UsersAndProfilesTableSeeder::class);
    }
}
