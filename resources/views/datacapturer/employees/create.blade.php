@extends('datacapturer.home')

@section('content')
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Cadets Management</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">
                                    Registration of cadets assisting with COVID-19 disinfection and PPE 
                                    distribution at Gauteng Taxi Ranks
                                </li>
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
                      @if( isset($employee) )
                      <form method="POST" action= "{{ route('employees.update', $employee->id) }}">
                        <?php echo method_field('PUT'); ?>
                      @else
                      <form method="POST" action= "{{ route('employees.store') }}">
                      @endif
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{$employee->id ?? '' }}">
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
                        <h4 class="box-title text-info">
                            <i class="ti-user mr-15"></i> Organizational Demography
                        </h4>
						<hr class="mb-15 mt-0">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5><b>Region: </b><span class="text-danger">*</span> </h5>
                                    <select class="custom-select form-control required" 
                                        id="eregion" name="eregion" required>
                                        @if( isset($employee))
                                            <option value="{{$employee['region']['region_id']}}">
                                                {{$employee['region']['region_name']}}
                                            </option>
                                            @foreach ($all_regions as $region)
                                                @if( $region->region_id != $employee['region']['region_id'] )
                                                    <option value="{{$region->region_id}}">
                                                        {{$region->region_name}}
                                                    </option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">Please select Region</option>
                                            @foreach ($all_regions as $region)
                                                <option value="{{$region->region_id}}">
                                                    {{$region->region_name}}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5> <b>Association :</b>
                                        <span class="text-danger">*</span>  
                                    </h5>
                                    <select class="custom-select form-control " 
                                        id="eassociation" name="eassociation">
                                        @if( isset($organization) )
                                            <option value="{{ $organization['association']['association_id'] }}">
                                                {{ $organization['association']['name'] }}
                                            </option>
                                        @else
                                            <option value="">Please select Association</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5><b>Association Name: </b>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="association_name" 
                                            maxlength=40 value="{{ old('association_name') ?? 
                                                $organization->association_name ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5><b>Regional Coordinator Name & Surname :</b>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="rcfullname" maxlength=40  
                                            value="{{ old('rcfullname') ?? 
                                                $organization->regional_coordinator_full_name ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5><b>Regional Coordinator's Contact Details :</b>
                                    </h5>
                                    <input type="tel" class="form-control required" id="wphonenumber" 
                                        name="rcphone_number" maxlength="10"  
                                        value="{{ old('rcphone_number') ?? 
                                        $organization->regional_coordinator_contact_details ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5><b> Cadet Taxi Rank : </b>  
                                    </h5>
                                    <select class="custom-select form-control " 
                                        id="etaxirank" name="etaxirank">
                                        @if( isset($organization) )
                                        <option value="{{ $organization['facility']['id'] }}">
                                            {{ $organization['facility']['name'] }}
                                        </option>
                                        @foreach ($all_facilities as $facility)
                                            @if( $facility->id != $organization['facility']['id'] )
                                            <option value="{{ $facility->id }}">
                                                {{ $facility->name }}
                                            </option>
                                            @endif
                                        @endforeach
                                        @else
                                        <option selected value="">Please select Taxi Rank</option>
                                        @foreach ($all_facilities as $facility)
                                            <option value="{{ $facility->id }}">
                                                {{ $facility->name }}
                                            </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="rank" >
                                    <h5><b>Taxi Rank Description: </b></h5>
                                    <textarea rows="10" class="form-control" 
                                        placeholder="Taxi Rank A, Taxi Rank B, etc" 
                                            name="rank"> {{old('rank') ?? $employee->rank ?? ''}}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="sub_taxi_ranks" >
                                    <h5><b>Subordinate Taxi Ranks: </b></h5>
                                    <textarea rows="10" class="form-control" 
                                        placeholder="Taxi Rank A, Taxi Rank B, etc" 
                                            name="sub_taxi_ranks"> 
                                            {{old('sub_taxi_ranks') ?? 
                                                $organization->subordinate_taxi_ranks ?? ''}}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5><b>Taxi Rank Manager Name & Surname : </b>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="rmfullname" maxlength=40
                                                value="{{ old('rmfullname') ?? 
                                                $organization->facility_manager_full_name ?? '' }}" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5><b>Taxi Rank Manager's Contact Details : </b>
                                    </h5>
                                    <input type="tel" class="form-control required" id="wphonenumber" 
                                        name="rmphone_number" maxlength="10" 
                                        value="{{ old('rmphone_number') ?? 
                                                $organization->facility_manager_contact_details ?? '' }}" >
                                </div>
                            </div>

                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="position"><b>Cadet Rank Position : </b>
                                        <span class="text-danger">*</span> 
                                    </h5>
                                    <select class="custom-select form-control" 
                                        id="position" name="position" required>
                                        @if( isset($employee) )
                                            <option value="{{$employee['position']['id']}}">
                                                {{$employee['position']['position']}}
                                            </option>
                                            @foreach ($all_positions as $position)
                                                @if( $position->id != $employee['position']['id'] )
                                                    <option value="{{$position->id}}">
                                                        {{$position->position}}
                                                    </option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">Please Select Position</option>
                                            @foreach ($all_positions as $position)
                                                <option value="{{$position->id}}">
                                                    {{$position->position}}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                        </div>

                        <hr class="mb-15 mt-15">
                        <h4 class="box-title text-info">
                            <i class="ti-user mr-15"></i> 
                                Personal Demography
                        </h4>
						<hr class="mb-15 mt-0">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5><b>Firstname :</b><span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="name" maxlength=40 
                                            required data-validation-required-message="This field is required" 
                                            value="{{ old('name') ?? $employee->name ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5><b>Surname :</b><span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="surname" maxlength=40 
                                            required data-validation-required-message="This field is required" 
                                                value="{{ old('surname') ?? $employee->surname ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5><b>National ID Number :</b><span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="id_number" 
                                            maxlength=13 min=13 id="id_number" 
                                            required data-validation-required-message="This field is required" 
                                            value="{{ old('id_number') ?? $employee->id_number ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="gender"><b>Gender : </b><span class="text-danger">*</span> </h5>
                                    <select class="custom-select form-control" 
                                        id="gender" name="gender" required>
                                        @if( isset($employee) )
                                            <option value="{{$employee['gender']['id']}}">
                                                {{$employee['gender']['type']}}
                                            </option>
                                            @foreach ($all_gender as $gender)
                                                @if( $gender->id != $employee['gender']['id'] )
                                                    <option value="{{$gender->id}}">{{$gender->type}}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">Please Select Gender</option>
                                            @foreach ($all_gender as $gender)
                                                <option value="{{$gender->id}}">{{$gender->type}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5><b>Employee Number :</b></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="employee_number"  
                                                value="{{ old('employee_number') ?? 
                                                $employee->employee_number ?? '' }}" maxlength=20>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="wphoneNumber2"><b>Phone Number : </b>
                                        <span class="text-danger"> *</span>  
                                        </h5>
                                    <input type="tel" class="form-control required" id="wphoneNumber2" 
                                        name="phone_number" maxlength="10" 
                                        value="{{ old('phone_number') ?? $employee->phone_number ?? '' }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5><b>Email Address :</b><span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="email" maxlength=40
                                            required data-validation-required-message="This field is required" 
                                            value="{{ old('email') ?? $employee->email ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="emergency_contact_name"><b>Emergency Contact Name : </b></h5>
                                    <input type="text" class="form-control required" 
                                        id="emergency_contact_name" name="emergency_contact_name" 
                                        maxlength="25" 
                                        value="{{ old('emergency_contact_name') ?? 
                                        $employee->emergency_contact_name ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="emergency_contact_number"><b>Emergency Contact Number : </b> </h5>
                                    <input type="text" class="form-control required" 
                                        id="emergency_contact_number" name="emergency_contact_number" 
                                        maxlength="10" 
                                        value="{{ old('emergency_contact_number') ?? 
                                        $employee->emergency_contact_number ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="emergencycontactrelationship">
                                        <b>Relationship to Cadet: </b>
                                    </h5>
                                    <input type="text" class="form-control required" 
                                        id="emergency_contact_relationship" 
                                        name="emergency_contact_relationship" 
                                        maxlength="25" 
                                        value="{{ old('emergency_contact_relationship') ?? 
                                        $employee->emergency_contact_relationship ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="addressline1"><b>Address Line : </b>
                                        <span class="text-danger"> *</span>  
                                    </h5>
                                    <input type="text" class="form-control required" id="address_line" 
                                        name="address_line" maxlength="25" required 
                                        value="{{ old('address_line') ?? $employee->address_line ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for=surburb"><b>Surburb</b>
                                        <span class="text-danger"> *</span>  </h5>
                                    <input type="text" class="form-control required" id="surburb" 
                                        name="surburb" maxlength="25" required 
                                        value="{{ old('surburb') ?? $employee->surburb ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="postal-code"><b>Postal Code : </b>
                                        <span class="text-danger"> *</span> 
                                    </h5>
                                    <input type="text" class="form-control" 
                                        id="postal_code" name="postal_code" 
                                        maxlength="4" required
                                        value="{{ old('postal_code') ?? $employee->postal_code ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="city"><b>City/Town : </b>
                                        <span class="text-danger"> *</span> 
                                    </h5>
                                    <select class="custom-select form-control required"
                                         id="city" name="city" required>
                                    @if( isset($employee))
                                        <option selected value="{{$employee['city']['city_id']}}">
                                            {{$employee['city']['city']}}
                                        </option>
                                    @else
                                        <option value="">Please Select City/Town</option>
                                    @endif
                                    @foreach ($all_cities as $city)
                                        @if( isset($employee))
                                            @if($city->id !== $employee->city_id)
                                                <option value="{{$city->city_id}}">
                                                    {{$city->city}}
                                                </option>
                                            @endif
                                        @else
                                            <option value="{{$city->city_id}}">{{$city->city}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="province"><b>Province : </b>
                                        <span class="text-danger"> *</span> 
                                    </h5>
                                    <select class="custom-select form-control required" 
                                        id="province" name="province" required>
                                    @if( isset($employee))
                                        <option selected value="{{$employee['province']['id']}}">
                                            {{$employee['province']['name']}}
                                        </option>
                                    @else
                                        <option value="">Please Select Province</option>
                                    @endif
                                    @foreach ($all_provinces as $province)
                                        @if( isset($employee))
                                            @if($province->id !== $employee->province_id)
                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                            @endif
                                        @else
                                            <option value="{{$province->id}}">{{$province->name}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    
                        <div class="box-footer text-right">
                            <a class="btn btn-warning mb-5" href="{{ route('employees.index') }}">
                                Cancel
                            </a>
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
