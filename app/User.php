<?php

namespace App;
use Jenssegers\Mongodb\Auth\PasswordResetServiceProvider;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->users_password;
    }
    protected $fillable = [
        'users_name', 'users_email', 'users_password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'users_password', 'remember_token',
    ];
}
