@extends('index-3')

@section('content')

<section class="content">
	<div class="row">
		<div class="col-12">
			<!-- Validation wizard -->
			<div class="box box-default">
				<div class="box-header with-border">
					<h4 class="box-title">Member Registration: Create Member</h4>
					<h6 class="box-subtitle">Complete the following details to create member profile</h6>
				</div>
				<!-- /.box-header -->
				<div class="box-body wizard-content">
					<form action="/create_member" type="POST" id="member-form" class="validation-wizard wizard-circle">
					{{ csrf_field() }}
						<input type="hidden" class="form-control " id="member-id" name="member-id">

						<!-- Step 1 -->
						<h6>Personal Details</h6>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wfirstName2"> First Name : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="wfirstName2" name="firstName" maxlength="25"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlastName2"> Last Name : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="wlastName2" name="lastName" maxlength="25"> </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="idnumber"> ID Number : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="idnumber" name="idnumber" maxlength="13"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="licensenumber">Driver's License Number : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="licensenumber" name="licensenumber" maxlength="12"> </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wemailAddress2"> Email Address :</label>
										<input type="email" class="form-control" id="wemailAddress2" name="emailAddress" maxlength="25"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wphoneNumber2">Phone Number : <span class="danger">*</span>  </label>
										<input type="tel" class="form-control required" id="wphoneNumber2" name="phonenumber" maxlength="10"> </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="addressline1">Address Line : <span class="danger">*</span>  </label>
										<input type="text" class="form-control required" id="addressline1" name="addressline1" maxlength="25"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="city">City/Town : <span class="danger">*</span> </label>
										<select class="custom-select form-control required" id="city" name="city">
										<option value="">Please select City/Town</option>
										@foreach ($all_cities as $city)
											<option value="{{$city->city_id}}">{{$city->city}}</option>
										@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="postal-code">Postal Code : <span class="danger">*</span> </label>
										<input type="text" class="form-control" id="postal-code" name="postal-code" maxlength="4">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="membership-type"> Select Membership : <span class="danger">*</span> </label>
										<select class="custom-select form-control required" id="membership-type" name="membership-type">
										<option value="">Please select Membership Type</option>
										@foreach ($all_membership_types as $membership_type)		
											<option value="{{$membership_type->id}}">{{$membership_type->membership_type}}</option>
										@endforeach
										</select>
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
										<label for="regnumber">Registration Number : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="regnumber" name="regnumber" maxlength="10">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="vehiclemake">Make : <span class="danger">*</span></label>
										<input type="text" class="form-control required" id="vehiclemake" name="vehiclemake" maxlength="20"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="vehiclemodel">Model : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="vehiclemodel" name="vehiclemodel" maxlength="20">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="webUrl3">Year : <span class="danger">*</span></label>
										<input type="number" class="form-control required" id="webUrl3" name="vehicleyear" maxlength="4" min=2010> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="vehicleseats">Number of seats : <span class="danger">*</span></label>
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
										<label for="wintType1">Region: <span class="danger">*</span> </label>
										<select class="custom-select form-control required" id="region" data-placeholder="Type to search cities" name="region">
											<option value="">Please select Region</option>
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
										<label for="association">Association :<span class="danger">*</span>  </label>
										<select class="custom-select form-control required " id="association" name="association">
											<option value="">Please select Association</option>
											@foreach ($all_associations as $association)
												<option value="{{$association->association_id}}">{{$association->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Route : <span class="danger">*</span></label>
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
