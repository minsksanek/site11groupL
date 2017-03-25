<?php

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $article = DB::table('articles');

        $article->truncate();

        for($i = 0; $i < 100; $i++){
            $title = $faker->sentence;

            $article->insert([
                'title' => $title,
                'slug' => str_slug($title),
                'short_description' => $faker->realText(500),
                'description' => $faker->realText(10000),
                'created_at' => $faker->dateTimeBetween(),
                'updated_at' => $faker->dateTimeBetween(),
            ]);
        }
    }
}
