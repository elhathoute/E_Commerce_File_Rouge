<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors=[
            ['name' => 'red'],
            ['name' => 'green'],
            ['name' => 'black'],

        ];
        for($i=0;$i<=2;$i++){
            Color::create($colors[$i]);


        }
    }
}
