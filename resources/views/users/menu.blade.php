<!DOCTYPE html>
<html lang="en">
<head>
    <title>Postgator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/menu_style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('css/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('css/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('css/bootstrap.js')}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">


</head>


<body id="grad">

<img id="logo" src="{{asset('img/jj.png')}}" style="position:fixed; left:45vw; top: 9.5vh; height:9.5vw; width:10vw;">

<div style="margin-top:15vh;">

    <p class="suggestion_para">What would you like to create?</p>
<div id="wrapper">
    <ul class="nav">
        <li class="hm">
            <img class="icon" src="{{asset('img/blog.png')}}" alt="">
            <span>Blog post</span>
        </li>
        <li class="fb">
           <a href="dashboard" style=""><img class="icon" src="{{asset('img/social_networks.png')}}" alt="" ></a>
            <span>Social post</span>
        </li>
        <li class="gp">
            <img class="icon" src="{{asset('img/folder.png')}}" alt="">
            <span>My library</span>
        </li>
        <li class="tw">
            <img class="icon" src="{{asset('img/camera.png')}}" alt="">
            <span>Image</span>
        </li>
        <li class="cl">
            <img class="icon" src="{{asset('img/camera_video.png')}}" alt="">
            <span>Video</span>
        </li>
    </ul>
</div>

</div>



</body>