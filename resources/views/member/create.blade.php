@extends('member.home')

@section('content')

<section class="content">
	<div class="row">
		<div class="col-12">
			<!-- Validation wizard -->
			<div class="box box-default">
				<div class="box-header with-border">
					<h4 class="box-title" id="title">Member Registration: Create Member Profile</h4>
					<h6 class="box-subtitle">Complete the following details to create profile</h6>
				</div>
				<!-- /.box-header -->
				<div class="box-body wizard-content">
					<form action="{{ route('members.store') }}" type="POST" id="member-form" class="validation-wizard wizard-circle">
					{{ csrf_field() }}
						<input type="hidden" class="form-control " id="member-id" name="member-id">

						<!-- Step 1 -->
						<h6>Personal Details</h6>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="membership-type"> Select Type of Member : <span class="text-danger">*</span> </h5>
										<select class="custom-select form-control required" id="membership-type" name="membership-type">
											<option value="">Please select Membership Type</option>
											@foreach ($all_membership_types as $membership_type)		
												<option value="{{$membership_type->id}}">{{$membership_type->membership_type}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="licensenumber">Driver's License Number : <span class="text-danger">*</span> </h5>
										<input type="text" class="form-control required" id="licensenumber" name="licensenumber" maxlength="12"> </div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="wfirstName2"> First Name : <span class="text-danger">*</span> </h5>
										<input type="text" class="form-control required" id="wfirstName2" name="firstName" maxlength="25"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="wlastName2"> Last Name : <span class="text-danger">*</span> </h5>
										<input type="text" class="form-control required" id="wlastName2" name="lastName" maxlength="25"> </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="idnumber"> ID Number : <span class="text-danger">*</span> </h5>
										<input type="text" class="form-control required" id="idnumber" name="idnumber" maxlength="13"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="wemailAddress2"> Email Address :</h5>
										<input type="email" class="form-control" id="wemailAddress2" name="emailAddress" maxlength="25"> </div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="wphoneNumber2">Phone Number : <span class="text-danger">*</span>  </h5>
										<input type="tel" class="form-control required" id="wphoneNumber2" name="phonenumber" maxlength="10"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="addressline1">Address Line : <span class="text-danger">*</span>  </h5>
										<input type="text" class="form-control required" id="addressline1" name="addressline1" maxlength="25"> </div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="city">City/Town : <span class="text-danger">*</span> </h5>
										<select class="custom-select form-control required" id="city" name="city">
										<option value="">Please select City/Town</option>
										@foreach ($all_cities as $city)
											<option value="{{$city->city_id}}">{{$city->city}}</option>
										@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="postal-code">Postal Code : <span class="text-danger">*</span> </h5>
										<input type="text" class="form-control" id="postal-code" name="postal-code" maxlength="4">
									</div>
								</div>
							</div>

						</section>
						<!-- Step 2 -->
						<h6>Vehicle Details</h6>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="regnumber">Registration Number : <span class="text-danger">*</span> </h5>
										<input type="text" class="form-control required" id="regnumber" name="regnumber" maxlength="10">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="vehiclemake">Make : <span class="text-danger">*</span></h5>
										<input type="text" class="form-control required" id="vehiclemake" name="vehiclemake" maxlength="20"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="vehiclemodel">Model : <span class="text-danger">*</span> </h5>
										<input type="text" class="form-control required" id="vehiclemodel" name="vehiclemodel" maxlength="20">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="webUrl3">Year : <span class="text-danger">*</span></h5>
										<input type="number" class="form-control required" id="webUrl3" name="vehicleyear" maxlength="4" min=2010> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="vehicleseats">Number of seats : <span class="text-danger">*</span></h5>
										<input type="number" class="form-control required" id="vehicleseats" name="vehicleseats" maxlength="2" min=0 max=22>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									</div>
								</div>
							</div>
						</section>
						<!-- Step 3 -->
						<h6>Association and Routes</h6>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="wintType1">Region: <span class="text-danger">*</span> </h5>
										<select class="custom-select form-control required" id="region" data-placeholder="Type to search cities" name="region">
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
										<h5 for="association">Association :<span class="text-danger">*</span>  </h5>
										<select class="custom-select form-control required " id="association" name="association">
											<option selected value="">Please select Association</option>
											@foreach ($all_associations as $association)
												<option value="{{$association->association_id}}">{{$association->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<h5>Route : <span class="text-danger">*</span></h5>
										<hr class="mb-15 mt-0">
										<div id="route" name="route"></div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
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
