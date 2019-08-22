<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Фотосъемка', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Видеосъемка', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Ведущие', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Организация свадьбы', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Оформление и украшение', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Банкетные залы', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Музыка и артисты', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Свадебные торты', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Автомобили', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Свадебные платья', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Стилисты', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Обручальные кольца', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Мужские костюмы', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Свадебные букеты', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Аксессуары', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Фейерверки', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Места для фотосессий', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
            ['name' => 'Другое', 'created_at' => now(), 'cover' => '/covers/no_cover.svg'],
        ]);
    }
}
