<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $articles = \App\Models\Article::factory(20)->create();
        $tags = \App\Models\Tag::factory(7)->create();
        $tags = \App\Models\ArticleTag::factory(7)->create();
    }
}
