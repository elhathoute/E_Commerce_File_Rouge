<?php

namespace Database\Seeders;

use App\Models\Panier;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PanierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paniers=[
            ['date' =>Carbon::now(),
            'quantity' => 2,
            'price' => 10,
            'color' => 'red',
            'size' => 43,
            'etat' => 'panier',
            'user_id' => 1,
            'product_id' => 1,],
            [
                'date' => Carbon::now(),
                'quantity' => 1,
                'price' => 20,
                'color' => 'blue',
                'size' => 42,
                'etat' => 'wishlist',
                'user_id' => 1,
                'product_id' => 1, 
            ],
            [
                'date' => Carbon::now(),
                'quantity' => 3,
                'price' => 15,
                'color' => 'green',
                'size' => 40,
                'etat' => 'order',
                'user_id' => 1,
                'product_id' => 1,
            ]
        ];
        foreach($paniers as $panier){
            Panier::create($panier);
        }
    }
}
