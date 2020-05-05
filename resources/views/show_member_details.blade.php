@extends('index-3')

@section('content')

<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<h4 class="box-title">Member Registration: Update Member Details</h4>
					<h6 class="box-subtitle">Edit the following to modify member details</h6>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="/create_member" type="POST" id="member-form">
					{{ csrf_field() }}
						<input type="hidden" class="form-control " id="member-id" value="{{$member_record->id ?? '' }}" name="member-id">

						<!-- Step 1 -->
						<hr>
						<h4>Personal Details</h4>
						<hr>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wfirstName2"> First Name : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="wfirstName2" value="{{$member_record->name ?? '' }}" name="firstName" maxlength="25"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlastName2"> Last Name : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="wlastName2" value="{{$member_record->surname ?? '' }}" name="lastName" maxlength="25"> </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="idnumber"> ID Number : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="idnumber" value="{{$member_record->id_number ?? '' }}" name="idnumber" maxlength="13"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="licensenumber">Driver's License Number : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="licensenumber" value="{{$member_record->license_number ?? '' }}" name="licensenumber" maxlength="12"> </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wemailAddress2"> Email Address :</label>
										<input type="email" class="form-control" id="wemailAddress2" value="{{$member_record->email ?? '' }}" name="emailAddress" maxlength="25"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wphoneNumber2">Phone Number : <span class="danger">*</span>  </label>
										<input type="tel" class="form-control required" id="wphoneNumber2" value="{{$member_record->phone_number ?? '' }}" name="phonenumber" maxlength="10"> </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="addressline1">Address Line : <span class="danger">*</span>  </label>
										<input type="text" class="form-control required" id="addressline1" value="{{$member_record->address_line ?? '' }}" name="addressline1" maxlength="25"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="city">City/Town : <span class="danger">*</span> </label>
										<select class="custom-select form-control required" id="city" name="city">

											@if( isset($member_record))
												<option selected value="{{$member_record['city']['city_id']}}">{{$member_record['city']['city']}}</option>
											@else
												<option value="">Please Select City</option>
											@endif
											@foreach ($all_cities as $city)
												@if( isset($member_record))
													@if($city->id !== $member_record->city_id)
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

							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="postal-code">Postal Code : <span class="danger">*</span> </label>
										<input type="text" class="form-control" id="postal-code" value="{{$member_record['postal_code'] ?? '' }}" name="postal-code" maxlength="4">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="membership-type"> Select Membership : <span class="danger">*</span> </label>
										<select class="custom-select form-control required" id="membership-type" name="membership-type">									
											@if( isset($member_record))
												<option selected value="{{$member_record['membership_type']['id']}}">{{$member_record['membership_type']['membership_type']}}</option>
											@else
												<option value="">Please Select Membership</option>
											@endif
											@foreach ($all_membership_types as $membership_type)
												@if( isset($member_record))
													@if($membership_type->id !== $member_record['membership_type']['id'])
														<option value="{{$membership_type->id}}">{{$membership_type->membership_type}}</option>
													@endif
												@else
													<option value="{{$membership_type->id}}">{{$membership_type->membership_type}}</option>
												@endif
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</section>
						<!-- Step 2 -->
						<hr>
						<h4>Vehicle Details</h4>
						<hr>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="regnumber">Registration Number : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="regnumber" value="{{$member_record['vehicles'][0]['registration_number'] ?? ''}}"  name="regnumber" maxlength="10">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="vehiclemake">Make : <span class="danger">*</span></label>
										<input type="text" class="form-control required" id="vehiclemake" value="{{$member_record['vehicles'][0]['make'] ?? ''}}" name="vehiclemake" maxlength="20"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="vehiclemodel">Model : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="vehiclemodel" value="{{$member_record['vehicles'][0]['model'] ?? ''}}" name="vehiclemodel" maxlength="20">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="webUrl3">Year : <span class="danger">*</span></label>
										<input type="number" class="form-control required" id="webUrl3" value="{{$member_record['vehicles'][0]['year'] ?? ''}}" name="vehicleyear" maxlength="4" min=2010> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="vehicleseats">Number of seats : <span class="danger">*</span></label>
										<input type="number" class="form-control required" id="vehicleseats" value="{{$member_record['vehicles'][0]['seats_number'] ?? ''}}" name="vehicleseats" maxlength="2" min=0 max=22>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									</div>
								</div>
							</div>
						</section>
						<!-- Step 3 -->
						<hr>
						<h4>Association and Routes</h4>
						<hr>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="region2">Region: <span class="danger">*</span> </label>
										<select class="custom-select form-control required" id="region2" name="region2">
											<option value="{{$member_record->region->region_id}}">{{$member_record->region->region_name}}</option>
											@foreach ($all_regions as $region)
												@if($region->region_id !== $member_record->region->region_id)
													<option value="{{$region->region_id}}">{{$region->region_name}}</option>
												@endif
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="association2">Association :<span class="danger">*</span>  </label>
										<select class="custom-select form-control required " id="association2" name="association2">
											<option value="{{$member_record->member_association->association_id}}">{{$member_record->member_association->name}}</option>
											@foreach ($all_associations as $association)
												@if( $association->association_id !== $member_record->member_association->association_id )
													<option value="{{$association->association_id}}">{{$association->name}}</option>
												@endif
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Route : <span class="danger">*</span></label>
										<hr class="mb-15 mt-0">
										<div id="route2" name="route2"></div>
									</div>
								</div>
							</div>
							
							<div class="row">
							    <div class="col-6 text-right">
									<input class="btn btn-info mb-5" type="submit" value="Submit" href="{{ url('show_member', $member_record->id )}}"/>
							    </div>
								<div class="col-6 text-left">
									<a class="btn btn-warning mb-5" href="{{ url('list_members')}}">Cancel</a>
							    </div>
							</div>

						</section>
					</form>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>

</section>
@endsection