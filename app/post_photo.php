<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post_photo extends Model
{
    //post_photo fields
    protected $fillable = [
       'post_photo_link', 'post_photo_caption', 'post_photo_hashtag', 'post_photo_users_id_fkey',
    ];

}
