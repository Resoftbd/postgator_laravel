<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;

class CreatePostTextTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $connection = 'mongodb';

    public function up()
    {
        Schema::create('post_text', function (Blueprint $collection) {
            $collection->increments('id');
            $collection->string('post_text_value');
            $collection->string('post_text_hashtag');
            $collection->string('post_text_users_id_fkey');
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
        Schema::dropIfExists('post_text');
    }
}
