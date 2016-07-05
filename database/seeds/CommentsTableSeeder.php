<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            [
                'user_id'=>5,
                'image_id'=>1,
                'content'=>'<b>ADD COMMENT entity AND FUNCTION</b>',
            ],
            [
                'user_id'=>4,
                'image_id'=>1,
                'content'=>'<b>lz你怎么还没做完</b>',
            ],
            [
                'user_id'=>3,
                'image_id'=>1,
                'content'=>'喵喵喵喵喵',
            ],
            [
                'user_id'=>2,
                'image_id'=>1,
                'content'=>'好喜欢上色(｡･ω･｡)ﾉ♡',
            ],
            [
                'user_id'=>1,
                'image_id'=>1,
                'content'=>'好喜欢上色(｡･ω･｡)ﾉ♡(个头啦)',
            ],
        ];
        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }
}
