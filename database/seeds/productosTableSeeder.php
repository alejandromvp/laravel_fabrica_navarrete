<?php

use Illuminate\Database\Seeder;
use App\Models\Seccion_panel\Productos;

class productosTableSeeder extends Seeder
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
            'email' => 'ale@gmail.com',
            'url_photo_profile' => 'icon_profile.png',
            'password'=> bcrypt('1234')
        ]);
    }
}
