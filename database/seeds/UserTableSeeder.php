<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        User::create([

            'username' => 'admin',
            'password' => Hash::make('456'),
            'email' => 'admin@gmail.com',
            'rol' => 'admin',
            'first_name' => 'Jhon Doe',
            'country' => 'Argentina',
            'city' => 'CABA',
            'gender' => 'Masculino',
        ]);
    }

}