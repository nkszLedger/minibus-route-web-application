﻿@extends('index-3')

@section('content')

	<section class="content">
		<div class="row">
			<div class="col-12">
				<!-- Validation wizard -->
				<div class="box box-default">
					<div class="box-header with-border">
						<h4 class="box-title">Complete the following form.</h4>
						<h6 class="box-subtitle"></h6>
					</div>
					<!-- /.box-header -->
					<div class="box-body wizard-content">
						<form action="/create_member" type="POST" id="member-form" class="validation-wizard wizard-circle">
						{{ csrf_field() }}
							<input type="hidden" class="form-control " id="member-id" value="" name="member-id">

					<!-- Step 1 -->
							<h6>Personal Details</h6>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="wfirstName2"> First Name : <span class="danger">*</span> </label>
{{--                                                  <a href="#modal-default" data-toggle="modal" id="modal-button-id"  > <b>Profile</b></a>--}}

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
												<option value="">Please Select City</option>
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
												<option value="">Please Select Membership</option>
												@foreach ($all_types as $all_type)
													<option value="{{$all_type->id}}">{{$all_type->membership_type}}</option>
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
											<input type="number" class="form-control required" id="webUrl3" name="vehicleyear" maxlength="4"> </div>
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
										{{--                                              <div class="form-group">--}}
										{{--                                                  <label for="wint1">Interview For :</label>--}}
										{{--                                                  <input type="text" class="form-control required" id="wint1">--}}
										{{--                                              </div>--}}
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
											@foreach ($all_routes as $route)
												<input name="route[]" type="checkbox" id="{{$route->id}}" value="{{$route->id}}">
												<label for="{{$route->id}}" class="d-block">{{$route->id.'  :  '}}{{$route->origin}}{{' - '.$route->via.' - '}} {{$route->destination}}</label>
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
	

		<!-- member profile modal Area -->
		<div class="modal fade" id="modal-default">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Member Profile</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="modal_body_content">
						<h4>Personal Details</h4>
						<hr>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wfirstName2"> First Name : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="wfirstName2" name="firstName"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlastName2"> Last Name : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="wlastName2" name="lastName"> </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="idnumber"> ID Number : <span class="danger">*</span> </label>
										<input type="number" class="form-control required" id="idnumber" name="idnumber"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="licensenumber">Driver's License Number : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="licensenumber" name="licensenumber"> </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wemailAddress2"> Email Address :</label>
										<input type="email" class="form-control" id="wemailAddress2" name="emailAddress"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wphoneNumber2">Phone Number : <span class="danger">*</span>  </label>
										<input type="tel" class="form-control required" id="wphoneNumber2" name="phonenumber"> </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="addressline1">Address Line 1 : <span class="danger">*</span>  </label>
										<input type="text" class="form-control required" id="addressline1" name="addressline1"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="addressline2">Address Line 2 :</label>
										<input type="text" class="form-control" id="addressline2" name="addressline2"> </div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="membership-type"> Select Membership : <span class="danger">*</span> </label>
										<select class="custom-select form-control required" id="membership-type" name="membership-type">
											<option value="">Please Select Membership</option>
											{{--                                        @foreach ($all_members as $all_type)--}}
											{{--                                            <option value="{{$all_type['membership_type']['id']}}">{{$all_type['membership_type']['membership_type']}}</option>--}}
											{{--                                        @endforeach--}}
										</select>
									</div>
								</div>
								<div class="col-md-6">
								</div>
							</div>
						</section>

						<h4>Vehicle Details</h4>
						<hr>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="regnumber">Registration Number : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="regnumber" name="regnumber">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="vehiclemake">Make : <span class="danger">*</span></label>
										<input type="text" class="form-control required" id="vehiclemake" name="vehiclemake"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="vehiclemodel">Model : <span class="danger">*</span> </label>
										<input type="text" class="form-control required" id="vehiclemodel" name="vehiclemodel">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="webUrl3">Year : <span class="danger">*</span></label>
										<input type="text" class="form-control required" id="webUrl3" name="vehicleyear"> </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="vehicleseats">Number of seats : <span class="danger">*</span></label>
										<input type="number" class="form-control required" id="vehicleseats" name="vehicleseats">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									</div>
								</div>
							</div>
						</section>

						<h6>Association and Routes</h6>
						<section>
							<div class="row">
								<div class="col-md-6">
									{{--                                              <div class="form-group">--}}
									{{--                                                  <label for="wint1">Interview For :</label>--}}
									{{--                                                  <input type="text" class="form-control required" id="wint1">--}}
									{{--                                              </div>--}}
									<div class="form-group">
										<label for="wintType1">Region:</label>
										<select class="custom-select form-control required" id="wintType1" data-placeholder="Type to search cities" name="wintType1">
											<option value="Banquet">Tshwane</option>
											<option value="Fund Raiser">Region 1</option>
											<option value="Dinner Party">Region 2</option>
										</select>
									</div>
									<div class="form-group">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="association">Association :</label>
										<select class="custom-select form-control " id="association" name="association">
											<option id="association_option" value="">Please select Association</option>
											{{--                                        @foreach ($all_associations as $association)--}}
											{{--                                            <option value="{{$association->id}}">{{$association->name}}</option>--}}
											{{--                                        @endforeach--}}
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Route :</label>
										<hr class="mb-15 mt-0">
										{{--                                    @foreach ($all_routes as $route)--}}
										<input name="route[]" type="checkbox" id="route" value="Route 1">

										{{--                                        <input name="route" type="checkbox" id="{{$route->id}}" value="{{$route->id}}">--}}
										{{--                                        <label for="{{$route->id}}" class="d-block">{{$route->route_id.' : '}}{{$route->origin}}{{' - '.$route->via.' - '}} {{$route->destination}}</label>--}}
										{{--                                    @endforeach--}}
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								</div>
							</div>
						</section>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<a href="{{ url('show_member', 1)}}" type="submit" id="edit_button" class="btn btn-primary float-right">Edit </a>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
	</section>


	<script>

		$('#region').change(function(){
			var id = $(this).val();

			console.log(id);

			$('#association').find('option').not(':first').remove();
			$.ajax({
				url: 'getAssociations/'+id,
				type: 'get',
				dataType: 'json',
				success: function(response){

					var len = 0;
					if(response['data'] != null){
						len = response['data'].length;
					}

					if(len > 0){
						// Read data and create <option >
						for(var i=0; i<len; i++){

							var id = response['data'][i].association_id;
							var name = response['data'][i].name;

							console.log('the loop');
							console.log(name);

							var option = "<option value='"+id+"'>"+name+"</option>";

							console.log('the option to append');
							console.log(option);
							$("#association").append(option);
						}
						console.log('outside loop');


					}

				}
			});
		});

		//routes per association ajax function //TODO pull routes based of the selected association ID.

		$('#association').change(function(){
			var id = $(this).val();

			console.log(id);
			// alert(id);

			// $('#route').find('input').not(':first').remove();
			$.ajax({
				url: 'getRoutesPerAssociation/'+id,
				type: 'get',
				dataType: 'json',
				success: function(response){

					var len = 0;
					if(response['data'] != null){
						len = response['data'].length;
					}

					if(len > 0){
						// Read data and create <option >
						for(var i=0; i<len; i++){

							var id = response['data'][i].id;
							var route_name = response['data'][i].route_id +" : " + response['data'][i].origin + " - " + response['data'][i].via + " - " + response['data'][i].destination;

							console.log('the loop');
							console.log(route_name);

							var option = "<input  type='checkbox'  value='"+id+"'>"+ route_name  +
								"<label for='"+id+"' >" + route_name + "</label>";

						{{--<input name="route[]" type="checkbox" id="{{$route->id}}" value="{{$route->id}}">--}}
						{{--        <label for="{{$route->id}}" class="d-block">{{$route->origin_id. ' :  '}}{{$route->origin}}{{' - '.$route->via.' - '}} {{$route->destination}}</label>--}}

							console.log('the option to append');
							console.log(option);
							// $("#route").replaceWith(option);
						}
						console.log('outside loop');


					}

				}
			});
		});


	</script>
	

@endsection
