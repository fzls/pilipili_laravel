<?php

use App\ClickImageEvent;
use Illuminate\Database\Seeder;

class Click_image_eventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClickImageEvent::create(['user_id'=>1,'image_id'=>1]);
    }
}
