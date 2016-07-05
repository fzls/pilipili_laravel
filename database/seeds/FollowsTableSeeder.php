<?php

use App\Follow;
use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $follows=[
            ['follower_id'=>1,'followee_id'=>2],
            ['follower_id'=>1,'followee_id'=>3],
            ['follower_id'=>1,'followee_id'=>4],
            ['follower_id'=>1,'followee_id'=>5],
            ['follower_id'=>2,'followee_id'=>3],
            ['follower_id'=>2,'followee_id'=>4],
            ['follower_id'=>2,'followee_id'=>5],
            ['follower_id'=>3,'followee_id'=>4],
            ['follower_id'=>3,'followee_id'=>5],
            ['follower_id'=>4,'followee_id'=>5],
        ];
        foreach ($follows as $follow) {
            Follow::create($follow);
        }
    }
}
