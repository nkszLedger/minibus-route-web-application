@extends('datacapturer.home')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title"> Member Management: UPDATE Member Profile</h4>
					    <h4 class="box-subtitle">Current Member details</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <h4 class="box-title text-info"><i class="ti-target mr-15"></i> Member Type</h4>
						<hr class="mb-15 mt-0">
						<section>
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="membership-type"> Selected Type of Member : </label>
										<select class="custom-select form-control required" readonly 
											id="membership-type" name="membership-type">
											<option selected value="{{ $member_record['membership_type']['id'] }}">
												{{ $member_record['membership_type']['membership_type'] }}
											</option>		
										</select>
									</div>
								</div>
                                
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="licensenumber">Driver's License Number :</label>
                                        <input type="text" class="form-control required" 
											{{ (count($driver) == 0) ? 'readonly' : '' }} 
											id="updatelicensenumber" value="{{$driver[0]['license_id'] ?? ''}}" 
											name="licensenumber" > 
									</div>
                                </div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="operatinglicensenumber">Operating License Number : </label>
										<input type="text" class="form-control required"  
											{{ (count($operator) == 0) ? 'readonly' : '' }} 
											id="updateoperatinglicensenumber" value="{{$operator[0]['license_id'] ?? ''}}" 
											name="operatinglicensenumber" >
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Operating License</label>
										<label class="file">
                                            @if( isset($operator[0]['license_path']) )
											<input type="file" id="updateoperatinglicensefile" name="operatinglicensefile" title="{{ $operator[0]['license_path'] }}" >
                                            @else
                                            <input type="file" id="updateoperatinglicensefile" name="operatinglicensefile" title="No file uploaded" >
                                            @endif
										</label>
									</div>
									<div class="form-group">
										<div class="checkbox checkbox-success">
                                            @if( $member_record->is_member_associated )
											    <input id="isMemberAssociated" type="checkbox" checked disabled>
                                                <label for="isMemberAssociated"> This member <span class="text-danger">BELONGS</span> to an association</label>
                                            @else
                                                <input id="isMemberAssociated" type="checkbox" disabled>
                                                <label for="isMemberAssociated"> This member <span class="text-danger">DOES NOT</span> belong to any association</label>
                                            @endif
										</div>
									</div>
								</div>

							</div>
						</section>

                        <hr class="mb-15 mt-0">
						<h4 class="box-title text-info"><i class="ti-user mr-15"></i> Personal Details</h4>
						<hr class="mb-15 mt-0">
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wfirstName2"> First Name : </label>
                                        <input type="text" class="form-control required"  id="wfirstName2" value="{{$member_record->name}}" name="firstName">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wlastName2"> Last Name : </label>
                                        <input type="text" class="form-control required"  id="wlastName2" value="{{$member_record->surname}}" name="lastName">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="idnumber"> ID Number </label>
                                        <input type="text" class="form-control required"  id="idnumber" value="{{$member_record->id_number}}" name="idnumber"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wemailAddress2"> Email Address :</label>
                                        <input type="email" class="form-control"  id="emailAddress" value="{{$member_record->email}}" name="emailAddress"> </div>
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wphoneNumber2">Phone Number : </label>
                                        <input type="tel" class="form-control required"  id="phonenumber" value="{{$member_record->phone_number}}" name="phonenumber"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="addressline1">Address Line : </label>
                                        <input type="text" class="form-control required"  id="addressline1" value="{{$member_record->address_line}}" name="addressline1"> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City/Town : </label>
                                        <select class="custom-select form-control" id="city" name="city">
                                            <option selected value="{{$member_record['city']['city_id']}}">{{$member_record['city']['city']}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="postal-code">Postal Code : </label>
										<input type="text" class="form-control"  id="postal-code" value="{{$member_record->postal_code}}">
									</div>
								</div>
                            </div>

                        </section>
                            
						<hr class="mb-15 mt-0">
						<h4 class="box-title text-info"><i class="ti-car mr-15"></i> Vehicle Details</h4>
						<hr class="mb-15 mt-0">
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="regnumber">Registration Number : </label>
                                        <input type="text" class="form-control required"  id="regnumber" value="{{ $vehicle[0]['registration_number'] }}" name="regnumber">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="vehiclemake">Make : </label>
                                        <input type="text" class="form-control required"   id="vehiclemake" value="{{ $vehicle[0]['make'] }}" name="vehiclemake"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="vehiclemodel">Model : </label>
                                        <input type="text" class="form-control required"  id="vehiclemodel" value="{{ $vehicle[0]['model'] }}" name="vehiclemodel">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="webUrl3">Year : </label>
                                        <input type="text" class="form-control required"  id="webUrl3" value="{{ $vehicle[0]['year'] }}" name="vehicleyear"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="vehicleseats">Number of seats : </label>
                                        <input type="number" class="form-control required"   id="vehicleseats" value="{{ $vehicle[0]['seats_number'] }}"  name="vehicleseats">
                                    </div>
                                </div>
                            </div>
                        </section>

                        @if( isset( $region )  )
                        <hr class="mb-15 mt-0">
						<h4 class="box-title text-info"><i class="ti-map-alt mr-15"></i> Routes & Associations</h4>
						<hr class="mb-15 mt-0">
                        <section>
                            <div class="row">
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label><span class="text-danger">Current Region: </span></label>
                                        <input type="text" class="form-control required" readonly value="{{ $region->region_name }}">
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label><span class="text-danger">Current Association: </span></label>
                                        <input type="text" class="form-control required" readonly value="{{ $association->name}}">
                                    </div>
                                </div>
								<div class="col-md-12">
									<div class="form-group">
										<label><span class="text-danger">Current Vehicle Route Details: </span></label>
										<hr class="mb-15 mt-0">
										<div>
										@foreach ($all_routes as $route)
                                            {{-- @if($route->route_id === $member_vehicle_routes[0]['routes'][0]['route_id']) --}}
                                                <input checked="checked"  name="route" type="checkbox" id="{{$route->id}}" value="{{$route->id}}" disabled>
                                                {{-- <label for="{{$route->id}}" class="d-block">{{$route->id.' : '}}{{$member_vehicle_routes[0]['routes'][0]['origin'].' - '}}{{$member_vehicle_routes[0]['routes'][0]['via'].' - '}}{{$member_vehicle_routes[0]['routes'][0]['destination']}}</label> --}}
                                                <label for="{{$route->id}}" class="d-block">{{$route->route_id.' : '}}{{$route->origin.' - '}}{{$route->via.' - '}}{{$route->destination}}</label>
                                            {{-- @endif --}}
                                        @endforeach
										</div>
									</div>
								</div>

								<hr class="mb-15 mt-0">

								<div class="col-md-6">
									<div class="form-group">
										<label for="update-region">Select New Region (If applicable): </label>
										<select class="custom-select form-control required" id="update-region" name="region">
											<option selected value="">Please select Region</option>
											@foreach ($all_regions as $region)
												<option value="{{$region->region_id}}">{{$region->region_name}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="update-association">Select New Association (If applicable):</label>
										<select class="custom-select form-control required " id="update-association" name="association">
											<option selected value="">Please select Association</option>
											@foreach ($all_associations as $association)
												<option value="{{$association->association_id}}">{{$association->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Vehicle Route Details : </label>
										<hr class="mb-15 mt-0">
										<div id="update-route" name="route"></div>
									</div>
								</div>

                            </div>
                            @endif

                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ route('members.show', $member_record->id )}}" type="submit" id="cancel_button" class="btn btn-warning ">Cancel </a>
                                    <a href="{{ route('members.update', $member_record->id )}}" type="submit" id="update_button" class="btn btn-primary float-right">Update </a>
                                </div>
                            </div>
                        </section>

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@endsection