<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Users_model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
class Login_controller extends Controller
{
    //login page view
    public function index()
    {
        return view('users.login');
    }

    function save(Request $request){
        $getTable = new Users_model;
        $getTable->users_name = $request->input('users_name');
        $getTable->users_email = $request->input('users_email');
        $getTable->users_password = $request->input('users_password');
        $getTable->save();

        return view('user.social_login');
    }
}
