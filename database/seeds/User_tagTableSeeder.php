<?php

use App\UserTag;
use Illuminate\Database\Seeder;

class User_tagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_tags=[
            ['user_id'=>1,'tag_id'=>1],
            ['user_id'=>1,'tag_id'=>2],
            ['user_id'=>1,'tag_id'=>3],
            ['user_id'=>1,'tag_id'=>4],
            ['user_id'=>1,'tag_id'=>5],
            ['user_id'=>1,'tag_id'=>6],
            ['user_id'=>1,'tag_id'=>7],
            ['user_id'=>1,'tag_id'=>8],
            ['user_id'=>1,'tag_id'=>9],
            ['user_id'=>1,'tag_id'=>10],
            ['user_id'=>1,'tag_id'=>11],
            ['user_id'=>1,'tag_id'=>12],
        ];
        foreach ($user_tags as $user_tag) {
            UserTag::create($user_tag);
        }
    }
}
