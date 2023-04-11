<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        // truncate() method to clear out any existing data
        // DB::table('categories')->truncate();
        // DB::table('sub_categories')->truncate();
        // DB::table('category_sub_category')->truncate();

            // seed category
            $categories=[
            ['name'=>'Men'],
            ['name'=>'Women'],
            ['name'=>'Children']
            ];
        // seed subcategory
        $subCategories = [
            ['name' => 'Baskets', 'image' => ''],
            ['name' => 'Bottines', 'image' => ''],
            ['name' => 'Sandales', 'image' => ''],
            ['name' => 'Escarpins', 'image' => ''],
            ['name' => 'Ballerines', 'image' => '']
        ];
        // sizes
        $sizes=[
            ['size'=>40],
            ['size'=>41],
            ['size'=>42],
            ['size'=>43],
        ];
        for($i=0;$i<=3;$i++){
        Size::create($sizes[$i]);
        }

            for($i=0;$i<=2;$i++){
                $category=Category::create($categories[$i]);

            }

        foreach ($subCategories as $subCat) {
               //seed category

            $subCategory=SubCategory::create($subCat);

            // associate the subCategory with category
        $category->subCategories()->attach($subCategory->id);
        }


        // seed user
        User::create([
            'name'=>'azize',
            'email'=>'azize@gmail.com',
            'password'=>bcrypt('Azize@1998'),
            'password_verify'=>bcrypt('Azize@1998'),
            'role'=>'admin'
        ]);


    }
}
