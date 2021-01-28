@extends('datacapturer.home')

@section('content')
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Military Veteran Cadets Management</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">
                                    Registration of cadets assisting with COVID-19 disinfection and PPE 
                                    distribution for Military Veterans
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
                <b>
                    @if( isset($military_veteran) )
                        Military Veteran Registration: Update Veteran Profile
                    @else
                        Military Veteran Registration: Create Veteran Profile
                    @endif
                </b>
              </h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                  <div class="row">
                    <div class="col-12">
                      @if( isset($military_veteran) )
                      <form method="POST" action= "{{ route('military-veterans.update', $military_veteran->id) }}">
                        <?php echo method_field('PUT'); ?>
                      @else
                      <form method="POST" action= "{{ route('military-veterans.store') }}">
                      @endif
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{$military_veteran->id ?? '' }}">
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
                                         style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                        id="mvregion" name="mvregion" required>
                                        @if( isset($military_veteran))
                                            <option value="{{$military_veteran['region']['region_id']}}">
                                                {{$military_veteran['region']['region_name']}}
                                            </option>
                                            @foreach ($all_regions as $region)
                                                @if( $region->region_id != $military_veteran['region']['region_id'] )
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
                                    <h5><b>Regional Leader Name & Surname :</b>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" 
                                            style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                            name="region_leader_name" maxlength=40  
                                            value="{{ old('region_leader_name') ?? 
                                                $military_veteran->region_leader_name ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5><b>Regional Leader's Contact Details :</b>
                                    </h5>
                                    <input type="tel" class="form-control required " 
                                        style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                        id="region_leader_contact_number" 
                                        name="region_leader_contact_number" maxlength="10" 
                                        value="{{ old('region_leader_contact_number') ?? 
                                        $military_veteran->region_leader_contact_number ?? '' }}" >
                                </div>
                            </div>
							
							<div class="col-md-6">
								<div class="form-group">
									<h5><b>Number of Delegated Schools : <span class="text-danger">*</span></b></h5>
									<input type="number" name="number_of_delegated_schools" class="form-control" 
                                     style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                        required data-validation-required-message="This field is required" max="25" min="0"
                                        value="{{ old('number_of_delegated_schools') ?? 
                                        $military_veteran->number_of_delegated_schools ?? '' }}">
                                        
									<div class="form-control-feedback"> 
										<small>
											<i>Must be lower than including 25 & more than including 0</i>
										</small> - 
										<small>Add <code>max</code> attribute for maximum number to accept. 
                                        Also use <code>data-validation-max-message</code> 
                                        attribute for max failure message</small> 
									</div>
								</div>
							</div>

                            <div class="col-12">
                                <div class="form-group">
                                    <h5><b>List Deligated schools: <span class="text-danger">*</span></b></h5>
                                    <select class="form-control select2" multiple="multiple" 
                                        data-placeholder=" Select a School" style="width: 100%;">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                    </select>
                                </div>
                                <!-- /.form-group -->
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
                                            style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                            required data-validation-required-message="This field is required" 
                                            value="{{ old('name') ?? $military_veteran->name ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5><b>Surname :</b><span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="surname" maxlength=40 
                                            style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                            required data-validation-required-message="This field is required" 
                                                value="{{ old('surname') ?? $military_veteran->surname ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5><b>National ID Number :</b><span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="id_number" 
                                            style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                            maxlength=13 min=13 id="id_number" 
                                            required data-validation-required-message="This field is required" 
                                            value="{{ old('id_number') ?? $military_veteran->id_number ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="gender"><b>Gender : </b><span class="text-danger">*</span> </h5>
                                    <select class="custom-select form-control" 
                                         style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                        id="gender" name="gender" required>
                                        @if( isset($military_veteran) )
                                            <option value="{{$military_veteran['gender']['id']}}">
                                                {{$military_veteran['gender']['type']}}
                                            </option>
                                            @foreach ($all_gender as $gender)
                                                @if( $gender->id != $military_veteran['gender']['id'] )
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
                                    <h5 for="wphoneNumber2"><b>Phone Number : </b>
                                        <span class="text-danger"> *</span>  
                                        </h5>
                                    <input type="tel" class="form-control required" id="phone_number" 
                                         style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                        name="phone_number" maxlength="10" 
                                        value="{{ old('phone_number') ?? $military_veteran->phone_number ?? '' }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5><b>Email Address :</b><span class="text-danger"> *</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="email" maxlength=40
                                         style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                            required data-validation-required-message="This field is required" 
                                            value="{{ old('email') ?? $military_veteran->email ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="emergency_contact_name"><b>Emergency Contact Name : </b></h5>
                                    <input type="text" class="form-control required" 
                                         style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                        id="emergency_contact_name" name="emergency_contact_name" 
                                        maxlength="25" 
                                        value="{{ old('emergency_contact_name') ?? 
                                        $military_veteran->emergency_contact_name ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="emergency_contact_number"><b>Emergency Contact Number : </b> </h5>
                                    <input type="text" class="form-control" 
                                         style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                        id="emergency_contact_number" name="emergency_contact_number" 
                                        maxlength="10"  
                                        value="{{ old('emergency_contact_number') ?? 
                                        $military_veteran->emergency_contact_number ?? '' }}"
                                        required data-validation-containsnumber-regex="(\d)+" 
                                        data-validation-containsnumber-message="No Characters Allowed, Only Numbers" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="emergencycontactrelationship">
                                        <b>Relationship to Cadet: </b>
                                    </h5>
                                    <input type="text" class="form-control required" 
                                     style="text-transform: uppercase; font-weight: bold; font-size: 18px;" 
                                        id="emergency_contact_relationship" 
                                        name="emergency_contact_relationship" 
                                        maxlength="25" 
                                        value="{{ old('emergency_contact_relationship') ?? 
                                        $military_veteran->emergency_contact_relationship ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="addressline1"><b>Residential Address Line : </b>
                                        <span class="text-danger"> *</span>  
                                    </h5>
                                    <input type="text" class="form-control required" id="address_line" 
                                     style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                        name="address_line" maxlength="25" required 
                                        value="{{ old('address_line') ?? $military_veteran->address_line ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for=surburb"><b>Surburb</b>
                                        <span class="text-danger"> *</span>  </h5>
                                    <input type="text" class="form-control required" id="surburb" 
                                     style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                        name="surburb" maxlength="25" required 
                                        value="{{ old('surburb') ?? $military_veteran->surburb ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="postal-code"><b>Postal Code : </b>
                                        <span class="text-danger"> *</span> 
                                    </h5>
                                    <input type="text" class="form-control" 
                                     style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                        id="postal_code" name="postal_code" 
                                        maxlength="4" required
                                        value="{{ old('postal_code') ?? $military_veteran->postal_code ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 for="city"><b>City/Town : </b>
                                        <span class="text-danger"> *</span> 
                                    </h5>
                                    <select class="custom-select form-control required"
                                         style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                         id="city" name="city" required>
                                    @if( isset($military_veteran))
                                        <option selected value="{{$military_veteran['city']['city_id']}}">
                                            {{$military_veteran['city']['city']}}
                                        </option>
                                    @else
                                        <option value="">Please Select City/Town</option>
                                    @endif
                                    @foreach ($all_cities as $city)
                                        @if( isset($military_veteran))
                                            @if($city->id !== $military_veteran->city_id)
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
                                         style="text-transform: uppercase; font-weight: bold; font-size: 18px;"
                                        id="province" name="province" required>
                                    @if( isset($military_veteran))
                                        <option selected value="{{$military_veteran['province']['id']}}">
                                            {{$military_veteran['province']['name']}}
                                        </option>
                                    @else
                                        <option value="">Please Select Province</option>
                                    @endif
                                    @foreach ($all_provinces as $province)
                                        @if( isset($military_veteran))
                                            @if($province->id !== $military_veteran->province_id)
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
                            <a class="btn btn-warning mb-5" href="{{ route('military-veterans.index') }}">
                                Cancel
                            </a>
                            @if( isset($military_veteran) )
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
