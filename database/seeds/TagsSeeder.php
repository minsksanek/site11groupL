<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagList = [
            ['title' => 'Спорт', 'slug' => str_slug('Спорт')],
            ['title' => 'Политика', 'slug' => str_slug('Политика')],
            ['title' => 'Культура', 'slug' => str_slug('Культура')],
            ['title' => 'Призидент', 'slug' => str_slug('Призидент')],
            ['title' => 'Финансы', 'slug' => str_slug('Финансы')],
        ];
        
        $tagsTable = DB::table('tags');
        $tagsTable->truncate();
        $tagsTable->insert($tagList);
    }
}
