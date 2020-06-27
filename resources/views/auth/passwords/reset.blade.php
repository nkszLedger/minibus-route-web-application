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
<body class="hold-transition theme-fruit bg-img" style=" background-image: linear-gradient(to right top, #050e5e, #321783, #5d1da7, #8a1dca, #bc12eb);">
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
							<h2 class="text-white">RESET PASSWORD</h2>
						</div>
                        
						<div class="p-30">
							<form action="{{ route('password.update') }}" method="POST">
								@csrf
                                <input type="hidden" class="form-control" name="token" value="{{$token ?? ''}}">
                                <div class="form-group">
                                    @if (count($errors) > 0)
                                        <div class="text-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                @if( isset($message) )
                                    <div class="form-group">
                                        <h6 class="text-danger text-center">
                                            {{ $message }}
                                        </h6>
                                    </div>
                                @endif
                                @if( isset($token) )
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text text-white bg-transparent">
												<i class="ti-lock"></i>
											</span>
										</div>
										<input type="password" id="password"
											class="form-control pl-15 bg-transparent text-white plc-white" 
											name="password" placeholder="password" value="{{ old('password') }}"
                                            required data-validation-required-message="This field is required">
									</div>
								</div>
                                <div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text text-white bg-transparent">
												<i class="ti-lock"></i>
											</span>
										</div>
										<input type="password" id="confirm-password" required 
											class="form-control pl-15 bg-transparent text-white plc-white" 
											name="confirm-password" placeholder="confirm-password"
                                            data-validation-match-match="password">
									</div>
								</div>
                                
                                <div class="form-group">
                                    <h6 class="text-white text-center">
                                        Must be at least 8 characters in length. 
                                    </h6>
                                    <h6 class="text-white text-center">
                                        Must be at most 20 characters in length
                                    </h6>
                                    <h6 class="text-white text-center">
                                        Must contain at least one lowercase letter.
                                    </h6>
                                    <h6 class="text-white text-center">
                                        Must contain at least one uppercase letter.
                                    </h6>
                                    <h6 class="text-white text-center">
                                        Must contain at least one digit.  
                                    </h6>
                                    <h6 class="text-white text-center">
                                        Must contain a special character
                                    </h6>
                                </div>
                                <!-- /.col -->
                                
                                <div class="form-group">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-warning btn-outline mt-10">
                                            Reset 
                                        </button>
                                    </div>
                                </div>
                                @else
                                <div class="form-group">
                                    <div class="col-12 text-center">
                                        <a class="btn btn-warning btn-outline mt-10" 
                                            href="{{ route('login')}}">
                                                Cancel
                                        </a>
                                    </div>
                                </div>
                                @endif
                                <!-- /.col -->
							</form>
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

    <!-- SlimScroll -->
	<script src="/minibus/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	
	<!-- FastClick -->
	<script src="/minibus/assets/vendor_components/fastclick/lib/fastclick.js"></script>
    
    <!-- Validation -->
    <script src="/minibus/main/js/pages/form-validation.js"></script>
    <script src="/minibus/main/js/pages/validation.js"></script>

	<!-- Login -->
	<script src="/minibus/main/js/pages/login.js"></script>
    

</body>
</html>
