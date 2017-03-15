<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('css/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('css/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('css/bootstrap.js')}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

</head>

<style>
    .search_option{position:fixed; top:75px; right:-195px; height:40px; z-index:10;overflow:hidden; font-family: 'Cookie', cursive; transition:height 1s, right 1s; border-radius:2px; background:rgba(1,1,1,0.65);color:#eee; padding:6px 8px;}
    .search_option:hover{position:fixed; top:75px; right:0px; height:175px;}
    .search_option input,.search_option button,.search_option option,.search_option select{color:#111;}
    .other_option{position:fixed; top:122px; right:-75px; height:40px;font-family: 'Cookie', cursive; z-index:1; overflow:hidden; transition:height 1s, right 1s; border-radius:2px; background:rgba(1,1,1,0.65);color:#eee; padding:6px 7px;}
    .other_option:hover{position:fixed; top:122px; right:0px; height:40px;}
    .other_option button{color:#121;}
    .other_option ul a{color:#ccc;}
    .other_option ul a:hover{color:#fff; text-decoration:none;}
    input.gsc-input { width:162px!important; color: #555!important; margin:0px; padding:-3px 1px!important; height:16px!important;}
    input.gsc-search-button {background: #555; color:#eee; width:20px!important; margin-left:-10px!important;}
    form.gsc-search-box { color:#222;margin:0px; margin-top:-2px!important; padding-top:-2px!important; height:20px!important;}
    div.gsc-control-cse {width:231px; height:28px; padding:2px 2px; margin:0px; overflow:hidden!important;}

</style>


<body >
@section('header')
    @foreach($user as $data)
        <div class="header row" style="margin:0px; height:9vh!important; width:100%; margin-top:-95px; padding-top:3px; margin-left: -0px!important; background: -webkit-linear-gradient(#563D7D, #6E5398); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#563D7D, #6E5398); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#563D7D, #6E5398); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#563D7D, #6E5398);">
            <div class="col-xs-6">
                <img src="img/jj.png" style="height:4vw; width:4vw; padding:0.5vw; border-radius:2vw;">
            </div>
            <div class="col-xs-6">
                <a href="">  <img src="{{$data['users_fb_photo']}}" class="pull-right" style="height:4vw; width:4vw; padding:0.5vw; border-radius:2vw;"></a>
            </div>
        </div>
    @endforeach
@show

<div class="search_option">

    <form>
        <div class="dashboard_body"> <gcse:search></gcse:search><br><br></div>
        get posts from last

        <select>
            <option>1 day</option>
            <option>1 month</option>
            <option>1 year</option>
        </select>or <br><br>
        get posts about <input type="text" placeholder="hashtag value" style="width:102px">




    </form>
</div>

<div class="other_option">
    <button type="button" onclick="myY"><i class="fa fa-sign-out"></i></button>&nbsp
    <ul style="padding-left:50px; list-style: none; margin-top:-30px;">
        <!--MODAL LINK-->
        {{--<li style="padding:5px;"><b><a href="#myModal" data-toggle="modal" data-target="#myModal">Edit Profile</a></b></li>--}}

       <a href="logout"> <li  style="padding:7px 2px;"><b>Log out</b></li></a>
    </ul>
</div>
<script>
    (function() {
        var cx = '007860564312796620469:dxpfzztxz_s';
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = true;
        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
    })();
</script>
{{--<button type="submit"><i class="fa fa-search"></i></button>&nbsp<input type="text" placeholder="Google search">--}}



@yield('content')
