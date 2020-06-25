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
					@if( isset($user) )
					<form action="{{ route('users.edit', $user->id) }}" method="GET" 
						id="user-form" class="form">
					@else
					<form action="{{ route('users.store') }}" method="POST" 
						id="user-form" class="form">
					@endif
						{{ csrf_field() }}

						<!-- Step 1 -->
						<hr class="mb-15 mt-0">
						<h4 class="box-title text-info"><i class="ti-user mr-15"></i> User Profile</h4>
                        <h6 class="box-subtitle text-danger text-center" id="error_on_create_user">
							{{ $errors }}
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
										{{ isset($user) ? 'readonly' : '' }}
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
										{{ isset($user) ? 'readonly' : '' }} 
										required data-validation-required-message="This field is required">  
									</div>
								</div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wemailAddress2"> Email Address :</label>
                                        <input type="email" class="form-control" id="wemailAddress2" 
                                            name="email" maxlength="25" 
                                            value="{{ old('emailAddress') ?? $user->email ?? ''}}"
                                            {{ isset($user) ? 'readonly' : '' }} 
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
                                        @if( isset($user))
                                            <option value="{{$user->role}}">
                                                Role - {{ $user->getRoleNames()->first() }}
                                            </option>
                                        @else
                                            <option value="">Please Select Role</option>
                                        @endif
                                        @foreach ($all_roles as $role)
                                            @if( isset($user))
                                                @if($role->id !== $user['role']['id'])
                                                    <option value="{{$role->id}}">
                                                        Role - {{ $user->getRoleNames()->first() }}
                                                    </option>
                                                @endif
                                            @else
                                                <option value="{{$role->id}}">
                                                    Role - {{ $user->getRoleNames()->first() }}
                                                </option>
                                            @endif
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
						    </section>
                        </div>
                         
                        <div class="box-footer with-border">
                            @if( isset($user) )
                            <div class="row">
                                <div class="col-6 text-right">
                                    <input class="btn btn-info mb-5" type="submit" value="Edit">
                                </div>
                                <div class="col-6 text-left">
                                    <a class="btn btn-warning mb-5" href="{{ route('users.index')}}">Cancel</a>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-6 text-right">
                                    <input class="btn btn-info mb-5" type="submit" id="submit" value="Submit">
                                </div>
                                <div class="col-6 text-left">
                                    <a class="btn btn-warning mb-5" href="{{ route('users.index')}}">Cancel</a>
                                </div>
                            </div>
                            @endif
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
