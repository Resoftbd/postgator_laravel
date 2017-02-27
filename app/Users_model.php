<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

//use Illuminate\Database\Eloquent\Model;

class Users_model extends Eloquent
{
    //Users model
    protected $collection = 'users';
}
