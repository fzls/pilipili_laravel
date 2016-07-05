<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pilipili_id')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nickname');
            $table->enum('gender',['female','male']);
            $table->boolean('gender_visibility');
            $table->date('birth');
            $table->boolean('birth_visibility');
            $table->string('occupation');
            $table->boolean('occupation_visibility');
            $table->string('country');
            $table->boolean('country_visibility');
            $table->string('city');
            $table->boolean('city_visibility');
            $table->integer('level');
            $table->enum('role',['admin','user']);
            $table->boolean('is_premium_member');
            $table->dateTime('premium_member_end_time');
            $table->longText('self_description');
            $table->string('avatar_filepath');
            $table->string('custom_background_image_filepath');
            $table->enum('prefered_language',['en','zh','jp']);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
