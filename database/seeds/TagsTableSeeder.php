<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags=[
            ['name'=>'Kawai'],
            ['name'=>'Bi - Pool団'],
            ['name'=>'VOCALOID'],
            ['name'=>'miku'],
            ['name'=>'Meow~'],
            ['name'=>'pixivファンタジアFK'],
            ['name'=>'pixivファンタジアNW'],
            ['name'=>'pixivファンタジアSR'],
            ['name'=>'初音ミク'],
            ['name'=>'インダルジェンス_ティーパーティー'],
            ['name'=>'クリック推奨'],
            ['name'=>'ふつくしい'],
            ['name'=>'オリジナル'],
        ];
        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
