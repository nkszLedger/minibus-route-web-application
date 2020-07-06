@extends('datacapturer.home')

@section('content')

<section class="content">
	<div class="row">
		<div class="col-12">
			<!-- Validation wizard -->
			<div class="box box-default">
				<div class="box-header with-border">
					<h4 class="box-title" id="title">User Registration: Create User Profile</h4>
					<h4 class="box-subtitle">Complete the following details to create profile</h4>
				</div>
				<!-- /.box-header -->
				<div class="box-body wizard-content">
					<form action="{{ route('users.update', $user->id) }}" method="POST" 
						id="user-form" class="validation-wizard wizard-circle" 
							enctype='multipart/form-data'>
                        <?php echo method_field('PUT'); ?>
						{{ csrf_field() }}
						<!-- Step 1 -->
						<hr class="mb-15 mt-0">
						<h4 class="box-title text-info"><i class="ti-user mr-15"></i> User Profile</h4>
                        <h6 class="box-subtitle text-danger text-center" id="error_on_create_user">
							@if (count($errors) > 0)
								<div class="text-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
						</h6>
						<hr class="mb-15 mt-0">
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wfirstName2"> First Name : 
											<span class="text-danger">*</span> 
										</label>
										<input type="text" class="form-control" 
										id="wfirstName2" name="name" maxlength="25" 
										value="{{ old('firstName') ?? $user->name ?? ''}}" 
										required data-validation-required-message="This field is required">  
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlastName2"> Last Name : 
											<span class="text-danger">*</span> 
										</label>
										<input type="text" class="form-control" id="wlastName2" 
										name="surname" maxlength="25" 
										value="{{ old('lastName') ?? $user->surname ?? ''}}"
										required data-validation-required-message="This field is required">  
									</div>
								</div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wemailAddress2"> Email Address :</label>
                                        <input type="email" class="form-control" id="wemailAddress2" 
                                            name="email" maxlength="25" 
                                            value="{{ old('emailAddress') ?? $user->email ?? ''}}" 
                                            required data-validation-required-message="This field is required"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5 for="role">System User Role: 
                                            <span class="text-danger">*</span> 
                                        </h5>
                                        <select class="custom-select form-control required" 
                                            id="role" name="role" required>
											
                                            <option value="{{ $user['roles'][0]['pivot']['role_id'] }}">
                                                Role - {{ $user->getRoleNames()->first() }}
                                            </option>
                                            @foreach($all_roles as $role)
                                                @if( $role->id !== $user['roles'][0]['pivot']['role_id'] )
                                                    <option value="{{ $role->id }}">
														Role - {{ $role->name }}
													</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
						    </section>
                        </div>
                         
                        <div class="box-footer with-border">
                            <div class="row">
                                <div class="col-6 text-right">
                                    <input class="btn btn-info mb-5" type="submit" id="submit" value="Update">
                                </div>
                                <div class="col-6 text-left">
                                    <a class="btn btn-warning mb-5" href="{{ route('users.index')}}">Cancel</a>
                                </div>
                            </div>
                        </div>
					</form>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>

</section>

@endsection
