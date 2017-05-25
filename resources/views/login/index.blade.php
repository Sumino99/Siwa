<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistem Informasi Walas</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ URL::to('vendors/font-awesome/css/font-awesome.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ URL::to('css/AdminLTE.min.css') }}">

</head>
<body class="hold-transition login-page">
<div class="login-box" style="margin-top: 50px"  >
	<div class="login-logo">
		<a href="#!">Login | <b>SIWA</b></a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">

		@if(Session::has('msg'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>{{ Session::get('msg') }}</strong>
			</div>
		@endif

		<form action="{{ route('dologin') }}" method="post">
			<div class="form-group has-feedback">
				<input type="username" class="form-control" name="username" placeholder="Username" autocomplete="off">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-6 col-xs-offset-3">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<!-- /.col -->
			</div>
		</form>
	</div>
	<!-- /.login-box-body -->
</div>
<!-- /.login-box -->
	<div class="container">
		<p style="text-align: center;">
						Developed By Team <strong><a href="#!">RPL SMKN 1 Dlanggu</a></strong> <br>
						Supported By<a href="http://www.facebook.com/bangadam123" target="_blank"> Bangadam.dev</a>
		</p>
	</div>

<!-- jQuery 2.2.3 -->
<script src="{{ URL::to('vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ URL::to('js/bootstrap.min.js') }}"></script>

</body>
</html>
