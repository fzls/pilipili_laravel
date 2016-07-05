<?php

use App\Ad;
use Illuminate\Database\Seeder;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ads=[
            [
                'link' => 'image/detail?image_id=4',
                'post_path'=>'uploaded_img/4.jpg',
            ]
        ];
        foreach ($ads as $ad) {
            Ad::create($ad);
        }
    }
}
