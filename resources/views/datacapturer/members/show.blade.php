@extends('datacapturer.home')

@section('content')

<section class="content">
	<div class="row">
		<div class="col-12">
			<!-- Validation wizard -->
			<div class="box box-default">
				<div class="box-header with-border">
					<h4 class="box-title">Member Registration: Update Member Profile</h4>
					<h4 class="box-subtitle">Edit the following details to update profile</h4>
				</div>
				<!-- /.box-header -->
				<div class="box-body wizard-content">
					<form action="{{ route('members.edit', $member_record->id) }}" method="GET" 
						id="member-form" class="validation-wizard wizard-circle" 
							enctype='multipart/form-data'>
						{{ csrf_field() }}
						

						<h4 class="box-title text-info"><i class="ti-target mr-15"></i> Member Type</h4>
						<hr class="mb-15 mt-0">
						<h6 class="box-subtitle text-danger text-center" id="error_on_create_member">
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
											id="membership-type" name="membership-type" 
											{{  isset($member_record) ? 'disabled' : '' }} >
											<option value="{{ $member_record['membership_type']['id'] }}">
												{{ $member_record['membership_type']['membership_type'] }}
											</option>		
											@foreach ($all_membership_types as $membership_type)	
												@if( $membership_type->id != 
														$member_record['membership_type']['id'] )	
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
											id="licensenumber" 
											value="{{$member_driver->license_number ?? ''}}" 
											name="licensenumber" maxlength="12" readonly > 
									</div>
								</div>

								
								<div class="col-md-6">
									@if( isset($member_operator->membership_number) )
									<div class="form-group">
										<label for="operatinglicensenumber" id="licensenumbertypelabel">
											Operating License : <span class="text-danger">*</span> 
                                        </label>
										<input type="text" class="form-control required" 
											id="operatinglicensenumber" readonly 
											value="{{ isset($member_operator->membership_number) ?? ''}}" 
											name="operatinglicensenumber" maxlength="12" readonly> 
									</div>
								
									@endif
									@if( isset($member_driver->membership_number) )
									<div class="form-group" id="editmembershiplicensenumbertype">
										<label for="associationmembershipnumber">
											Association Membership Number : 
											<span class="text-danger">*</span> 
										</label> 
										<input type="text" class="form-control required" 
											id="editassociationmembershipnumber" readonly 
											name="associationmembershipnumber" maxlength="12" 
											value="{{$member_driver->membership_number ?? ''}}"> 
									</div>
									@endif
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										@if( !empty($member_operator['license_path']) )
										<a id="editattachment" 
											href="{{ asset('storage/'.$member_operator->license_path) }}">
											Current Uploaded file.pdf
										</a>
                                        @elseif( !empty($member_driver['license_path']) )
                                        <a id="editattachment" 
											href="{{ asset('storage/'.$member_driver->license_path) }}">
											Current Uploaded file.pdf
										</a>
										@else
											NO documents uploaded
                                        @endif
									</div>
									<div class="form-group">
										<div class="checkbox">
											<input type="checkbox" id="showismemberassociated" 
												name="ismemberassociated" disabled 
												@if( $member_record->is_member_associated ) checked @endif>
											<label for="showismemberassociated"> 
												<span class="text-danger">
													Member BELONGS to association 
												</span>
											</label> 
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group" id="membershiplicensenumbertype"></div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<h5 for="drivinglicencecodes">Driving Licence Code : 
											<span class="text-danger">*</span> </h5>
										<select class="custom-select form-control required" 
											id="drivinglicencecodes" name="drivinglicencecodes"
											{{  isset($member_driver) ? 'disabled' : '' }} >
											<option value="{{$member_driver['codes']['id']}}">
												Code: {{$member_driver['codes']['code']}}; 
												Category: {{$member_driver['codes']['category']}}
											</option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group" id="valid-from">
										@if(  isset($member_driver->valid_since) )
										<h5 for="valid-from">
											Driving Licence Valid From : 
											<span class="text-danger">*</span> 
										</h5>
										<input class="form-control" type="date" 
												value="{{ $member_driver->valid_since ?? ''}}" 
												name="valid-from"
												{{ isset($member_driver) ? 'readonly' : '' }}>
										@endif
										@if(  isset($member_operator->valid_since) )
										<h5 for="valid-from">
											Operating Licence Valid From : 
											<span class="text-danger">*</span> 
										</h5>
										<input class="form-control" type="date" 
												value="{{ $member_operator->valid_since ?? ''}}" 
												name="valid-from"
												{{ isset($member_operator) ? 'readonly' : '' }}>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" id="valid-until">
										@if( isset($member_driver->valid_until) )
										<h5 for="valid-until">
											Driving Licence Valid Until :
												<span class="text-danger">*</span> 
										</h5>
										<input class="form-control" type="date" 
												value="{{ $member_driver->valid_until ?? ''}}" 
												name="valid-from"
												{{ isset($member_driver) ? 'readonly' : '' }}>
										@endif
										@if( isset($member_operator->valid_until) )
										<h5 for="valid-until">
											Operating Licence Valid Until :
												<span class="text-danger">*</span> 
										</h5>
										<input class="form-control" type="date" 
												value="{{ $member_operator->valid_until ?? ''}}" 
												name="valid-from"
												{{ isset($member_operator) ? 'readonly' : '' }}>
										@endif
									</div>
								</div>
							</div>
						</section>

						<!-- Step 1 -->
						<hr class="mb-15 mt-0">
						<h4 class="box-title text-info">
                            <i class="ti-user mr-15"></i> 
                            Personal Details
                        </h4>
						<hr class="mb-15 mt-0">
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wfirstName2"> First Name : 
											<span class="text-danger">*</span> 
										</label>
										<input type="text" class="form-control required" 
										id="wfirstName2" name="firstName" maxlength="25" 
										value="{{$member_record->name ?? ''}}" readonly> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlastName2"> Last Name : 
											<span class="text-danger">*</span> 
										</label>
										<input type="text" class="form-control required" id="wlastName2" 
										name="lastName" maxlength="25" 
										value="{{$member_record->surname ?? ''}}" readonly> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="idnumber"> ID Number : 
											<span class="text-danger">*</span> 
										</label>
										<input type="text" class="form-control required" id="idnumber" 
										name="idnumber" maxlength="13" value="{{$member_record->id_number ?? ''}}" readonly> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="gender">Gender : <span class="text-danger">*</span> </h5>
										<select class="custom-select form-control required" 
											id="gender" name="gender" disabled>
											<option value="{{$member_record['gender']['id']}}">
												{{$member_record['gender']['type']}}
											</option>
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
											value="{{$member_record->email ?? ''}}" readonly> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="wphoneNumber2">Phone Number : 
										<span class="text-danger">*</span></h5>
										<input type="tel" class="form-control required" id="wphoneNumber2" 
											name="phonenumber" maxlength="10" 
											value="{{$member_record->phone_number ?? ''}}" readonly> 
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
											id="addressline1" name="addressline1" maxlength="25" 
											value="{{$member_record->address_line ?? ''}}" readonly> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for=surburb">Surburb<span class="text-danger"> *</span>  </h5>
										<input type="text" class="form-control required" id="surburb" 
											name="surburb" maxlength="25" 
											value="{{$member_record->surburb ?? '' }}" readonly> 
									</div>
                           		</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="emergency_contact_name">Emergency Contact Name : 
											<span class="text-danger"> *</span>  
										</h5>
										<input type="text" class="form-control required" 
											id="emergency_contact_name" readonly
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
											id="emergency_contact_number" name="emergency_contact_number" 
											maxlength="10" readonly
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
											id="emergency_contact_relationship" readonly
											name="emergency_contact_relationship" maxlength="25" 
											value="{{$member_record->emergency_contact_relationship ?? '' }}"> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="city">City/Town : <span class="text-danger">*</span> </h5>
										<select class="custom-select form-control required" id="city" 
											name="city" disabled>
											<option value="{{$member_record['city']['city_id']}}">
												{{$member_record['city']['city']}}
											</option>
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
											name="postal-code" maxlength="4" readonly 
											value="{{$member_record->postal_code ?? ''}}"> 
									</div>
								</div>
							</div>

						</section>

                        <hr class="mb-15 mt-0">
                        <h4 class="box-title text-info"><i class="ti-eye mr-15"></i> Biometrics Captured</h4>
                        <hr class="mb-15 mt-0">
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="idnumber"> Portrait :  </label>
                                        @if( isset($portrait[0]['id']) )
                                        <img src="/minibus/portrait-green.png" height="225" width="225">
                                        @else
                                        <img src="/minibus/portrait-grey.png" height="225" width="225">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> Fingerprint (Left) :  </label>
                                        @if( isset($fingerprint[0]['fingerprint_left_thumb']) )
                                            <img src="/minibus/fingerprint-green.jpg" height="225" width="225">
                                        @else
                                            <img src="/minibus/fingerprint-gey.png" height="225" width="225">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> Fingerprint (Right) :  </label>
                                        @if( isset($fingerprint[0]['fingerprint_right_thumb']) )
                                            <img src="/minibus/fingerprint-green.jpg" height="225" width="225">
                                        @else
                                            <img src="/minibus/fingerprint-gey.png" height="225" width="225">
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </section>

                        <div class="row">
                            <div class="col-6 text-right">
                                <input class="btn btn-info mb-5" type="submit" value="Edit">
                            </div>
                            <div class="col-6 text-left">
                                <a class="btn btn-warning mb-5" href="{{ route('members.index')}}">Cancel</a>
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
