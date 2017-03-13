<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $collection) {
            $collection->increments('id');
            $collection->string('users_name');
            $collection->string('email')->unique();
            $collection->string('password');
            $collection->string('users_fb_id')->default(null);
            $collection->string('users_fb_name')->default(null);
            $collection->string('users_google_id')->default(null);
            $collection->string('users_linkedin_id')->default(null);
            $collection->string('users_fb_photo')->default(null);
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
        Schema::dropIfExists('users');
    }
}
