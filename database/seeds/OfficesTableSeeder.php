<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\Office;

class OfficesTableSeeder extends Seeder {

    public function run()
    {

        Office::create([
            'number' => '1',
        ]);
        Office::create([
            'number' => '2',
        ]);
        Office::create([
            'number' => '3',
        ]);
        Office::create([
            'number' => '4',
        ]);
        Office::create([
            'number' => '5',
        ]);
    }

}