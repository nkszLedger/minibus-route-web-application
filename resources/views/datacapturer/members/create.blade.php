@extends('datacapturer.home')

@section('content')

<section class="content">
	<div class="row">
		<div class="col-12">
			<!-- Validation wizard -->
			<div class="box box-default">
				<div class="box-header with-border">
					<h4 class="box-title" id="title">Member Registration: Create Member Profile</h4>
					<h4 class="box-subtitle">Complete the following details to create profile</h4>
				</div>
				<!-- /.box-header -->
				<div class="box-body wizard-content">
					@if( isset($member_record) )
					<form action="{{ route('members.edit', $member_record->id) }}" method="GET" 
						id="member-form" class="validation-wizard wizard-circle" 
							enctype='multipart/form-data'>
					@else
					<form action="{{ route('members.store') }}" method="POST" 
						id="member-form" class="validation-wizard wizard-circle" 
							enctype='multipart/form-data'>
					@endif
						{{ csrf_field() }}
						
						<h4 class="box-title text-info"><i class="ti-target mr-15"></i> Member Type</h4>
						<hr class="mb-15 mt-0">
						<h6 class="box-subtitle text-danger text-center" id="error_on_create_member">
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
										<label for="membership-type"> Select Type of Member : 
											<span class="text-danger">*</span> </label>
										@if (isset($member_record) )
										<select class="custom-select form-control" readonly 
											id="membership-type" name="membership-type">
											<option selected value="{{ $member_record['membership_type']['id'] }}">
												{{ $member_record['membership_type']['membership_type'] }}
											</option>		
										</select>
										@else
										<select class="custom-select form-control" 
											id="membership-type" name="membership-type" required>
											<option value="">Please select Membership Type</option>
											@foreach ($all_membership_types as $membership_type)		
												<option value="{{$membership_type->id}}">
													{{$membership_type->membership_type}}
												</option>
											@endforeach
										</select>
										@endif
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="licensenumber">Driver's License Number : 
											<span class="text-danger">*</span> 
										</label>
										@if( isset($member_driver->license_number) )
											<input type="text" class="form-control" 
												{{ isset($member_driver)  ? 'readonly' : '' }} 
												id="licensenumber" value="{{$member_driver->license_number ?? ''}}" 
												name="licensenumber" maxlength="12" 
												required data-validation-required-message="This field is required"> 
										@else
											<input type="text" class="form-control" id="licensenumber" 
												name="licensenumber" maxlength="12"	
												required data-validation-required-message="This field is required">
										@endif
										
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="operatinglicensenumber" id="licensenumbertypelabel">
											Operating License : <span class="text-danger">*</span> </label>
										
										@if ( isset($member_operator->membership_number ) )
											<input type="text" class="form-control" 
												id="operatinglicensenumber"
												{{ isset($member_operator) ? 'readonly' : '' }} 
												value="{{$member_operator->membership_number ?? ''}}" 
												name="operatinglicensenumber" maxlength="12"> 
										@else
											<input type="text" class="form-control" 
												id="operatinglicensenumber" 
												name="operatinglicensenumber" maxlength="12"
												{{ isset($member_operator) ? 'readonly' : '' }} 
												required data-validation-required-message="This field is required"> 
							
										@endif
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										@if( isset($member_operator->license_path) )
										<label id="attachment">{{ $member_operator->license_path }}</label>
										<label class="file"></label>
										<input type="file" class="form-control-file" 
											id="createoperatinglicensefile" 
											name="operatinglicensefile" >
										@else
										<label id="attachment">Upload Docs</label>
										<input type="file" class="form-control-file" 
											id="createoperatinglicensefile" 
											name="operatinglicensefile"
											value="No file uploaded" >
										@endif
									</div>
									<div class="form-group">
										<div class="checkbox checkbox-success">
											@if( isset($member_record) )
												@if( $member_record->is_member_associated )
													<input id="ismemberassociated" 
														type="checkbox" name="ismemberassociated" 
														checked disabled>
													<label for="ismemberassociated"> This member 
														<span class="text-danger">BELONGS</span> 
															to an association
													</label>
												@else
													<input id="ismemberassociated" 
														type="checkbox" name="ismemberassociated" disabled>
													<label for="ismemberassociated"> This member 
														<span class="text-danger">DOES NOT</span> 
															belong to any association
													</label>
                                            	@endif
											@else
											<input type="checkbox" id="ismemberassociated" name="ismemberassociated">
											<label for="ismemberassociated"> <span class="text-danger">
												Member BELONGS to association </span>
											</label>
											@endif
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group" id="membershiplicensenumbertype">
										@if( isset($member_driver->membership_number) )
											<label for="associationmembershipnumber">
												Association Membership Number : 
												<span class="text-danger">*</span> 
											</label> 
											<input type="text" class="form-control" 
												id="associationmembershipnumber" readonly 
												name="associationmembershipnumber" maxlength="20" 
												value="{{$member_driver->membership_number ?? ''}}"> 
										@else
											<label for="associationmembershipnumber">
												Association Membership Number : 
												<span class="text-danger">*</span> 
											</label> 
											<input type="text" class="form-control" 
												id="associationmembershipnumber"
												name="associationmembershipnumber" maxlength="20"> 
										@endif
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<h5 for="drivinglicencecodes">Driving Licence Code : 
											<span class="text-danger">*</span> </h5>
										<select class="custom-select form-control" required 
											id="drivinglicencecodes" name="drivinglicencecodes"
											{{  isset($member_record) ? 'disabled' : '' }} >
										@if( isset($member_driver['codes']) )
											<option value="{{$member_driver['codes']['code']}}">
												Code: {{$member_driver['codes']['code']}}; 
												Category: {{$member_driver['codes']['category']}}
											</option>
											@foreach ($all_driving_licence_codes as $code)
												@if( $code->id != $member_driver['codes']['code'])
													<option value="{{$code->id}}">
														Code: {{$code->code}}; 
														Category: {{$code->category}}
													</option>
												@endif
											@endforeach
										@else
											<option value="">Please select Code</option>
											@foreach ($all_driving_licence_codes as $code)
												<option value="{{$code->id}}">
													Code: {{$code->code}}; 
													Category: {{$code->category}}
												</option>
											@endforeach
										@endif
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group" id="valid-from">
										@if( isset($member_driver['valid_from']) )
										<h5 for="valid-from">
											Driver's Licence Valid From : 
											<span class="text-danger">*</span> 
										</h5>
										<input class="form-control" type="date" 
												value="{{ $member_driver->valid_from ?? ''}}" 
												name="valid-from"
												{{ isset($member_driver) ? 'readonly' : '' }} > 

										@elseif( isset($member_operator->valid_from) )
										<h5 for="valid-from">
											Operating Licence Valid From : 
											<span class="text-danger">*</span> 
										</h5>
										<input class="form-control" type="date" 
												value="{{ $member_operator->valid_from ?? ''}}" 
												name="valid-from"
												{{ isset($member_operator) ? 'readonly' : '' }} > 

										@else
										<h5 for="valid-from">
											Licence Valid From : 
											<span class="text-danger">*</span> 
										</h5>
										<input class="form-control" type="date" 
											name="valid-from"
											required data-validation-required-message="This field is required"> 
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" id="valid-until">
										@if( isset($member_driver['valid_until']) )
										<h5 for="valid-until">
											Driver's Licence Valid Until :
												<span class="text-danger">*</span> 
										</h5>
										<input class="form-control" type="date" 
												value="{{ $member_driver->valid_until ?? ''}}" 
												name="valid-until"
												{{ isset($member_driver) ? 'readonly' : '' }}>

										@elseif( isset($member_operator->valid_until) )
										<h5 for="valid-until">
											Operator's Licence Valid Until :
												<span class="text-danger">*</span> 
										</h5>
										<input class="form-control" type="date" 
												value="{{ $member_operator->valid_until ?? ''}}" 
												name="valid-until"
												{{ isset($member_operator) ? 'readonly' : '' }}>
										@else
										<h5 for="valid-until">
											Licence Valid Until :
												<span class="text-danger">*</span> 
										</h5>
										<input class="form-control" type="date"  
												name="valid-until" 
												required data-validation-required-message="This field is required"> 
										@endif
									</div>
								</div>
								

							</div>
						</section>

						<!-- Step 1 -->
						<hr class="mb-15 mt-0">
						<h4 class="box-title text-info"><i class="ti-user mr-15"></i> Personal Details</h4>
						<hr class="mb-15 mt-0">
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wfirstName2"> First Name : 
											<span class="text-danger">*</span> 
										</label>
										<input type="text" class="form-control" 
										id="wfirstName2" name="firstName" maxlength="25" 
										value="{{ old('firstName') ?? $member_record->name ?? ''}}" 
										{{ isset($member_record) ? 'readonly' : '' }}
										required data-validation-required-message="This field is required">  
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlastName2"> Last Name : 
											<span class="text-danger">*</span> 
										</label>
										<input type="text" class="form-control" id="wlastName2" 
										name="lastName" maxlength="25" 
										value="{{ old('lastName') ?? $member_record->surname ?? ''}}"
										{{ isset($member_record) ? 'readonly' : '' }} 
										required data-validation-required-message="This field is required">  
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="idnumber"> ID Number : <span class="text-danger">*</span> </label>
										<input type="text" class="form-control" id="idnumber" 
										name="idnumber" maxlength="13" 
										value="{{ old('idnumber') ?? $member_record->id_number ?? ''}}"
										{{ isset($member_record) ? 'readonly' : '' }} 
										required data-validation-required-message="This field is required"> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="gender">Gender : <span class="text-danger">*</span> </h5>
										<select class="custom-select form-control" 
											id="gender" name="gender" required 
											{{ isset($member_record) ? 'disabled' : '' }}>
										@if( isset($member_record) )
											<option value="{{$member_record['gender']['id']}}">
												{{$member_record['gender']['type']}}
											</option>
										@else
											<option value="">Please Select Gender</option>
											@foreach ($all_gender as $gender)
												<option value="{{$gender->id}}">{{$gender->type}}</option>
											@endforeach
										@endif
										</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wemailAddress2"> Email Address :</label>
										<input type="email" class="form-control" id="wemailAddress2" 
											name="emailAddress" maxlength="25" 
											value="{{ old('emailAddress') ?? $member_record->email ?? ''}}"
											{{ isset($member_record) ? 'readonly' : '' }} 
											required data-validation-required-message="This field is required"> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="wphoneNumber2">Phone Number : 
										<span class="text-danger">*</span></h5>
										<input type="tel" class="form-control" id="wphoneNumber2" 
											name="phonenumber" maxlength="10" 
											value="{{ old('phonenumber') ?? $member_record->phone_number ?? ''}}"
											{{ isset($member_record) ? 'readonly' : '' }}
											required data-validation-required-message="This field is required"> 
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="addressline1">Address Line : 
											<span class="text-danger">*</span> 
										</h5>
										<input type="text" class="form-control" 
											id="addressline1" 
											name="addressline1" maxlength="25" 
											value="{{ old('addressline1') ?? $member_record->address_line ?? ''}}" 
											{{ isset($member_record) ? 'readonly' : '' }} 
											required data-validation-required-message="This field is required"> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for=surburb">Surburb<span class="text-danger"> *</span>  </h5>
										<input type="text" class="form-control" id="surburb" 
											name="surburb" maxlength="25" 
											value="{{ old('surburb') ?? $member_record->surburb ?? '' }}"
											{{ isset($member_record) ? 'readonly' : '' }} 
											required data-validation-required-message="This field is required"> 
									</div>
                           		</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="emergency_contact_name">Emergency Contact Name : 
											<span class="text-danger"> *</span>  
										</h5>
										<input type="text" class="form-control" 
											id="emergency_contact_name" 
											name="emergency_contact_name" maxlength="25" 
											value="{{ old('emergency_contact_name') ?? $member_record->emergency_contact_name ?? '' }}"
											{{ isset($member_record) ? 'readonly' : '' }} 
											required data-validation-required-message="This field is required"> 
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<h5 for="emergency_contact_number">Emergency Contact Number : 
											<span class="text-danger"> *</span>  
										</h5>
										<input type="text" class="form-control" 
											id="emergency_contact_number" name="emergency_contact_number" 
											maxlength="10" 
											value="{{ old('emergency_contact_number') ?? 
												$member_record->emergency_contact_number ?? '' }}" 
											{{ isset($member_record) ? 'readonly' : '' }} 
											required data-validation-required-message="This field is required"> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="emergencycontactrelationship">Emergency Contact Relationship : 
											<span class="text-danger"> *</span>  
										</h5>
										<input type="text" class="form-control" 
											id="emergency_contact_relationship" 
											name="emergency_contact_relationship" maxlength="25" 
											value="{{ old('emergency_contact_relationship') ?? 
												$member_record->emergency_contact_relationship ?? '' }}" 
											{{ isset($member_record) ? 'readonly' : '' }} 
											required data-validation-required-message="This field is required">  
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="city">City/Town : <span class="text-danger">*</span> </h5>
										<select class="custom-select form-control" id="city" required 
											name="city" {{ isset($member_record) ? 'disabled' : '' }}>
										@if( isset($member_record) )
											<option value="{{$member_record['city']['city_id']}}">
												{{$member_record['city']['city']}}
											</option>
											@foreach ($all_cities as $city)
												@if( $city->city_id != $member_record['city']['city_id'])
													<option value="{{$city->city_id}}">{{$city->city}}</option>
												@endif
											@endforeach
										@else
											<option value="">Please select City/Town</option>
											@foreach ($all_cities as $city)
												<option value="{{$city->city_id}}">{{$city->city}}</option>
											@endforeach
										@endif
										</select>
									</div>
								</div>
							</div>

							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="postal-code">Postal Code : 
											<span class="text-danger">*</span> </label>
										<input type="text" class="form-control" id="postal-code" 
											name="postal-code" maxlength="4" 
											value="{{ old('postal-code') ??
												$member_record->postal_code ?? ''}}" 
											{{ isset($member_record) ? 'readonly' : '' }} 
											required data-validation-required-message="This field is required"> 
									</div>
								</div>
							</div>

						</section>

						@if( isset($member_record) )
							<div class="row">
								<div class="col-6 text-right">
									<input class="btn btn-info mb-5" type="submit" value="Edit">
								</div>
								<div class="col-6 text-left">
									<a class="btn btn-warning mb-5" href="{{ route('members.index')}}">Cancel</a>
								</div>
							</div>
						@else
							<div class="row">
								<div class="col-6 text-right">
									<input class="btn btn-info mb-5" type="submit" id="submit" value="Submit">
								</div>
								<div class="col-6 text-left">
									<a class="btn btn-warning mb-5" href="{{ route('members.index')}}">Cancel</a>
								</div>
							</div>
						@endif
					</form>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>

</section>

@endsection
