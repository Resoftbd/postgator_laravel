@extends('layouts.user')

@section('title', 'Dashboard')

@section('parent')
@parent
@endsection

@section('content')

<script>
    // initialize and setup facebook js sdk
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1893798254237418',
            status     : true,
            cookie     : true,
            oauth      : true,
            xfbml      : true,
            version    : 'v2.8'
        });
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                accessToken = response.authResponse.accessToken;
                //  document.getElementById('status').innerHTML = 'We are connected.';
                // document.getElementById('login').style.visibility = 'hidden';
            } else if (response.status === 'not_authorized') {
                // document.getElementById('status').innerHTML = 'We are not logged in.'
            } else {
                //  document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
            }
        });
    };
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    function fb_login() {
        FB.login(function(response) {
            if (response.status === 'connected') {
                accessToken = response.authResponse.accessToken;
                // document.getElementById('status').innerHTML = 'We are connected.';
                document.getElementById('post_fb_text').src="img/fb2.png";
                getInfo();
            } else if (response.status === 'not_authorized') {
                // document.getElementById('status').innerHTML = 'We are not logged in.'
            } else {
                // document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
            }
        }, {scope: 'publish_actions,user_photos'});
    }
    // getting basic user info
    function getInfo() {
        FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id'}, function(response) {
            //  document.getElementById('status').innerHTML = response.name;
            if(response){
                fb_post();
            }
            // alert("Hello! I am in get info");
        });
    }
    // posting on user timeline
    function fb_post() {
        if(document.getElementsByName('post_text_value').value!=""){
            if(document.getElementsByName('post_text_hashtag').value!="") {
                var hashValue = document.getElementById('post_text_hashtag').value.split(',');
                var hashtags = '#'+hashValue.join('\n#');
            }
            else{
                var hashtags="";
            }
            var wallPost = {
                message : document.getElementById('post_text_value').value+'\n'+hashtags
            };
        }
        FB.api('/me/feed', 'post', wallPost, function(response) {
            if (!response || response.error) {
                alert('Error occured');
            } else {
                alert('Post ID: ' + response);
            }

        });
    }
    //fb photo post  from pc
    function fileUpload() {
        var wallPost = {
            description : 'asdsasad'
        };
        FB.api('/me/albums', function(response) {
            var album = response.data[0];
            // Now, upload the image to first found album for easiness.
            var action_url = 'https://graph.facebook.com/' + album.id + '/photos?access_token=' +  accessToken;
            var form = document.getElementById('upload-photo-form');
            form.setAttribute('action', action_url);
            // This does not work because of security reasons. Choose the local file manually.
            // var file = document.getElementById('upload-photo-form-file');
            // file.setAttribute('value', "/Users/nseo/Desktop/test_title_03.gif")
            form.submit();
            if (!response || response.error) {
                alert('Error occured');
            } else {
                alert('Post ID: ' + response);
            }
        });
    }
    //Select post for fb (fb_login) function
    $(function () {
        $("#post_fb_text").click(function () {
            fb_login();
            //   alert("Hello! I am in post fb text!!");
        });
    });
    $(function () {
        $("#post_fb_photo").click(function () {
            fileUpload();
            //   alert("Hello! I am in post fb text!!");
        });
    });
</script>


<div class="dashboard_body row">
    @foreach($user as $data)

    <div class="col-xs-3 row" style="height:92vh;overflow-y: scroll; background:#fafafa; z-index:1000">
        <div class="col-xs-6" style=" padding-left:20px!important; padding-right:0px;">
            <div class="dash_thumbnail">
                <img src="img/img18.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="img/img19.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="img/img21.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="img/img22.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="img/img23.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="img/img18.jpg" class="thum_image">
            </div>

            <div class="dash_thumbnail">
                <img src="img/img21.jpg" class="thum_image">
            </div>
        </div>
        <div class="col-xs-6" style="padding-left:20px!important; padding-right:0px;">
            <div class="dash_thumbnail">
                <div class="dash_thumbnail">
                    <img src="img/img18.jpg" class="thum_image" style="">
                </div>
                <img src="img/img23.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="img/img22.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="img/img21.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="img/img19.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="img/img18.jpg" class="thum_image">
            </div>
            <div class="dash_thumbnail">
                <img src="img/img23.jpg" class="thum_image">
            </div>
            <button class="btn btn-info" style="border-radius: 22px; font-size:20px; margin:10px; margin-bottom:10px; margin-left:-32px; background:#00A5CF;"><b style="padding: 0px 2px;">+</b></button>

        </div>

    </div>
    <div class="col-xs-9">

        <div class="dash_contents">
            @if (session('status'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">
                    &times;
                </button>
                {{ session('status') }}
            </div>

            @endif
            @if (session('failed'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">
                    &times;
                </button>
                {{ session('failed') }}
            </div>

            @endif
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#images"><b>Images</b></a></li>
                <li><a data-toggle="tab" href="#vedios"><b>Vedios</b></a></li>
                <li><a data-toggle="tab" href="#texts"><b>Texts</b></a></li>
                <li><a data-toggle="tab" href="#edpro"><b>Profile</b></a></li>
            </ul><br>


            <div class="tab-content">
                <div id="images" class="tab-pane fade in active dash_tab_content">
                    <form class="form-horizontal text-justify" target="upload_iframe" id="upload-photo-form" role="form" method="post" action="photoUpload" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <h2>Well,</h2> So, I was talking about posting an image and the link of that image is:
                        <label for="file-input">
                            <img src="img/cam.png" title="browse an image" style="height:38px; width:40px;cursor:pointer"/>
                        </label>
                        <input id="file-input" type="file" style="display:none;"/>
                        and plz add
                        <input type="text" class="dash_input" id="post_photo_caption" name="post_photo_caption" placeholder="any caption for image" style="">
                        this caption with that image. O, totally forgot about one more thing, hashtags. Plz add these hashtags
                        <input type="text" class="dash_input" name="post_photo_hashtag" id="post_photo_hashtag" placeholder="hashtags, separated by commas">
                        . By the way, you should post these images on:
                        <usl style="width:840px; margin-left:10px; margin-top:-10px">
                            <li style="list-style:none; display:inline-block;"><img  id ="post_fb_photo" src="img/Facebook.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="img/googleplus.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="img/twitter.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="img/instagram.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="img/wordPress.png" class="chobigulo"> </li>
                        </usl>
                        <br><br>
                        <button type="submit" class="btn btn-info pull-right" style="border-radius: 19px; font-size:17px; background:#00A5CF;">Publish</button>
                        <iframe id="upload_iframe" name="upload_iframe" witdh="0px" height="0px" border="0" style="width:0; height:0; border:none;"></iframe>

                    </form>


                </div>
                <div id="vedios" class="tab-pane fade dash_tab_content">
                    <form class="form-horizontal text-justify" role="form" methode="post" action="">

                        <h2>Well,</h2> So, I was talking about posting a video and the link of that video is:
                        <input type="text" class="dash_input" id="imagelink" name="imagelink" placeholder="video link" style="">
                        and plz add
                        <input type="text" class="dash_input" id="imagetext" name="imagetext" placeholder="any caption for video" style="">
                        this caption with that video. O, totally forgot about one more thing, hashtags. Plz add these hashtags
                        <input type="text" class="dash_input" name="hashtags" id="hashtags" placeholder="hashtags, separated by commas">
                        . By the way, you should post these vedios on:
                        <usl style="width:840px; margin-left:10px; margin-top:-10px">
                            <li style="list-style:none; display:inline-block;"><img  id ="post_fb_photo" src="img/Facebook.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="img/googleplus.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="img/twitter.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="img/instagram.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="img/wordPress.png" class="chobigulo"> </li>
                        </usl>
                        <br><br>
                        <button type="submit" class="btn btn-info pull-right" style="border-radius: 19px; font-size:17px; background:#00A5CF;">Publish</button>
                    </form>
                </div>
                <div id="texts" class="tab-pane fade dash_tab_content">
                    <form class="form-horizontal" role="form" method="post" action="postText" id="post_text">
                        {{csrf_field()}}
                        <h2>Well,</h2> So, I was talking about posting a status. All you have to do is to post this
                        <input type="text" class="dash_input" id="post_text_value" name="post_text_value" placeholder="any text" style="">
                        into my selected social sites with all these hashtags:
                        <input type="text" class="dash_input" name="post_text_hashtag" id="post_text_hashtag" placeholder="hashtags, separated by commas">
                        . By the way, you should post this article on:
                        <usl style="width:840px; margin-left:10px; margin-top:-10px">
                            <li style="list-style:none; display:inline-block;"><img  id ="post_fb_text" src="img/Facebook.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="img/googleplus.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="img/twitter.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="img/instagram.png" class="chobigulo"> </li>
                            <li style="list-style:none; display:inline-block;"><img src="img/wordPress.png" class="chobigulo"> </li>
                        </usl>
                        <br><br>
                        <button type="submit" id="post_on" class="btn btn-info pull-right" style="border-radius: 19px; font-size:17px; background:#00A5CF;">Publish</button>
                    </form>
                </div>

                        <div id="edpro" class="tab-pane fade dash_tab_content">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="form-horizontal text-justify" role="form" method="post" action="updateProfile" id="post_text">
                                {{csrf_field()}}
                                <input type="hidden" id ="fb_user" name="users_id" value ="{{$data['_id']}}">
                                <input type="hidden" id ="fb_id" name="users_fb_id" value="">
                                <input type="hidden" id ="fb_name" name="users_fb_name" value="">
                                <input type="hidden" id ="fb_photo" name="users_fb_photo" value="">
                                <input type="hidden" id ="google_id" name="users_google_id" value="">
                                <input type="hidden" id ="linked_id" name="users_linkedin_id" value="">
                                <h2>Hello,</h2> I'm
                                <input type="text" class="dashs_input"  value="{{$data['users_fb_name']}}" id="edpro_value" name="users_fb_name" placeholder="any name" style="">
                                and my email is:
                                <input type="email" class="dashs_input" name="users_email"  value="{{$data['email']}}" id="users_fb_email" placeholder="new email">
                                .
                                I want to change my previous password, which was
                                <input type="password" class="dashs_input" name="OldPassword" id="edpro_pass_old" placeholder="old password">

                                and the new password will be:
                                <input type="password" class="dashs_input" name="password" id="edpro_pass_new1" placeholder="new password">
                                .
                                Let me confirm you again, my new password will be:
                                <input type="password" class="dashs_input" name="password_confirmation" id="edpro_pass_new2" placeholder="Retype password">
                                .
                                By the way, I need to change my social media account(s) of
                                <usl style="width:840px; margin-left:10px; margin-top:-10px">
                                    <li style="list-style:none; display:inline-block;"><img  id ="post_fb_text" src="img/Facebook.png" class="chobigulo"> </li>
                                    <li style="list-style:none; display:inline-block;"><img src="img/googleplus.png" class="chobigulo"> </li>
                                    <li style="list-style:none; display:inline-block;"><img src="img/twitter.png" class="chobigulo"> </li>
                                    <li style="list-style:none; display:inline-block;"><img src="img/instagram.png" class="chobigulo"> </li>
                                    <li style="list-style:none; display:inline-block;"><img src="img/wordPress.png" class="chobigulo"> </li>
                                </usl>
                                <br><br>
                                <button type="submit" id="post_on" class="btn btn-info pull-right" style="border-radius: 19px; font-size:17px; background:#00A5CF;">Publish</button>
                            </form>
                        </div>
            </div>
        </div>
    </div>
</div>

@endforeach

</body>
</html
@endsection