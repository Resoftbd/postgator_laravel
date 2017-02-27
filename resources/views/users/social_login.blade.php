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
        FB.api('/me', function(response) {
            document.getElementById("fb_id").value = response.id;
            document.getElementById("fb_name").value = response.name;
        });
    }
</script>

<img id="logo" src="../assets/img/jj.png" style="position:fixed; left:45vw; top: 9.5vh; height:9.5vw; width:10vw;">

<div style="margin-top:15vh;">

    <p class="suggestion_para">Connect  To Your Accounts</p>
    <ul class="log_social">

        <div id="status"></div>

        </tr>
        <input type="text" id ="fb_user" ng-model="social.users_id">
        <input type="hidden" id ="fb_id" ng-model="social.users_fb_id" value="">
        <input type="hidden" id ="fb_name" ng-model="social.users_fb_name" value="">
       <li style="list-style:none; display:inline-block;"> <button onclick="login()" id="login"><img src="../assets/img/Facebook.png" class="chobi"></button> </li>
         <li style="list-style:none; display:inline-block;"><img src="../assets/img/googleplus.png" class="chobi"> </li>
         <li style="list-style:none; display:inline-block;"><img src="../assets/img/twitter.png" class="chobi"> </li>
         <li style="list-style:none; display:inline-block;"><img src="../assets/img/instagram.png" class="chobi"> </li>
         <li style="list-style:none; display:inline-block;"><img src="../assets/img/wordPress.png" class="chobi"> </li>

    </ul>
<br><br><br><br>
    <button class="btn btn-info text-center" style="border-radius:5vh; width:9vw; height:6vh; margin:5vh 45.5vw; text-shadow:1px 1px 1px #355;" ng-click="socialAuth()" > <b>Done</b> </button>
    <button class="btn btn-default text-center" style=" color:#6A4F94; border-radius:5vh; width:9vw; height:6vh; margin:-12vh 45.5vw;"> <b>Skip</b> </button>

</div>



</body>