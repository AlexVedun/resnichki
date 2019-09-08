<?php

use Illuminate\Database\Seeder;

class ProfCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prof_categories')->insert([
            ['category' => 'Не выбрано', 'created_at' => now()],
            ['category' => 'Начинающий', 'created_at' => now()],
            ['category' => 'Проффи', 'created_at' => now()],
            ['category' => 'ТОП', 'created_at' => now()],
        ]);
    }
}
