<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ru_RU');

        $max_user_id = DB::table('users')->max('id');
        $max_category_id = DB::table('categories')->max('id');

        for ($i=0; $i < 20; $i++) {
            DB::table('offers')->insert([
                'title' => $faker->realText(rand(20, 50)),
                'description' => $faker->realText(rand(30, 100)),
                'category_id' => rand(1, $max_category_id),
                'user_id' => rand(1, $max_user_id),
                'created_at' => now(),
            ]);
        }
    }
}
