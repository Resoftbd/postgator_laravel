<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        session(['users_id' => $id]);
        return view('users.social_login');
    }

   /** public function user_auth()
    {
// validate the info, create rules for the inputs
        $rules = array(
            'users_email'    => 'required|email', // make sure the email is an actual email
            'users_password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

// run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

// if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('register')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('users_password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'users_email'     => Input::post('users_email'),
                'users_password'  => Input::post('users_password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                return redirect('user_menu');

            } else {

                // validation not successful, send back to form
                return redirect('register');

            }

        }
    }

**/
    public function user_menu()
    {
        return view('users.menu');
    }
    public function social_info(Request $request)
    {
        // Update the document of given id with parameters from
        // the PUT or PATCH request and return to index view
         $id = $request->input('users_id');
        DB::collection('users')->where('_id', $id)
            ->update([
                'users_fb_name' => $request->input('users_fb_name'),
                'users_fb_photo' => $request->input('users_fb_photo'),
                'users_fb_id' => $request->input('users_fb_id')

            ]);

        $user = DB::collection('users')->get();

        return view('users.userDashboard', compact('user'));
    }

}
