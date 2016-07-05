<?php

use App\Banner;
use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners=[
            [
                'link' => 'image/detail?image_id=8',
                'post_path'=>'uploaded_img/avatar_mock_2.jpg',
            ]
        ];
        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
