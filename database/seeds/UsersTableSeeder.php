<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'alejandro',
            'email' => 'alejandro@gmail.com',
            'url_photo_profile' => 'icon_profile.png',
            'password'=> bcrypt('1234')
        ]);
    }
}
