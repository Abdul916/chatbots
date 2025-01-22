<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ get_section_content('project', 'site_title') }} | Forgot Password | Administrator</title>
	<link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_assets/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_assets/css/custom.css') }}" rel="stylesheet">
	<link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">
</head>
<body class="gray-bg d-flex justify-content-center align-items-center">
	<div class="middle-box text-center loginscreen animated fadeInDown">
		<div class="ibox-content">
			<div class="col-lg-12 my-3">
				<img class="img-responsive" src="{{ asset('assets/img/logo.png') }}" alt="logo" style="max-width: 241px;">
			</div>
			<h2 class="font-bold">Forgot password</h2>
			<p>
				Enter your email address and your password will be reset and emailed to you.
			</p>

			<div class="row">
				<div class="col-lg-12">
					@if(session()->has('errors'))
					<div class="single-input-item">
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							@foreach ($errors->all() as $error)
							<li style="list-style: none">{{ $error }}</li>
							@endforeach
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					@endif

					@if(session()->has('success'))
					<div class="single-input-item">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<li style="list-style: none">{{ session('success') }}</li>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					@endif


					<form class="m-t" role="form" method="post" action="{{ route('admin.reset_password') }}">
						@csrf
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="Email address" required="">
						</div>
						<button type="submit" class="btn btn-primary block full-width m-b">Send new password</button>
						<a href="{{ route('login') }}"><span>Back to login!</span></a>
					</form>
				</div>
			</div>
			<hr>
			<p class="m-t"> <span>{{ get_section_content('project', 'site_title') }} &copy; {{ date("Y") }}</span> </p>
		</div>
	</div>
	<script src="{{ asset('admin_assets/js/jquery-3.1.1.min.js') }}"></script>
	<script src="{{ asset('admin_assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('admin_assets/js/bootstrap.js') }}"></script>
</body>
</html>