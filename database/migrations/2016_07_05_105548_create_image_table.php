<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('filepath');
            $table->double('filesize');
            $table->string('filename');
            $table->string('filetype');
            $table->integer('ratings');
            $table->integer('views');
            $table->integer('author_id');
            $table->integer('total_score');
            $table->integer('resolution_height');
            $table->integer('resolution_width');
            $table->integer('category_id');
            $table->longText('description');
            $table->enum('browsing_restriction',['All ages','R-18','R-18G']);
            $table->enum('privacy',['public','uploader only','private']);
            $table->string('md5_hash');
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
        Schema::drop('images');
    }
}
