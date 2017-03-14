<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\post_text;
use App\post_photo;
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
            return redirect('dashboard');
        }
        else{
            return redirect('login')->with('errors', 'Sorry!!Wrong email or password!');
        }


    }



    public function social_info(Request $request)
    {

         $id = $request->input('users_id');
        DB::collection('users')->where('_id', $id)
            ->update([
                'users_fb_name' => $request->input('users_fb_name'),
                'users_fb_photo' => $request->input('users_fb_photo'),
                'users_fb_id' => $request->input('users_fb_id'),
                'users_google_id' => $request->input('users_google_id'),
                'users_linkedin_id' => $request->input('users_linkedin_id')

            ]);

        return redirect()->action('HomeController@dashboard');
    }
    public function update_profile(array $request)
    {

//        return Validator::make($request, [
//            'OldPassword' => 'required|pwdvalidation',
//            'users_name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|min:6|confirmed',
//        ]);
        $id = $request->input('users_id');
        DB::collection('users')->where('_id', $id)
            ->update([
                'users_fb_name' => $request->input('users_fb_name'),
                'users_fb_photo' => $request->input('users_fb_photo'),
                'users_fb_id' => $request->input('users_fb_id'),
                'users_google_id' => $request->input('users_google_id'),
                'users_email' => $request->input('users_email'),
                'password' => $request->input('password'),
                'users_linkedin_id' => $request->input('users_linkedin_id')

            ]);

        return redirect()->action('HomeController@dashboard');
    }
    public function dashboard()
    {
        $id = Auth::id();
        session(['users_id' => $id]);
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
        $status =$post->save();

        if($status)
            return redirect('dashboard')->with('status', 'Text has been posted!');
        else
            return redirect('dashboard')->with('failed', 'Text was not posted!!!');
    }
    //photo upload

    public function photo_upload(Request $request)
    {
        $name = $_FILES['post_photo_link']['name'];
        $post_photo = new post_photo();
        $post_photo->post_photo_caption = $_POST['post_photo_caption'];
        $post_photo->post_photo_hashtag = $_POST['post_photo_hashtag'];
        $post_photo->post_photo_users_id_fkey = session('users_id');
        $name_ext = explode('.',$name );
        $ext = end($name_ext);
        $target_name = uniqid(rand()).".".$ext;
        $target_file1 = "UploadFolder/Images/".$target_name;
        $post_photo->post_photo_link = $target_file1;
        $status = $post_photo->save();


        $fileName=  $post_photo->post_photo_link;

        $source= $_FILES['post_photo_link']['tmp_name'];
        @mkdir("UploadFolder/Images");
        $destination=$fileName;
        move_uploaded_file($source,$destination);



        if($status)
        return redirect('dashboard')->with('status', 'Photo has been posted!');
        else
            return redirect('dashboard')->with('failed', 'Photo was not posted!!!');

    }


}
