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
            $userId = rand(1, $max_user_id);
            $title = $faker->realText(rand(20, 50));
            DB::table('offers')->insert([
                'title' => $title,
                'short_descr' => $faker->realText(rand(30, 100)),
                'category_id' => rand(1, $max_category_id),
                'user_id' => $userId,
                'cover' => '/covers/no_cover.svg',
                'created_at' => now(),
            ]);
            $offerId = DB::table('offers')->max('id');
            DB::table('offer_details')->insert([
                'offer_id' => $offerId,
                'description' => $faker->realText(rand(200, 500)),
                'created_at' => now(),
            ]);
            DB::table('news')->insert([
                'news' => $title,
                'offer_id' => $offerId,
                'user_id' => $userId,
                'status' => 'new',
                'created_at' => now(),
            ]);
        }
    }
}
