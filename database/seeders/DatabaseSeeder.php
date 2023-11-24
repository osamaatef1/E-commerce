<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $categories = [
          [
          'id'=>1,
          'name'=>'Camera',
          'description'=>'Digital Cameras',
        'imagepath'=>'assets/img/products/camera.jpeg'

      ],[ 'id'=>2,
          'name'=>'Makeup',
          'description'=>'Makeup ,foundation,etc ',
              'imagepath'=>'assets/img/products/makeup.jpeg'

          ],[
          'id'=>3,
          'name'=>'Shoes',
          'description'=>'Zara , LV , Guess',
              'imagepath'=>'assets/img/products/shoes.jpeg'

      ],[
          'id'=>4,
          'name'=>'Watch',
          'description'=>'Digital Watches',
              'imagepath'=>'assets/img/products/shoes.jpeg'


      ],
          [
              'id'=>5,
              'name'=>'Electronic',
              'description'=>'Digital ',
              'imagepath'=>'assets/img/products/mobile.png'


          ],
      ];
        DB::table('categories')->insert($categories);

        for ($i = 1 ; $i<=10 ; $i++){
            Product::create([
                'name'=>'product ' .$i,
                'description'=>'this is product num'.$i,
                'price'=>rand(10,100),
                'quantity'=>rand(100,200),
                'cat_id'=>rand(1,4)

            ]);
        }


    }
}
