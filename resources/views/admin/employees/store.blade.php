@extends('admin/home')

@section('content')
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Employee Registration</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">System Access & Profile</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">
                @if( isset($employee) )
                    Employee Registration: Update Employee Profile
                @else
                    Employee Registration: Create Employee Profile
                @endif
              </h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                  <div class="row">
                    <div class="col-12">
                      <form type="POST" action= "{{ route('employees.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" class="form-control" name="id" value="{{$employee->id ?? '' }}">
                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i> About Employee</h4>
						<hr class="mb-15 mt-0">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Firstname :<span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="name" required data-validation-required-message="This field is required" value="{{$employee->name ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Surname :<span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="surname" required data-validation-required-message="This field is required" value="{{$employee->surname ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Employee Number :<span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="employee_number" required data-validation-required-message="This field is required" value="{{$employee->employee_id ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>National ID Number :<span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="id_number" required data-validation-required-message="This field is required" value="{{$employee->id_number ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Email Address :<span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="email" required data-validation-required-message="This field is required" value="{{$employee->email ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="wphoneNumber2">Phone Number : <span class="text-danger"> *</span>  </h5>
                                    <input type="tel" class="form-control required" id="wphoneNumber2" name="phone_number" maxlength="10" value="{{$employee->phone_number ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="addressline1">Address Line : <span class="text-danger"> *</span>  </h5>
                                    <input type="text" class="form-control required" id="address_line" name="address_line" maxlength="25" value="{{$employee->address_line ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="postal-code">Postal Code : <span class="text-danger"> *</span> </h5>
                                    <input type="text" class="form-control" id="postal_code" name="postal_code" maxlength="4" value="{{$employee->postal_code ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="city">City/Town : <span class="text-danger"> *</span> </h5>
                                    <select class="custom-select form-control required" id="city" name="city">
                                    @if( isset($employee))
                                        <option selected value="{{$employee['city']['city_id']}}">{{$employee['city']['city']}}</option>
                                    @else
                                        <option value="">Please Select City/Town</option>
                                    @endif
                                    @foreach ($all_cities as $city)
                                        @if( isset($employee))
                                            @if($city->id !== $employee->city_id)
                                                <option value="{{$city->city_id}}">{{$city->city}}</option>
                                            @endif
                                        @else
                                            <option value="{{$city->city_id}}">{{$city->city}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    
                        <h4 class="box-title text-info mt-15"><i class="ti-envelope mr-15"></i> System Access</h4>
						<hr class="mb-15 mt-10">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <h5>Select User Role</h5>
                                    <div class="c-inputs-stacked">
                                        @foreach($all_roles as $key => $role)
                                            <div class="radio">
                                                @if( isset($employee) )
                                                    @if( $user[0]['role_id'] === $role->id )
                                                        <input name="group{{ $role->id }}" type="radio" id="Option_{{ $role->id }}" value="{{ $role->id }}" checked>
                                                    @else
                                                        <input name="group{{ $role->id }}" type="radio" id="Option_{{ $role->id }}" value="{{ $role->id }}">
                                                    @endif
                                                @else
                                                    <input name="group{{ $role->id }}" type="radio" id="Option_{{ $role->id }}" value="{{ $role->id }}">
                                                @endif
                                                    <label for="Option_{{ $role->id }}"> {{ $role->name }} </label>                    
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer text-right">
                            <a class="btn btn-warning mb-5" href="{{ route('users.index') }}">Cancel</a>
                            @if( isset($employee) )
                                <input class="btn btn-info mb-5" type="submit" value="Update" />
                            @else
                                <input class="btn btn-info mb-5" type="submit" value="Submit" />
                            @endif
                        </div> 
                        
                      </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
    </section>

@endsection
