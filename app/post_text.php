<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class post_text extends Eloquent
{
    //post text feild to fill
    protected $fillable = [
        'post_text_value', 'post_text_hashtag', 'post_text_users_id_fkey',
    ];
}
