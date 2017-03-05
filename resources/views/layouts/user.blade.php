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
    <script type="text/javascript" src="{{asset('css/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('css/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('css/bootstrap.js')}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">



</head>


<body >

@section('header')
    @foreach($user as $data)
<div class="header row">
    <div class="col-xs-6">
        <img src="img/jj.png" style="height:4vw; width:4vw; padding:0.5vw; border-radius:2vw;">
    </div>
    <div class="col-xs-6">
        <a href="logout">  <img src="{{$data['users_fb_photo']}}" class="pull-right" style="height:4vw; width:4vw; padding:0.5vw; border-radius:2vw;"></a>
    </div>

</div>
@endforeach
@show

@yield('content')

