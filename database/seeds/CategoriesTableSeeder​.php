<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder​ extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
    	// for ($i = 0; $i < 50; $i++) {
     //        DB::table('categories')->insert([ //,
     //            'name' => $faker->name,
     //    		'thumbnail' => $faker->imageUrl($width = 640, $height = 480),
     //    		'description' => $faker->text($maxNbChars = 500),
     //    		'slug' =>$faker->slug(),
     //        ]);
     //    }
        DB::table('categories')->truncate();
        Category::create([
            'name' => 'Xã hội',
            'parent_id' => '1',
            'thumbnail'=> 'img1.ipg',
            'slug' => 'aaa.com',
            'description'=> 'tintucxahoi'
        ]);
        Category::create([
            'name' => 'Giáo dục',
            'parent_id' => '2',
            'thumbnail'=> 'img2.ipg',
            'slug' => 'bbb.com',
            'description'=> 'tintucgiaoduc'
        ]);
          Category::create([
            'name' => 'Giao thông',
            'parent_id' => '3',
            'thumbnail'=> 'img3.ipg',
            'slug' => 'ddd.com',
            'description'=> 'tintucgiaothong'
        ]);
          Category::create([
            'name' => 'Chính trị',
            'parent_id' => '4',
            'thumbnail'=> 'img4.ipg',
            'slug' => 'eee.com',
            'description'=> 'tintucchinhtri'
        ]);
    }
}
