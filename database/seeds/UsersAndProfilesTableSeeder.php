<?php

use Illuminate\Database\Seeder;

class UsersAndProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Profile::class)->times(25)->create();
    }
}
