@extends('index-3')

@section('content')

	<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-12">
					<!-- Validation wizard -->
					<div class="box box-default">
						<div class="box-header with-border">
							<h4 class="box-title">Complete the following form to update member.</h4>
							<h6 class="box-subtitle"></h6>
						</div>
						<!-- /.box-header -->
						<div class="box-body wizard-content">
							<form action="/create_member" type="POST" id="member-form" class="validation-wizard wizard-circle">
							{{ csrf_field() }}
								<input type="hidden" class="form-control" id="member-id" value="{{$member_record->id}}" name="member-id">
						<!-- Step 1 -->
								<h6>Personal Details</h6>
								<section>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="wfirstName2"> First Name : <span class="danger">*</span> </label>
												<input type="text" class="form-control required" id="wfirstName2" value="{{$member_record->name}}" name="firstName"> </div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="wlastName2"> Last Name : <span class="danger">*</span> </label>
												<input type="text" class="form-control required" id="wlastName2" value="{{$member_record->surname}}" name="lastName"> </div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="idnumber"> ID Number : <span class="danger">*</span> </label>
												<input type="number" class="form-control required" id="idnumber" name="idnumber" value="{{$member_record->id_number}}" maxlength="13"> </div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="licensenumber"> License Number : <span class="danger">*</span> </label>
												<input type="text" class="form-control required" id="licensenumber" value="{{$member_record->license_number}}" name="licensenumber"> </div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="wemailAddress2"> Email Address : <span class="danger">*</span> </label>
												<input type="email" class="form-control" id="wemailAddress2" value="{{$member_record->email}}" name="emailAddress"> </div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="wphoneNumber2">Phone Number : <span class="danger">*</span>  </label>
												<input type="tel" class="form-control required" id="wphoneNumber2" value="{{$member_record->phone_number}}" name="phonenumber" maxlength="10"> </div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="addressline1">Address Line 1 :</label>
												<input type="text" class="form-control required" id="addressline1" value="{{$member_record->address_line_one}}" name="addressline1"> </div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="membership-type"> Select Membership : <span class="danger">*</span> </label>
												<select class="custom-select form-control required" id="membership-type" name="membership-type">
													<option value="null">Please Select Membership</option>
													@foreach($all_member_types as $all_member_type)
{{--                                                        @if($member_record->membership_type !== null)--}}
														@if($all_member_type->id === $member_record['membership_type']['id'] )
															<option selected value="{{$member_record['membership_type']['id']}}">{{$member_record['membership_type']['membership_type']}}</option>
														@else
															<option  value="{{$all_member_type['id']}}">{{$all_member_type['membership_type']}}</option>
														@endif
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-md-6">

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
												<input type="text" class="form-control required" id="regnumber" value="{{$member_record['vehicles'][0]['registration_number']}}" name="regnumber">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="vehiclemake">Make : <span class="danger">*</span></label>
												<input type="text" class="form-control required" id="vehiclemake" value="{{$member_record['vehicles'][0]['make']}}" name="vehiclemake"> </div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="vehiclemodel">Model : <span class="danger">*</span> </label>
												<input type="text" class="form-control required" id="vehiclemodel" value="{{$member_record['vehicles'][0]['model']}}" name="vehiclemodel">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="webUrl3">Year : <span class="danger">*</span></label>
												<input type="text" class="form-control required" id="webUrl3" value="{{$member_record['vehicles'][0]['year']}}" name="vehicleyear"> </div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="vehicleseats">Number of seats : <span class="danger">*</span></label>
												<input type="number" class="form-control required" id="vehicleseats" value="{{$member_record['vehicles'][0]['seats_number']}}"  name="vehicleseats">
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
												<label for="wintType1">Region: <span class="danger">*</span></label>
												<select class="custom-select form-control required" id="region" data-placeholder="Type to search cities" name="region">
													<option value="">Please select Region</option>
													@foreach ($all_regions as $region)
														@if($region->region_id === $member_record['region']['region_id'] )
															<option  selected value="{{$member_record['region']['region_id']}}">{{$member_record['region']['region_name']}}</option>
														@else
															<option value="{{$region->region_id}}">{{$region->region_name}}</option>
														@endif
													@endforeach
												</select>
											</div>
											<div class="form-group">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="association">Association : <span class="danger">*</span></label>
												<select class="custom-select form-control required " id="association" name="association">
													<option value="">Please select Association</option>
													@foreach ($all_associations as $association)
														@if($association->association_id === $member_record['member_association']['association_id'] )
														<option selected value="{{$member_record['member_association']['association_id']}}">{{$member_record['member_association']['name']}}</option>
														@else
															<option  value="{{$association['association_id']}}">{{$association['name']}}</option>
														@endif
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label>Route :</label>
												<hr class="mb-15 mt-0 c-inputs-stacked">
												@foreach ($all_routes as $route)
													@if($route->route_id === $member_vehicle_routes[0]['routes'][0]['route_id'])
														<input checked="checked" name="route[]" type="checkbox" id="{{$route->id}}" value="{{$route->id}}">
														<label for="{{$route->id}}" class="d-block">{{$member_vehicle_routes[0]['routes'][0]['route_id'].' :'}}{{$member_vehicle_routes[0]['routes'][0]['origin'].' - '}}{{$member_vehicle_routes[0]['routes'][0]['via'].' - '}}{{$member_vehicle_routes[0]['routes'][0]['destination']}}</label>
													@else
														<input name="route[]" type="checkbox" id="{{$route->id}}" value="{{$route->id}}">
														<label for="{{$route->id}}" class="d-block">{{$route->route_id.' : '}}{{$route->origin.' - '}}{{$route->via.' - '}}{{$route->destination}}</label>
													@endif
												@endforeach
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