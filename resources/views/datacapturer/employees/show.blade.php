@extends('datacapturer.home')

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
                    Employee Management: Employee Profile
              </h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                  <div class="row">
                    <div class="col-12">
                      <form method="GET" action= "{{ route('employees.edit', $employee->id) }}">
                        <input type="hidden" class="form-control" name="id" value="{{$employee->id }}">
                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i> About Employee</h4>
						<hr class="mb-15 mt-0">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Firstname :<span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="name" 
                                            required data-validation-required-message="This field is required" 
                                                value="{{$employee->name }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Surname :<span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="surname" 
                                            required data-validation-required-message="This field is required" 
                                                value="{{$employee->surname }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>National ID Number :<span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="id_number" 
                                            required data-validation-required-message="This field is required"
                                                 value="{{$employee->id_number }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="gender">Gender : <span class="text-danger">*</span> </h5>
                                    <select class="custom-select form-control" 
                                        id="gender" name="gender" disabled>
                                            <option value="{{$employee['gender']['id']}}">
                                                {{$employee['gender']['type']}}
                                            </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Employee Number :<span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="employee_number"
                                             required data-validation-required-message="This field is required" 
                                                value="{{$employee->employee_number }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="gender">Rank Position : <span class="text-danger">*</span> </h5>
                                    <select class="custom-select form-control" 
                                        id="gender" name="gender" disabled>
                                            <option value="{{$employee['position']['id']}}">
                                                {{$employee['position']['position']}}
                                            </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="rank" >
                                    <label for="rank">Taxi Rank : 
                                        <span class="text-danger">*</span> 
                                    </label>
                                    <textarea class="form-control" 
                                        placeholder="Taxi Rank A, Taxi Rank B, etc" 
                                            name="rank" readonly> {{ $employee->rank ?? ''}}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="wphoneNumber2">Phone Number : <span class="text-danger"> *</span>  </h5>
                                    <input type="tel" class="form-control required" id="wphoneNumber2" 
                                        name="phone_number" maxlength="10" 
                                            value="{{$employee->phone_number }}" readonly>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Email Address :<span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="email" 
                                            required data-validation-required-message="This field is required" 
                                            value="{{$employee->email }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="emergency_contact_name">Emergency Contact Name : 
                                        <span class="text-danger"> *</span>  
                                    </h5>
                                    <input type="text" class="form-control required" 
                                        id="emergency_contact_name" name="emergency_contact_name" maxlength="25" 
                                        value="{{$employee->emergency_contact_name }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="emergency_contact_number">Emergency Contact Number : 
                                        <span class="text-danger"> *</span>  
                                    </h5>
                                    <input type="text" class="form-control required" 
                                        id="emergency_contact_number" name="emergency_contact_number" 
                                        maxlength="10" value="{{$employee->emergency_contact_number }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="emergencycontactrelationship">Emergency Contact Relationship : 
                                        <span class="text-danger"> *</span>  
                                    </h5>
                                    <input type="text" class="form-control required" 
                                        id="emergency_contact_relationship" name="emergency_contact_relationship" 
                                        maxlength="25" value="{{$employee->emergency_contact_relationship }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="addressline1">Address Line : <span class="text-danger"> *</span>  </h5>
                                    <input type="text" class="form-control required" id="address_line" 
                                        name="address_line" maxlength="25" value="{{$employee->address_line }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for=surburb">Surburb<span class="text-danger"> *</span>  </h5>
                                    <input type="text" class="form-control required" id="surburb" 
                                        name="surburb" maxlength="25" value="{{$employee->surburb }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="postal-code">Postal Code : <span class="text-danger"> *</span> </h5>
                                    <input type="text" class="form-control" id="postal_code" name="postal_code"
                                         maxlength="4" value="{{$employee->postal_code }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="city">City/Town : <span class="text-danger"> *</span> </h5>
                                    <select class="custom-select form-control required" id="city" name="city" disabled>
                                        <option selected value="{{$employee['city']['city_id']}}">
                                            {{$employee['city']['city']}}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="eregion">Region: <span class="text-danger">*</span> </h5>
                                    <select class="custom-select form-control required" id="eregion" name="eregion" disabled>
                                        <option value="{{$employee['region']['region_id']}}">
                                            {{$employee['region']['region_name']}}
                                        </option>
                                    </select>
                                </div>
							</div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="province">Province : <span class="text-danger"> *</span> </h5>
                                    <select class="custom-select form-control required" id="province" name="province" disabled>
                                        <option selected value="{{$employee['province']['id']}}">
                                            {{$employee['province']['name']}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr class="mb-15 mt-0">
                        <h4 class="box-title text-info"><i class="ti-eye mr-15"></i> Biometrics Captured</h4>
                        <hr class="mb-15 mt-0">
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @if( isset($portrait[0]['id']) )
                                        <label> Portrait : (Captured) </label>
                                        <img src="/minibus/portrait-green.png" height="225" width="225">
                                        @else
                                        <label> Portrait : (Not Captured) </label>
                                        <img src="/minibus/portrait-grey.png" height="225" width="225">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @if( isset($fingerprint[0]['id']) )
                                        <label> Fingerprint: (Captured) </label>
                                        <img src="/minibus/fingerprint-green.jpg" height="225" width="225">
                                        @else
                                        <label> Fingerprint: (Not Captured) </label>
                                        <img src="/minibus/fingerprint-gey.png" height="225" width="225">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </section>
                    
                        <div class="box-footer text-right">
                            <a class="btn btn-warning mb-5" href="{{ route('employees.index') }}">
                                Cancel
                            </a>
                            <input class="btn btn-info mb-5" type="submit" value="Edit">
                        </div> 
                        
                      </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
    </section>

@endsection
