<?php

use App\Image;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(Image_categoriesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(AdsTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(Click_image_eventTableSeeder::class);
        $this->call(Rate_image_eventsTableSeeder::class);
        $this->call(FollowsTableSeeder::class);
        $this->call(Image_tagTableSeeder::class);
        $this->call(User_tagTableSeeder::class);
    }
}
