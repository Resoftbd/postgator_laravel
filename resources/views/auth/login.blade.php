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


<body id="grad" onclick="change()" >

<img id="logo" src="img/jj.png" style="position:fixed; left:45vw; top: 9.5vh; height:9.5vw; width:10vw;">
<div class="log_reg">
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#home"><b>Log in</b></a></li>
		<li><a data-toggle="tab" href="#menu1"><b>Register</b></a></li>
	</ul><br>


	<div class="tab-content">
		<div id="home" class="tab-pane fade in active">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

			<form class="form-horizontal" role="form"  method="post" action="{{route('login')}}">
                {{csrf_field()}}
				<div class="form-group">

					<label class="control-label col-sm-2" for="email"><i class="fa fa-envelope icons"></i></label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd"><i class="fa fa-lock icons"></i></label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Enter password">

					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-sm-7">
						<a class="pull-rsssight" href="" style="color:#ddd; text-shadow:1px 1px 1px #111; background:none!important; border:0px!important;">Forgot password?</a>
					</div>
					<div class="col-sm-5">
						<button type="submit" style="color:#563D7D" class="btn btn-default pull-right" ><b>Log In</b></button>
					</div>
				</div>
			</form>
		</div>
		<div id="menu1" class="tab-pane fade">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<form class="form-horizontal" role="form"  method="post" action="{{ route('register') }}">
				{{csrf_field()}}

				<div class="form-group">
					<label class="control-label col-sm-2" for="name"><i class="fa fa-user icons"></i></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="users_name" id="name" value="{{ old('users_name') }}" placeholder="Full Name">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email"><i class="fa fa-envelope icons"></i></label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="email" id="email_reg" value="{{ old('users_email') }}" placeholder="Enter email">
					</div>
				</div>
				<div class="form-group">

					<label class="control-label col-sm-2" for="pwd"><i class="fa fa-lock icons"></i></label>
					<div class="col-sm-10">
						<input type="password" class="form-control"  name="password" id="pwd_reg" placeholder="Enter password">

					</div>
				</div>
				<div class="form-group">

					<label class="control-label col-sm-2" for="pwd"><i class="fa fa-lock icons"></i></label>
					<div class="col-sm-10">
						<input type="password" class="form-control"  name="password_confirmation" id="pwd_reg" placeholder="Retype password">

					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<button type="submit" style="color:#563D7D" class="btn btn-default pull-right"  ><b>Sign Up</b></button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>



</body>