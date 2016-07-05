<?php

use App\ImageCategory;
use Illuminate\Database\Seeder;

class Image_categoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name'=>'Original'],
            ['name'=>'Illustrations'],
            ['name'=>'Manga'],
            ['name'=>'Ugoira'],
        ];
        foreach ($categories as $category) {
            ImageCategory::create($category);
        }
    }
}
