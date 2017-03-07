<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;


class CreatePostPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_photo', function (Blueprint $collection) {
            $collection->increments('id');
            $collection->string('post_photo_caption');
            $collection->string('post_photo_hashtag');
            $collection->string('post_photo_link');
            $collection->string('post_photo_users_id_fkey');
            $collection->rememberToken();
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_photo');
    }
}
