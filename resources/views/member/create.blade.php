@extends('member.home')

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
					<form action="{{ route('members.store') }}" method="POST" 
						id="member-form" class="validation-wizard wizard-circle" enctype='multipart/form-data'>
						{{ csrf_field() }}
						

						<h4 class="box-title text-info"><i class="ti-target mr-15"></i> Member Type</h4>
						<hr class="mb-15 mt-0">
						<section>
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="membership-type"> Select Type of Member : 
											<span class="text-danger">*</span> </label>
										@if (isset($member_record) )
										<select class="custom-select form-control required" readonly 
											id="membership-type" name="membership-type">
											<option selected value="{{ $member_record['membership_type']['id'] }}">
												{{ $member_record['membership_type']['membership_type'] }}
											</option>		
										</select>
										@else
										<select class="custom-select form-control required" id="membership-type" name="membership-type">
											<option value="">Please select Membership Type</option>
											@foreach ($all_membership_types as $membership_type)		
												<option value="{{$membership_type->id}}">{{$membership_type->membership_type}}</option>
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
										@if( isset($driver) )
											<input type="text" class="form-control required" 
												{{ (count($driver) == 0) ? 'readonly' : '' }} 
												id="licensenumber" value="{{$driver[0]['license_id'] ?? ''}}" 
												name="licensenumber" maxlength="12" > 
										@else
											<input type="text" class="form-control required" id="licensenumber" 
												name="licensenumber" maxlength="12">
										@endif
										
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="operatinglicensenumber" id="licensenumbertypelabel">
											Operating License Number : <span class="text-danger">*</span> </label>
										
										@if ( isset($operator) )
											<input type="text" class="form-control required" id="operatinglicensenumber"
												{{ (count($operator) == 0) ? 'readonly' : '' }} 
												id="operatinglicensenumber" value="{{$operator[0]['license_id'] ?? ''}}" 
												name="operatinglicensenumber" maxlength="12"> 
										@else
											<input type="text" class="form-control required" id="operatinglicensenumber" 
												name="operatinglicensenumber" maxlength="12"> 
							
										@endif
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Upload Operating licence... </label>
										<label class="file">
											@if( isset($operator[0]['license_path']) )
											<input type="file" id="createoperatinglicensefile" name="operatinglicensefile" title="{{ $operator[0]['license_path'] }}" >
                                            @else
                                            <input type="file" id="createoperatinglicensefile" name="operatinglicensefile" title="No file uploaded" >
                                            @endif
										</label>
									</div>
									<div class="form-group">
										<div class="checkbox checkbox-success">
											@if( isset($member_record) )
												@if( $member_record->is_member_associated )
													<input id="isMemberAssociated" type="checkbox" checked disabled>
													<label for="isMemberAssociated"> This member <span class="text-danger">BELONGS</span> to an association</label>
												@else
													<input id="isMemberAssociated" type="checkbox" disabled>
													<label for="isMemberAssociated"> This member <span class="text-danger">DOES NOT</span> belong to any association</label>
                                            	@endif
											@else
											<input type="checkbox" id="ismemberassociated" name="ismemberassociated">
											<label for="ismemberassociated"> <span class="text-danger">Does member belong to any association ? </span></label>
											@endif
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group" id="membershiplicensenumbertype"></div>
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
										<label for="wfirstName2"> First Name : <span class="text-danger">*</span> </label>
										<input type="text" class="form-control required" 
										id="wfirstName2" name="firstName" maxlength="25" 
										value="{{$member_record->name ?? ''}}" 
										{{ isset($member_record) ? 'readonly' : '' }}> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlastName2"> Last Name : <span class="text-danger">*</span> </label>
										<input type="text" class="form-control required" id="wlastName2" 
										name="lastName" maxlength="25" value="{{$member_record->name ?? ''}}"
										{{ isset($member_record) ? 'readonly' : '' }}> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="idnumber"> ID Number : <span class="text-danger">*</span> </label>
										<input type="text" class="form-control required" id="idnumber" 
										name="idnumber" maxlength="13" value="{{$member_record->id_number ?? ''}}"
										{{ isset($member_record) ? 'readonly' : '' }}> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wemailAddress2"> Email Address :</label>
										<input type="email" class="form-control" id="wemailAddress2" 
										name="emailAddress" maxlength="25" value="{{$member_record->email ?? ''}}"
										{{ isset($member_record) ? 'readonly' : '' }}> 
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wphoneNumber2">Phone Number : <span class="text-danger">*</span>  </label>
										<input type="tel" class="form-control required" id="wphoneNumber2" 
										name="phonenumber" maxlength="10" value="{{$member_record->phone_number ?? ''}}"
										{{ isset($member_record) ? 'readonly' : '' }}> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="addressline1">Address Line : <span class="text-danger">*</span>  </label>
										<input type="text" class="form-control required" id="addressline1" 
										name="addressline1" maxlength="25" value="{{$member_record->address_line ?? ''}}" 
										{{ isset($member_record) ? 'readonly' : '' }}> 
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="city">City/Town : <span class="text-danger">*</span> </label>
										<select class="custom-select form-control required" id="city" name="city">
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
								<div class="col-md-6">
									<div class="form-group">
										<label for="postal-code">Postal Code : <span class="text-danger">*</span> </label>
										<input type="text" class="form-control" id="postal-code" name="postal-code" maxlength="4" value="{{$member_record->postal_code ?? ''}}">
									</div>
								</div>
							</div>

						</section>

						@if( !isset($member) )
						<div class="row">
							<div class="col-6 text-right">
								<input class="btn btn-info mb-5" type="submit" value="Submit">
							</div>
							<div class="col-6 text-left">
								<a class="btn btn-warning mb-5" href="{{ route('members.index')}}">Cancel</a>
							</div>
						</div>
						@else<div class="row">
							<div class="col-6 text-right">
								<input class="btn btn-info mb-5" type="submit" value="Edit">
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

@if( isset($member_vehicles) )
<section class="content">
	<div class="row">

		<div class="col-12">
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">Vehicle Management: Vehicle Profiles</h4>
					<h4 class="box-subtitle">Showing Registered Vehicles Profiles</h4>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
						<table id="example2" class="table table-striped table-bordered table-hover display nowrap margin-top-10 w-p100">
							<thead>
								<tr>
									<th>#</th>
									<th>Registration Number</th>
									<th>Make</th>
									<th>Model</th>
									<th>Year</th>
									<th>Seat Count</th>
									{{-- <th>Association</th>
									<th>Routes Assigned</th> --}}
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$count = 1;
								?>
								@if($member_vehicles !== null)
									@foreach($member_vehicles as $vehicle)
									<tr>
										<td>{{$count}}</td>
										<td>{{$vehicle->registration_number}} </td>
										<td>{{$vehicle->make}}</td>
										<td>{{$vehicle->model}}</td>
										<td>{{$vehicle->year}}</td>
										<td>{{$vehicle->seats_number}}</td>
									</tr>
									<?php $count++?>
									@endforeach
								@endif
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>Registration Number</th>
									<th>Make</th>
									<th>Model</th>
									<th>Year</th>
									<th>Seat Count</th>
									{{-- <th>Association</th>
									<th>Routes Assigned</th> --}}
									<th>Action</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>
@endif

@if( isset($member_record) )
<section class="content">
	<div class="row">
		<div class="col-12">
			<!-- Validation wizard -->
			<div class="box box-default">
				<div class="box-header with-border">
					<h4 class="box-title" id="title">Vehicle Registration: Create Vehicle Profile</h4>
					<h4 class="box-subtitle">Complete the following details to create profile</h4>
				</div>
				<!-- /.box-header -->
				<div class="box-body wizard-content">
					<form action="{{ route('members.store') }}" method="POST" 
						id="member-form" class="validation-wizard wizard-circle" enctype='multipart/form-data'>
						{{ csrf_field() }}
						<input type="hidden" class="form-control required" id="member_id" value="{{$member_record->id ?? ''}}" name="member_id">
						<!-- Step 2 -->
						<hr class="mb-15 mt-0">
						<h4 class="box-title text-info"><i class="ti-car mr-15"></i> Vehicle Details</h4>
						<hr class="mb-15 mt-0">
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="regnumber">Registration Number : <span class="text-danger">*</span> </label>
										<input type="text" class="form-control required" id="regnumber" name="regnumber" maxlength="10">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="vehiclemake">Make : <span class="text-danger">*</span></label>
										<input type="text" class="form-control required" id="vehiclemake" name="vehiclemake" maxlength="20"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="vehiclemodel">Model : <span class="text-danger">*</span> </label>
										<input type="text" class="form-control required" id="vehiclemodel" name="vehiclemodel" maxlength="20">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="webUrl3">Year : <span class="text-danger">*</span></label>
										<input type="number" class="form-control required" id="webUrl3" name="vehicleyear" maxlength="4" min=2010> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="vehicleseats">Number of seats : <span class="text-danger">*</span></label>
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
						<hr class="mb-15 mt-0">
						<h4 class="box-title text-info"><i class="ti-map-alt mr-15"></i> Routes & Associations</h4>
						<hr class="mb-15 mt-0">
						<section id="create-member-routes-associations-section" disabled>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wintType1">Region: <span class="text-danger">*</span> </label>
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
										<label for="association">Association :<span class="text-danger">*</span>  </label>
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
										<label>Vehicle Route Details : <span class="text-danger">*</span></label>
										<hr class="mb-15 mt-0">
										<div id="route" name="route"></div>
									</div>
								</div>
							</div>
							
						</section>
						
						<div class="row">
							<div class="col-6 text-right">
								<input class="btn btn-info mb-5" type="submit" value="Add">
							</div>
							<div class="col-6 text-left">
								<a class="btn btn-warning mb-5" href="{{ route('members.index')}}">Cancel</a>
							</div>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endif
	
@endsection
