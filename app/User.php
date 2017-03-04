<?php

namespace App;
use Jenssegers\Mongodb\Auth\PasswordResetServiceProvider;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
 use Illuminate\Auth\Authenticatable;
 use Illuminate\Auth\Passwords\CanResetPassword;
 use Illuminate\Foundation\Auth\Access\Authorizable;
 use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
 use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
class User extends Eloquent implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
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
//    public function getAuthPassword()
//    {
//        return $this->users_password;
//    }
    protected $fillable = [
        'users_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];
}
