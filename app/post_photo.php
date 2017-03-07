<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class post_photo extends Eloquent
{
    //post_photo fields
    protected $fillable = [
       'post_photo_link', 'post_photo_caption', 'post_photo_hashtag', 'post_photo_users_id_fkey',
    ];

}
