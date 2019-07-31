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
            ['name' => 'Фотосъемка', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Видеосъемка', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Ведущие', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Организация свадьбы', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Оформление и украшение', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Банкетные залы', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Музыка и артисты', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Свадебные торты', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Автомобили', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Свадебные платья', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Стилисты', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Обручальные кольца', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Мужские костюмы', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Свадебные букеты', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Аксессуары', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Фейерверки', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Места для фотосессий', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
            ['name' => 'Другое', 'created_at' => now(), 'cover' => 'no_category_cover.png'],
        ]);
    }
}
