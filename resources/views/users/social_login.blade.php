<!DOCTYPE html>
<html lang="en">
<head>
    <title>Postgator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('css/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('css/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('css/bootstrap.js')}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">


</head>


<body id="grad" >

<script>
    //initialization Facebook Js sdk
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1893798254237418',
            xfbml      : true,
            version    : 'v2.8'
        });
        FB.AppEvents.logPageView();

    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            document.getElementById('status').innerHTML = 'We are connected.';
            document.getElementById('login').style.visibility = 'hidden';
        } else if (response.status === 'not_authorized') {
            document.getElementById('status').innerHTML = 'We are not logged in.'
        } else {
            document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
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

    // login with facebook with extra permissions
    function login() {
        FB.login(function(response) {
            if (response.status === 'connected') {
                document.getElementById('status').innerHTML = 'We are connected.';
                document.getElementById('login').style.visibility = 'hidden';
                getInfo();
            } else if (response.status === 'not_authorized') {
                document.getElementById('status').innerHTML = 'We are not logged in.'
            } else {
                document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
            }
        }, {scope: 'email'});

    }

    // getting basic user info
    function getInfo() {
        FB.api('/me', {fields: "id,name,picture"},function(response) {
            document.getElementById("fb_id").value = response.id;
            document.getElementById("fb_name").value = response.name;
            var im = document.getElementById("profileImage").setAttribute("src", "http://graph.facebook.com/" + response.id + "/picture?type=normal");
            document.getElementById("fb_photo").value = im;
        });
    }

    //calling facebook login function
    $(function () {
        $("#login").click(function () {
           login();
        });
    });
</script>

<img id="logo" src="img/jj.png" style="position:fixed; left:45vw; top: 9.5vh; height:9.5vw; width:10vw;">

<div style="margin-top:15vh;">
    <form method="post"action="socialInfo">
        {{csrf_field()}}
    <p class="suggestion_para">Connect  To Your Accounts</p>
    <ul class="log_social">

    <div id="status"></div>
    <?php $id = session('users_id')?>
    </tr>

    <input type="hidden" id ="fb_user" name="users_id" value ="{{$id}}">
    <input type="hidden" id ="fb_id" name="users_fb_id" value="">
    <input type="hidden" id ="fb_name" name="users_fb_name" value="">
    <input type="hidden" id ="fb_photo" name="users_fb_photo" value="">
    <li style="list-style:none; display:inline-block;"><img src="img/Facebook.png"  id="login" class="chobi"> </li>
    <li style="list-style:none; display:inline-block;"><img src="img/googleplus.png" class="chobi"> </li>
    <li style="list-style:none; display:inline-block;"><img src="img/twitter.png" class="chobi"> </li>
    <li style="list-style:none; display:inline-block;"><img src="img/instagram.png" class="chobi"> </li>
    <li style="list-style:none; display:inline-block;"><img src="img/wordPress.png" class="chobi"> </li>

    </ul>
    <br><br><br><br>
    <button type="submit" class="btn btn-info text-center" style="border-radius:5vh; width:9vw; height:6vh; margin:5vh 45.5vw; text-shadow:1px 1px 1px #355;" > <b>Done</b> </button>
</form>


    <button class="btn btn-default text-center" style=" color:#6A4F94; border-radius:5vh; width:9vw; height:6vh; margin:-12vh 45.5vw;"> <b>Skip</b> </button>

</div>



</body>