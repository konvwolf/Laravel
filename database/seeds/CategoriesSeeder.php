<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->categoriesData());
    }

    public function categoriesData() {
        $categories = [
            [
                'id'    => 1,
                'name'  => 'Велоспорт',
                'slug'  => Str::slug('Велоспорт')
            ],
            [
                'id'    => 2,
                'name'  => 'Здоровье',
                'slug'  => Str::slug('Здоровье')
            ],
            [
                'id'    => 3,
                'name'  => 'Бег и прыг',
                'slug'  => Str::slug('Бег и прыг')
            ]
        ];

        return $categories;
    }
}
