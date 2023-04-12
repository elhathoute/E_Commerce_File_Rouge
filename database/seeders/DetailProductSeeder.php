<?php

namespace Database\Seeders;

use App\Models\DetailProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailProduct::create([
            'semelle_int'=>'Textile',
            'semelle_ext'=>'Caoutchouc',
            'doubleure'=>'Textile',
            'tige'=>'Cuir/textile',
            'product_id'=>1
        ]);
    }
}
