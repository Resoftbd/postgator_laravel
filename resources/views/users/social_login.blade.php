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



    <script type="text/javascript" src="http://code.jquery.com/jquery-1.5b1.js"></script>
    <script type="text/javascript" src="//platform.linkedin.com/in.js">
        api_key: 81z2njy7sm7tbm
        authorize: true
        onLoad: onLinkedInLoad
    </script>

    <script type="text/javascript">

        // Setup an event listener to make an API call once auth is complete
        function onLinkedInLoad() {
            IN.Event.on(IN, "auth", getProfileData);


            $('a[id*=li_ui_li_gen_]').html('<img src="img/linkedin.png"class="chobi" style="margin-top:12px;">');

        }

        // Handle the successful return from the API call
        function onSuccess(data) {
            console.log(data);
        }

        // Handle an error response from the API call
        function onError(error) {
            console.log(error);
        }

        // Use the API call wrapper to request the member's basic profile data
        function getProfileData() {
            //IN.API.Raw("/people/~").result(onSuccess).error(onError);
            IN.API.Profile('me').fields([
                'first-name','id', 'last-name', // Add these to get the name
                'industry', 'date-of-birth', 'educations:(id,school-name)',
                'positions' // Add this one to get the job history
            ])
                    .result(displayProfiles);
        }
        function displayProfiles(profiles) {
            var member = profiles.values[0];

            document.getElementById("linked_id").value = member.id;
            document.getElementsByClassName('IN-widget').src="img/linkedin2.png"



        }

        $(function () {
            $("#linkedin_login").click(function () {
                onLinkedInLoad();
            });
        });

    </script>


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
          //  document.getElementById('status').innerHTML = 'We are connected.';
           // document.getElementById('login').src="img/fb2.png";
        } else if (response.status === 'not_authorized') {
          //  document.getElementById('status').innerHTML = 'We are not logged in.'
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

    // login with facebook with extra permissions
    function login() {
        FB.login(function(response) {
            if (response.status === 'connected') {
               // document.getElementById('status').innerHTML = 'We are connected.';
                document.getElementById('login').src="img/fb2.png";
                getInfo();
            } else if (response.status === 'not_authorized') {
               // document.getElementById('status').innerHTML = 'We are not logged in.'
            } else {
              //  document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
            }
        }, {scope: 'email'});

    }

    // getting basic user info
    function getInfo() {
        FB.api('/me', 'GET', {fields: 'name,id,picture.width(150).height(150)'}, function(response) {
            document.getElementById("fb_id").value = response.id;
            document.getElementById("fb_name").value = response.name;
            //var im = document.getElementById("profileImage").setAttribute("src", "http://graph.facebook.com/" + response.id + "/picture?type=normal");
            document.getElementById("fb_photo").value = response.picture.data.url;
        });
    }

    //calling facebook login function
    $(function () {
        $("#login").click(function () {
           login();
        });
    });
//Google plus Authentication

    function logout()
    {
        gapi.auth.signOut();
        location.reload();
    }
    function google_login()
    {
        var myParams = {
            'clientid' : '1064596107732-n61gnahtflnv2sljm1rmsek0sfhm37bh.apps.googleusercontent.com',
            'cookiepolicy' : 'single_host_origin',
            'callback' : 'loginCallback',
            'approvalprompt':'force',
            'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
        };
        gapi.auth.signIn(myParams);

    }

    function loginCallback(result)
    {
        if(result['status']['signed_in'])
        {
            var request = gapi.client.plus.people.get(
                    {
                        'userId': 'me'
                    });
            request.execute(function (resp)
            {
                var email = '';
                if(resp['emails'])
                {
                    for(i = 0; i < resp['emails'].length; i++)
                    {
                        if(resp['emails'][i]['type'] == 'account')
                        {
                            email = resp['emails'][i]['value'];
                        }
                    }
                }

              /*  var str = "Name:" + resp['displayName'] + "<br>";
                str += "Image:" + resp['image']['url'] + "<br>";
                str += "<img src='" + resp['image']['url'] + "' /><br>";

                str += "URL:" + resp['url'] + "<br>";
                str += "Email:" + email + "<br>";*/
                document.getElementById("google_id").value = resp.id;
                document.getElementById('google_login').src="img/googleplus2.png";
            });

        }

    }
    function onLoadCallback()
    {
        gapi.client.setApiKey('AIzaSyD43LJY4kbGUxkSJgOSQ4WhVYN8sweyQ8Q');
        gapi.client.load('plus', 'v1',function(){});
    }

    (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
    //calling Google plus login function
    $(function () {
        $("#google_login").click(function () {
            google_login();
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
    <input type="hidden" id ="google_id" name="users_google_id" value="">
    <input type="hidden" id ="linked_id" name="users_linkedin_id" value="">
    <li style="list-style:none; display:inline-block;"><img src="img/Facebook.png"  id="login" class="chobi"> </li>
    <li style="list-style:none; display:inline-block;"><img src="img/googleplus.png" id ="google_login" class="chobi"> </li>
    <li style="list-style:none; display:inline-block;"><img src="img/twitter.png" class="chobi"> </li>
   <li style="list-style:none; display:inline-block;" id ="linkedin_login">
       <script type="in/Login">

       </script>
   </li>
    <li style="list-style:none; display:inline-block;"><img src="img/instagram.png" class="chobi"> </li>

    </ul>
        <div id="profiles"></div>
    <br><br><br><br>
    <button type="submit" class="btn btn-info text-center" style="border-radius:5vh; width:9vw; height:6vh; margin:5vh 45.5vw; text-shadow:1px 1px 1px #355;" > <b>Done</b> </button>
</form>


  <a href ="dashboard">  <button class="btn btn-default text-center" style=" color:#6A4F94; border-radius:5vh; width:9vw; height:6vh; margin:-12vh 45.5vw;"> <b>Skip</b> </button></a>

</div>



</body>