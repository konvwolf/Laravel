<?php

use Illuminate\Database\Seeder;

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
                'name' => 'Велоспорт',
                'slug'  => 'velosport'
            ],
            [
                'id'    => 2,
                'name' => 'Здоровье',
                'slug'  => 'zdorovie'
            ]
        ];

        return $categories;
    }
}
