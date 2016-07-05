<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'pilipili_id' => 'Rem',
                'email' => 'Rem@gmail.com',
                'password' => bcrypt('Rem'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_1.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_1.jpg'),
                'role' => 'admin',
            ],
            [
                'pilipili_id' => 'Lem',
                'email' => 'Lem@gmail.com',
                'password' => bcrypt('Lem'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_2.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_2.jpg'),
                'role' => 'user',
            ],
            [
                'pilipili_id' => 'Emi',
                'email' => 'Emi@gmail.com',
                'password' => bcrypt('Emi'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_3.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_3.jpg'),
                'role' => 'user',
            ],
            [
                'pilipili_id' => 'Maki',
                'email' => 'Maki@gmail.com',
                'password' => bcrypt('Maki'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_4.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_4.jpg'),
                'role' => 'user',
            ],
            [
                'pilipili_id' => 'fzls',
                'email' => 'fzls.zju@gmail.com',
                'password' => bcrypt('fzls'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_5.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_5.jpg'),
                'role' => 'user',
            ],
            [
                'pilipili_id' => 'test1',
                'email' => 'test1@gmail.com',
                'password' => bcrypt('test1'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_2.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_2.jpg'),
                'role' => 'user',
            ],
            [
                'pilipili_id' => 'test2',
                'email' => 'test2@gmail.com',
                'password' => bcrypt('test2'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_3.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_3.jpg'),
                'role' => 'user',
            ],
            [
                'pilipili_id' => 'test3',
                'email' => 'test3@gmail.com',
                'password' => bcrypt('test3'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_4.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_4.jpg'),
                'role' => 'user',
            ],
            [
                'pilipili_id' => 'test4',
                'email' => 'test4@gmail.com',
                'password' => bcrypt('test4'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_5.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_5.jpg'),
                'role' => 'user',
            ],
            [
                'pilipili_id' => 'test5',
                'email' => 'test5@gmail.com',
                'password' => bcrypt('test5'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_2.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_2.jpg'),
                'role' => 'user',
            ],
            [
                'pilipili_id' => 'test6',
                'email' => 'test6@gmail.com',
                'password' => bcrypt('test6'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_3.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_3.jpg'),
                'role' => 'user',
            ],
            [
                'pilipili_id' => 'test7',
                'email' => 'test7@gmail.com',
                'password' => bcrypt('test7'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_4.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_4.jpg'),
                'role' => 'user',
            ],
            [
                'pilipili_id' => 'test8',
                'email' => 'test8@gmail.com',
                'password' => bcrypt('test8'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_5.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_5.jpg'),
                'role' => 'user',
            ],
            [
                'pilipili_id' => 'test9',
                'email' => 'test9@gmail.com',
                'password' => bcrypt('test9'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_2.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_2.jpg'),
                'role' => 'user',
            ],
            [
                'pilipili_id' => 'test10',
                'email' => 'test10@gmail.com',
                'password' => bcrypt('test10'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_3.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_3.jpg'),
                'role' => 'user',
            ],
            [
                'pilipili_id' => 'test11',
                'email' => 'test11@gmail.com',
                'password' => bcrypt('test11'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_4.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_4.jpg'),
                'role' => 'user',
            ],
            [
                'pilipili_id' => 'test12',
                'email' => 'test12@gmail.com',
                'password' => bcrypt('test12'),
                'avatar_filepath' => ('uploaded_img/avatar_mock_5.jpg'),
                'custom_background_image_filepath' => ('uploaded_img/detail_background_image_mock_5.jpg'),
                'role' => 'user',
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
