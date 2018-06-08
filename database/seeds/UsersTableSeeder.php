<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name'  => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);
        
     //    $faker = Faker\Factory::create();
    	// for ($i = 0; $i < 50; $i++) {
     //        DB::table('users')->insert([ //,
     //            'name' => $faker->name,
     //            'email' => $faker->unique()->email,
     //            'password' => Hash::make('123456')
     //        ]);
     //    }
    }
}
