<?php

namespace Database\Seeders;

use App\Models\Brande;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandes=[
            ['name' => 'guess','image'=>'guess.jpg'],
            ['name' => 'Adidas','image'=>'adidas.jpg'],
            ['name' => 'Puma','image'=>'puma.jpg'],
            ['name' => 'Reebok' ,'image'=>'reebok.jpg'],

        ];
        for($i=0;$i<=4;$i++){
            Brande::create($brandes[$i]);


        }
    }
}
