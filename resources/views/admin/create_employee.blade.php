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
              <h4 class="box-title">Create Employee Profile</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                  <div class="row">
                    <div class="col-12">
                      <form type="POST" action= "{{ route('create_employee') }}">
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
                                        <input type="text" class="form-control" name="idnumber" required data-validation-required-message="This field is required" value="{{$employee->id_number ?? '' }}">
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
                                    <input type="tel" class="form-control required" id="wphoneNumber2" name="phonenumber" maxlength="10" value="{{$employee->phone_number ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="addressline1">Address Line : <span class="text-danger"> *</span>  </h5>
                                    <input type="text" class="form-control required" id="addressline1" name="addressline1" maxlength="25" value="{{$employee->address_line ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="postal-code">Postal Code : <span class="text-danger"> *</span> </h5>
                                    <input type="text" class="form-control" id="postal-code" name="postal-code" maxlength="4" value="{{$employee->postal_code ?? '' }}">
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
                                        <div class="radio">
                                            <input name="group1" type="radio" id="Option_1" checked>
                                            <label for="Option_1"> NONE - This employee must not have access</label>                    
                                        </div>

                                        <div class="radio">
                                            <input name="group1" type="radio" id="Option_2" >
                                            <label for="Option_2"> ADMINISTRATOR - This employee shall register new employees, Create, Update, Remove Employees & Deactivate System users ONLY</label>   
                                        </div>

                                        <div class="radio">
                                            <input name="group1" type="radio" id="Option_3">
                                            <label for="Option_3"> CLERK - This employee shall register MiniBus Operators, Owners & Drivers ONLY</label> 
                                        </div>

                                        <div class="radio">
                                            <input name="group1" type="radio" id="Option_4" >
                                            <label for="Option_4"> AUDITOR - This employee shall VIEW Dashboard, MiniBus Operators, Owners & Drivers ONLY</label> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer text-right">
                            <a class="btn btn-warning mb-5" href="/users">Cancel</a>
                            <input class="btn btn-info mb-5" type="submit" value="Submit" />
                        </div> 
                        
                      </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
    </section>

@endsection
