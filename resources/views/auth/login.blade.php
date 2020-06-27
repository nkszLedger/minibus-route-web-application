<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../minibus/images/favicon.ico">

    <title> MiniBus Taxi Registration</title>

	<!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="/minibus/assets/vendor_components/bootstrap/dist/css/bootstrap.css">

	<!-- theme style -->
	<link rel="stylesheet" href="/minibus/main/css/horizontal-menu.css">

	<!-- theme style -->
	<link rel="stylesheet" href="/minibus/main/css/style.css">

	<!-- VoiceX Admin skins -->
	<link rel="stylesheet" href="/minibus/main/css/skin_color.css">

</head>
<body class="hold-transition theme-fruit bg-img" 
	style=" background-image: linear-gradient(to right top, #050e5e, #321783, #5d1da7, #8a1dca, #bc12eb);">
	<div class="h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">
			<div class="col-lg-8 col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-xl-4 col-lg-7 col-md-6 col-12">
						<div class="content-top-agile p-10">
							<div class="logo">
								<a href="#" class="aut-logo my-40 d-block">
									<img src="/minibus/images/taxi.png"  alt="">
								</a>
							</div>
							<h2 class="text-white">MINIBUS TAXI REGISTRATION</h2>
							<h6>
								<span class="text-danger" id="error">
								@if($errors->has('errors')) 
									{{ $errors->first('errors') }} 
								@endif
								<span>
								@if( isset($message) )
								<span class="text-info" id="info">
								@if( $message->has('success')) 
									{{ $message->first('success') }} 
								@endif
								<span>
								@endif
							</h6>
						</div>
						<div class="p-30">
							<form action="{{ route('login') }}" method="POST">
								@csrf
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text text-white bg-transparent">
												<i class="ti-user"></i>
											</span>
										</div>
										<input type="text" 
											class="form-control pl-15 bg-transparent text-white plc-white" 
											name="email" placeholder="Username" value="{{ old('email') }}">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text text-white bg-transparent">
												<i class="ti-lock"></i>
											</span>
										</div>
										<input type="password" 
											class="form-control pl-15 bg-transparent text-white plc-white" 
											name="password" placeholder="Password">
									</div>
								</div>
								  <div class="row">
									<div class="col-6">
									  <div class="checkbox text-white">
										<input type="checkbox" id="basic_checkbox_1" 
											class="filled-in chk-col-danger" 
											name="remember" checked="">
										<label for="basic_checkbox_1">Remember Me</label>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-6">
									 <div class="fog-pwd text-right">
										<a href="{{ route('password.request') }}" 
											class="hover-info text-white">
												<i class="ion ion-locked"></i> Forgot password?
										</a><br>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-12 text-center">
									  <button type="submit" class="btn btn-warning btn-outline mt-10">SIGN IN</button>
									</div>
									<!-- /.col -->
								  </div>
							</form>
							{{-- <div class="text-center text-white">
								<p class="mt-15 mb-0">Don't have an account? 
									<a href="{{ route('register') }}" 
										class="text-white ml-5">Sign Up
									</a>
								</p>
							</div> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- jQuery 3 -->
    <script src="/minibus/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

	<!-- fullscreen -->
    <script src="/minibus/assets/vendor_components/screenfull/screenfull.js"></script>
	<!-- popper -->
	<script src="/minibus/assets/vendor_components/popper/dist/popper.min.js"></script>

	<!-- Bootstrap 4.0 -->
	<script src="/minibus/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Login -->
	<script src="/minibus/main/js/pages/login.js"></script>

</body>
</html>
