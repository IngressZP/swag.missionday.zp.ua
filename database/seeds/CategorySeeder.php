<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('products')->truncate();
        DB::table('categories')->truncate();
        Schema::enableForeignKeyConstraints();

        Category::create([
            'slug' => str_slug('Одежда'),
            'uk' => [
                'title' => 'Одяг'
            ],
            'en' => [
                'title' => 'Clothes'
            ],
            'ru' => [
                'title' => 'Одежда'
            ],
        ]);

        Category::create([
            'slug' => str_slug('Наклейки'),
            'uk' => [
                'title' => 'Наліпки'
            ],
            'en' => [
                'title' => 'Stickers'
            ],
            'ru' => [
                'title' => 'Наклейки'
            ],
        ]);

        Category::create([
            'slug' => str_slug('Аксессуары'),
            'uk' => [
                'title' => 'Аксесуари'
            ],
            'en' => [
                'title' => 'Accessories'
            ],
            'ru' => [
                'title' => 'Аксессуары'
            ],
        ]);

        Category::create([
            'slug' => str_slug('Хрупкое'),
            'uk' => [
                'title' => 'Крихке'
            ],
            'en' => [
                'title' => 'Clothes'
            ],
            'ru' => [
                'title' => 'Хрупкое'
            ],
        ]);

        Category::create([
            'slug' => str_slug('Биокарты'),
            'uk' => [
                'title' => 'Біокартки'
            ],
            'en' => [
                'title' => 'Biocards'
            ],
            'ru' => [
                'title' => 'Биокарты'
            ],
        ]);
    }
}
