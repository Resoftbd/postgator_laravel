<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post_text;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Input;
use Validator;
use Redirect;
use Session;

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

    public function user_auth(Request $request)
    {

        $this->validate($request, [
            'users_email'    => 'required|email',
            'users_password' => 'required|alphaNum|min:3'
        ]);
        $users_email = $request->input('email');
        $password = $request->input('password');
        $users_password =bcrypt($password);
            // attempt to do the login
        $user = DB::collection('users')->where(array('users_name'=>$users_email,'users_password'=>$users_password))->get();
        if($user){
            return redirect('user_menu');
        }
        else{
            return redirect('login')->with('errors', 'Sorry!!Wrong email or password!');
        }


    }


    public function user_menu()
    {
        $id = Auth::id();
        session(['users_id' => $id]);
        return view('users.menu');
    }
    public function social_info(Request $request)
    {

         $id = $request->input('users_id');
        DB::collection('users')->where('_id', $id)
            ->update([
                'users_fb_name' => $request->input('users_fb_name'),
                'users_fb_photo' => $request->input('users_fb_photo'),
                'users_fb_id' => $request->input('users_fb_id'),
                'users_google_id' => $request->input('users_google_id')

            ]);

        return redirect()->action('HomeController@dashboard');
    }
    public function dashboard()
    {
        $id = session('users_id');
        $user = DB::collection('users')->where('_id',$id)->get();
        return view('users.userDashboard', compact('user'));

    }
    //create text post
    public function post_text(Request $request)
    {
        $post = new post_text;
        $post->post_text_value =  $request->input('post_text_value');
        $post->post_text_hashtag =  $request->input('post_text_hashtag');
        $post->post_text_users_id_fkey = session('users_id');
        $post->save();
       // $books = DB::collection('books')->get();
        return redirect('dashboard')->with('status', 'Text has been posted!');
       // return redirect()->action('HomeController@dashboard');
    }
    //photo upload
    public function photo_upload(Request $request) {
        // getting all of the post data
        $file = $request->input('post_photo_link');
        // setting up rules
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000

            // checking file is valid.

                $destinationPath = 'uploads/image'; // upload path
                $extension = explode('.',$file ); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                $request->input('post_photo_link')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                Session::flash('success', 'Upload successfully');
                return Redirect::to('dashboard');


    }

}
