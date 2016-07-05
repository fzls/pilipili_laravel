<?php

use App\ImageTag;
use Illuminate\Database\Seeder;

class Image_tagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image_tags=[
            ['image_id'=>1,'tag_id'=>1],
            ['image_id'=>1,'tag_id'=>2],
            ['image_id'=>1,'tag_id'=>3],
            ['image_id'=>1,'tag_id'=>4],
            ['image_id'=>1,'tag_id'=>5],
            ['image_id'=>1,'tag_id'=>6],
            ['image_id'=>1,'tag_id'=>7],
            ['image_id'=>1,'tag_id'=>8],
            ['image_id'=>1,'tag_id'=>9],
            ['image_id'=>1,'tag_id'=>10],
            ['image_id'=>1,'tag_id'=>11],
            ['image_id'=>1,'tag_id'=>12],
            ['image_id'=>2,'tag_id'=>1],
            ['image_id'=>2,'tag_id'=>2],
            ['image_id'=>2,'tag_id'=>3],
        ];
        foreach ($image_tags as $image_tag) {
            ImageTag::create($image_tag);
        }
    }
}
