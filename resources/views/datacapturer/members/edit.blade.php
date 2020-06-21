@extends('datacapturer.home')

@section('content')

<section class="content">
	<div class="row">
		<div class="col-12">
			<!-- Validation wizard -->
			<div class="box box-default">
				<div class="box-header with-border">
                    <h4 class="box-title"> Member Management: UPDATE Member Profile</h4>
                    <h4 class="box-subtitle">Current Member details</h4>
                </div>
				<!-- /.box-header -->
				<div class="box-body wizard-content">
					<form action="{{ route('members.update', $member_record->id) }}" method="POST" 
						id="editmember-form" class="validation-wizard wizard-circle" 
							enctype='multipart/form-data'>
                        <?php echo method_field('PUT'); ?>

						{{ csrf_field() }}

						<h4 class="box-title text-info"><i class="ti-target mr-15"></i> Member Type</h4>
						<hr class="mb-15 mt-0">
						<h6 class="box-subtitle text-danger text-center" id="editerror_on_create_member">
							{{ $error ?? ''}}
						</h6>
						<hr class="mb-15 mt-0">
						<section>
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="membership-type"> Select Type of Member : 
											<span class="text-danger">*</span> 
                                        </label>
										
										<select class="custom-select form-control required" 
											id="editmembership-type" name="membership-type">
											<option value="{{ $member_record['membership_type']['id'] }}">
												{{ $member_record['membership_type']['membership_type'] }}
											</option>	
											@foreach ($all_membership_types as $membership_type)		
												@if( $membership_type->id != $member_record['membership_type']['id'] )
                                                <option value="{{$membership_type->id}}">
													{{$membership_type->membership_type}}
												</option>
                                                @endif
											@endforeach
										</select>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="licensenumber">Driver's License Number : 
											<span class="text-danger">*</span> 
										</label>
                                        <input type="text" class="form-control required" 
                                            id="editlicensenumber" name="licensenumber" 
                                            value="{{$member_driver['license_number'] ?? ''}}"
                                            maxlength="12">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="operatinglicensenumber" id="editlicensenumbertypelabel">
											Operating License : <span class="text-danger">*</span> 
                                        </label>
                                        <input type="text" class="form-control required" 
                                            id="editoperatinglicensenumber" 
                                            name="operatinglicensenumber" maxlength="12"
                                            value="{{$member_operator['membership_number'] ?? ''}}" > 
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
                                        @if( isset($member_operator['license_path']) )
										<a id="editattachment" 
											href="{{ asset('storage/'.$member_operator->license_path) }}">
											file.pdf
										</a>
                                        @else
                                        <a id="editattachment" 
											href="{{ asset('storage/'.$member_driver->license_path) }}">
											file.pdf
										</a>
                                        @endif
										<input type="file" id="editcreateoperatinglicensefile" 
											name="operatinglicensefile">
									</div>
									<div class="form-group">
										<div class="checkbox">
											<input type="checkbox" id="editismemberassociated" 
												name="ismemberassociated"
												{{ $member_record->is_member_associated ?? 'checked'}}>
											<label for="editismemberassociated"> 
												<span class="text-danger">
													Member BELONGS to association 
												</span>
											</label> 
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group" id="editmembershiplicensenumbertype">
										@if( isset($member_driver->membership_number) )
											<label for="associationmembershipnumber">
												Association Membership Number : 
												<span class="text-danger">*</span> 
											</label> 
											<input type="text" class="form-control required" 
												id="editassociationmembershipnumber" 
												name="associationmembershipnumber" maxlength="12" 
												value="{{$member_driver['membership_number'] ?? ''}}"> 
										@else
											<label for="associationmembershipnumber">
												Association Membership Number : 
												<span class="text-danger">*</span> 
											</label> 
											<input type="text" class="form-control required" 
												id="editassociationmembershipnumber"  
												name="associationmembershipnumber" maxlength="12">
										@endif
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<h5 for="drivinglicencecodes">Driving Licence Code : 
											<span class="text-danger">*</span> </h5>
										<select class="custom-select form-control required" 
											id="editdrivinglicencecodes" name="drivinglicencecodes">
											<option value="{{$member_driver['codes']['code']}}">
												Code: {{$member_driver['codes']['code']}}; 
												Category: {{$member_driver['codes']['category']}}
											</option>
											@foreach ($all_driving_licence_codes as $code)
												@if( $code->id != $member_driver['codes']['id'] )
													<option value="{{$code->id}}">
														Code: {{$code->code}}; 
														Category: {{$code->category}}
													</option>
												@endif
											@endforeach
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group" id="editvalid-from">
										@if( isset($member_driver['valid_since']) )
										<h5 for="valid-from">
											Driver's Licence Valid From : 
											<span class="text-danger">*</span> 
										</h5>
										<input class="form-control" type="date" 
												value="{{ $member_driver['valid_since'] ?? ''}}" 
												name="valid-from">

										@elseif( isset($member_operator['valid_since']) )
										<h5 for="valid-from">
											Operating Licence Valid From : 
											<span class="text-danger">*</span> 
										</h5>
										<input class="form-control" type="date" 
												value="{{ $member_operator['valid_from'] ?? ''}}" 
												name="valid-from">

										@else
										<h5 for="valid-from">
											Licence Valid From : 
											<span class="text-danger">*</span> 
										</h5>
										<input class="form-control" type="date" 
											name="valid-from">
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" id="editvalid-until">
										@if( isset($member_driver['valid_until']) )
										<h5 for="valid-until">
											Driver's Licence Valid Until :
												<span class="text-danger">*</span> 
										</h5>
										<input class="form-control" type="date" 
												value="{{ $member_driver['valid_until'] ?? ''}}" 
												name="valid-until">

										@elseif( isset($member_operator['valid_until']) )
										<h5 for="valid-until">
											Operator's Licence Valid Until :
												<span class="text-danger">*</span> 
										</h5>
										<input class="form-control" type="date" 
												value="{{ $member_operator['valid_until'] ?? ''}}" 
												name="valid-until">
										@else
										<h5 for="valid-until">
											Licence Valid Until :
												<span class="text-danger">*</span> 
										</h5>
										<input class="form-control" type="date"  
												name="valid-until">
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
										<input type="text" class="form-control required" 
                                            id="editwfirstName2" name="firstName" maxlength="25" 
                                            value="{{$member_record->name ?? ''}}"> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlastName2"> Last Name : 
											<span class="text-danger">*</span> 
										</label>
										<input type="text" class="form-control required" 
                                            id="editwlastName2" name="lastName" maxlength="25" 
                                            value="{{$member_record->surname ?? ''}}"> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="idnumber"> ID Number : 
                                        <span class="text-danger">*</span> </label>
										<input type="text" class="form-control required" 
                                        id="editidnumber" name="idnumber" maxlength="13" 
                                        value="{{$member_record->id_number ?? ''}}"> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="gender">Gender : 
                                            <span class="text-danger">*</span> 
                                        </h5>
										<select class="custom-select form-control required" 
											id="editgender" name="gender">
											<option value="{{$member_record['gender']['id']}}">
												{{$member_record['gender']['type']}}
											</option>
											@foreach ($all_gender as $gender)
                                                @if( $gender->id != $member_record['gender']['id'] )
												<option value="{{$gender->id}}">{{$gender->type}}</option>
                                                @endif
											@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wemailAddress2"> 
                                            Email Address :
                                        </label>
										<input type="email" class="form-control" 
                                            id="editwemailAddress2" 
											name="emailAddress" maxlength="25" 
											value="{{$member_record->email ?? ''}}"> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="wphoneNumber2">Phone Number : 
										<span class="text-danger">*</span></h5>
										<input type="tel" class="form-control required" 
                                            id="editwphoneNumber2" 
											name="phonenumber" maxlength="10" 
											value="{{$member_record->phone_number ?? ''}}"> 
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="addressline1">Address Line : 
											<span class="text-danger">*</span> 
										</h5>
										<input type="text" class="form-control required" 
											id="editaddressline1" 
											name="addressline1" maxlength="25" 
											value="{{$member_record->address_line ?? ''}}"> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for=surburb">Surburb
                                            <span class="text-danger"> *</span>  
                                        </h5>
										<input type="text" class="form-control required" 
                                            id="editsurburb" name="surburb" maxlength="25" 
											value="{{$member_record->surburb ?? '' }}"> 
									</div>
                           		</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="emergency_contact_name"> 
                                            Emergency Contact Name : 
											<span class="text-danger"> *</span>  
										</h5>
										<input type="text" class="form-control required" 
											id="editemergency_contact_name" 
											name="emergency_contact_name" maxlength="25" 
											value="{{$member_record->emergency_contact_name ?? '' }}"> 
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<h5 for="emergency_contact_number">Emergency Contact Number : 
											<span class="text-danger"> *</span>  
										</h5>
										<input type="text" class="form-control required" 
											id="editemergency_contact_number" name="emergency_contact_number" 
											maxlength="10" 
											value="{{$member_record->emergency_contact_number ?? '' }}"> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="emergencycontactrelationship">Emergency Contact Relationship : 
											<span class="text-danger"> *</span>  
										</h5>
										<input type="text" class="form-control required" 
											id="editemergency_contact_relationship" 
											name="emergency_contact_relationship" maxlength="25" 
											value="{{$member_record->emergency_contact_relationship ?? '' }}"> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="city">City/Town : <span class="text-danger">*</span> </h5>
										<select class="custom-select form-control required" id="editcity" 
											name="city">
                                            <option value="{{$member_record['city']['city_id']}}">
                                                {{$member_record['city']['city']}}
                                            </option>
                                            @foreach ($all_cities as $city)
                                                @if( $city->city_id != $member_record['city']['city_id'])
                                                    <option value="{{$city->city_id}}">{{$city->city}}</option>
                                                @endif
                                            @endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="postal-code">Postal Code : 
											<span class="text-danger">*</span> </label>
										<input type="text" class="form-control" id="editpostal-code" 
											name="postal-code" maxlength="4" 
											value="{{$member_record->postal_code ?? ''}}"> 
									</div>
								</div>
							</div>

							

						</section>

						@if( isset($member_record) )
							<div class="row">
								<div class="col-6 text-right">
									<input class="btn btn-info mb-5" type="submit" value="Update">
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
