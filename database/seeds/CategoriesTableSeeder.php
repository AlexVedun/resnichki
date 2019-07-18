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
            ['name' => 'Фотосъемка', 'created_at' => now()],
            ['name' => 'Видеосъемка', 'created_at' => now()],
            ['name' => 'Ведущие', 'created_at' => now()],
            ['name' => 'Организация свадьбы', 'created_at' => now()],
            ['name' => 'Оформление и украшение', 'created_at' => now()],
            ['name' => 'Банкетные залы', 'created_at' => now()],
            ['name' => 'Музыка и артисты', 'created_at' => now()],
            ['name' => 'Свадебные торты', 'created_at' => now()],
            ['name' => 'Автомобили', 'created_at' => now()],
            ['name' => 'Свадебные платья', 'created_at' => now()],
            ['name' => 'Стилисты', 'created_at' => now()],
            ['name' => 'Обручальные кольца', 'created_at' => now()],
            ['name' => 'Мужские костюмы', 'created_at' => now()],
            ['name' => 'Свадебные букеты', 'created_at' => now()],
            ['name' => 'Аксессуары', 'created_at' => now()],
            ['name' => 'Фейерверки', 'created_at' => now()],
            ['name' => 'Места для фотосессий', 'created_at' => now()],
            ['name' => 'Другое', 'created_at' => now()],
        ]);
    }
}
