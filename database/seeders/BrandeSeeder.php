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
            ['name' => 'Nike','product_id'=>1],
            ['name' => 'Adidas','product_id'=>1],
            ['name' => 'Puma','product_id'=>1],
            ['name' => 'Reebok','product_id'=>1],
            ['name' => 'New Balance','product_id'=>1]
        ];
        for($i=0;$i<=4;$i++){
            Brande::create($brandes[$i]);


        }
    }
}
