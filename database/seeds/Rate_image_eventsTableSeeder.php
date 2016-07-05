<?php

use App\RateImageEvent;
use Illuminate\Database\Seeder;

class Rate_image_eventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RateImageEvent::create(['user_id'=>1,'image_id'=>1,'score'=>9]);
    }
}
