<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/minibus/images/favicon.ico">

    <title> MiniBus Taxi Registration</title>
  
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="/minibus/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	
	<!-- theme style -->
	<link rel="stylesheet" href="/minibus/main/css/horizontal-menu.css">
	
	<!-- theme style -->
	<link rel="stylesheet" href="/minibus/main/css/style.css">
	
	<!-- VoiceX Admin skins -->
	<link rel="stylesheet" href="/minibus/main/css/skin_color.css">	

</head>
<body class="hold-transition theme-fruit bg-img" style="background-image: linear-gradient(to right top, #050e5e, #321783, #5d1da7, #8a1dca, #bc12eb);">
	
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
							<h2 class="text-white">New User Registration</h2>						
						</div>
						<div class="p-30">
							<form action="{{ route('register') }}" method="POST">
                                @csrf
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text text-white bg-transparent">
                                                <i class="ti-user"></i>
                                            </span>
										</div>
										<input type="text" class="form-control pl-15 bg-transparent text-white plc-white" 
                                            placeholder="Name" name="name">
									</div>
								</div>

                                <div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text text-white bg-transparent">
                                                <i class="ti-user"></i>
                                            </span>
										</div>
										<input type="text" class="form-control pl-15 bg-transparent text-white plc-white" 
                                            placeholder="Surname" name="surname">
									</div>
								</div>

                                <div class="form-group">
									<div class="input-group mb-3">
										<select class="custom-select form-control required" id="role" name="role">
                                        @if( isset($user))
                                            <option value="{{$user->role}}">
                                                Role - {{$employee['role']['name']}}
                                            </option>
                                        @else
                                            <option value="">Please Select Role</option>
                                        @endif
                                        @foreach ($all_roles as $role)
                                            @if( isset($employee))
                                                @if($role->id !== $employee['role']['id'])
                                                    <option value="{{$role->id}}">Role - {{$role->name}}</option>
                                                @endif
                                            @else
                                                <option value="{{$role->id}}">Role - {{$role->name}}</option>
                                            @endif
                                        @endforeach
                                        </select>
									</div>
								</div>

								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text text-white bg-transparent"><i class="ti-email"></i></span>
										</div>
										<input type="email" class="form-control pl-15 bg-transparent text-white plc-white" 
                                            placeholder="Email" name="email">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text text-white bg-transparent"><i class="ti-lock"></i></span>
										</div>
										<input type="password" class="form-control pl-15 bg-transparent text-white plc-white" 
                                            placeholder="Password" name="password">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text text-white bg-transparent"><i class="ti-lock"></i></span>
										</div>
										<input type="password" class="form-control pl-15 bg-transparent text-white plc-white" 
                                            placeholder="Retype password" name="confirmed">
									</div>
								</div>
								  <div class="row">
									<div class="col-12">
									  <div class="checkbox">
										<input type="checkbox" id="basic_checkbox_1" class="filled-in chk-col-danger" checked="">
										<label for="basic_checkbox_1" class=" text-white">I agree to the 
                                            <a href="#" class="text-danger"><b>Terms & Conditions</b></a>
                                        </label>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-12 text-center">
									  <button type="submit" class="btn mt-10 btn-warning btn-outline">SIGN UP</button>
									</div>
									<!-- /.col -->
								  </div>
							</form>														
							
							<div class="text-center text-white">
								<p class="mt-15 mb-0">Already have an account? 
                                    <a href="{{ route('login') }}" class="text-white m-l-5">Sign In</a>
                                </p>
							</div>

                            
                            <!-- Modal -->
                            <div id="message" class="modal fade modal-warning" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"></h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>{{ $message ?? ''}} </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default float-right" 
                                                data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
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
	
	<!-- Bootstrap 4.0-->
	<script src="/minibus/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>

