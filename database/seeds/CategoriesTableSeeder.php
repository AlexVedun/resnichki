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
            ['name' => 'Фотосъемка', 'created_at' => now(), 'cover' => '/covers/photo.svg', 'icon' => '/covers/photo_icon.svg'],
            ['name' => 'Видеосъемка', 'created_at' => now(), 'cover' => '/covers/video.svg', 'icon' => '/covers/video_icon.svg'],
            ['name' => 'Ведущие', 'created_at' => now(), 'cover' => '/covers/toastmaster.svg', 'icon' => '/covers/toastmaster_icon.svg'],
            ['name' => 'Организация свадьбы', 'created_at' => now(), 'cover' => '/covers/wedding_organization.svg', 'icon' => '/covers/wedding_organization_icon.svg'],
            ['name' => 'Оформление и украшение', 'created_at' => now(), 'cover' => '/covers/decoration.svg', 'icon' => '/covers/decoration_icon.svg'],
            ['name' => 'Банкетные залы', 'created_at' => now(), 'cover' => '/covers/banquet_halls.svg', 'icon' => '/covers/banquet_halls_icon.svg'],
            ['name' => 'Музыка и артисты', 'created_at' => now(), 'cover' => '/covers/music.svg', 'icon' => '/covers/music_icon.svg'],
            ['name' => 'Свадебные торты', 'created_at' => now(), 'cover' => '/covers/cakes.svg', 'icon' => '/covers/cakes_icon.svg'],
            ['name' => 'Автомобили', 'created_at' => now(), 'cover' => '/covers/cars.svg', 'icon' => '/covers/cars_icon.svg'],
            ['name' => 'Свадебные платья', 'created_at' => now(), 'cover' => '/covers/dresses.svg', 'icon' => '/covers/dresses_icon.svg'],
            ['name' => 'Стилисты', 'created_at' => now(), 'cover' => '/covers/stylists.svg', 'icon' => '/covers/stylists_icon.svg'],
            ['name' => 'Обручальные кольца', 'created_at' => now(), 'cover' => '/covers/rings.svg', 'icon' => '/covers/rings_icon.svg'],
            ['name' => 'Мужские костюмы', 'created_at' => now(), 'cover' => '/covers/mens_suits.svg', 'icon' => '/covers/mens_suits_icon.svg'],
            ['name' => 'Свадебные букеты', 'created_at' => now(), 'cover' => '/covers/flowers.svg', 'icon' => '/covers/flowers_icon.svg'],
            ['name' => 'Аксессуары', 'created_at' => now(), 'cover' => '/covers/accessories.svg', 'icon' => '/covers/accessories_icon.svg'],
            ['name' => 'Фейерверки', 'created_at' => now(), 'cover' => '/covers/fireworks.svg', 'icon' => '/covers/fireworks_icon.svg'],
            ['name' => 'Места для фотосессий', 'created_at' => now(), 'cover' => '/covers/photo_places.svg', 'icon' => '/covers/photo_places_icon.svg'],
            ['name' => 'Другое', 'created_at' => now(), 'cover' => '/covers/other.svg', 'icon' => '/covers/other_icon.svg'],
        ]);
    }
}
