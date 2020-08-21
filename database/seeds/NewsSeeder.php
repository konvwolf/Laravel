<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->newsData());
    }

    public function newsData() {
        $news = [];
        $faker = Faker\Factory::create('ru_RU');

        for ($i = 0; $i < 5; $i++) {
            $news[] = [
                'category'      => rand(1, 2),
                'title'         => $faker->realText(rand(15, 50)),
                'text'          => $faker->realText(rand(1000, 5000)),
                'image'         => '/storage/images/test_image.jpg'
            ];
        }


        return $news;
    }
}
