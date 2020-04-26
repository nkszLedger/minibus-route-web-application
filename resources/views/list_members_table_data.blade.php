@extends('index-3')

@section('content')

<!-- Main content -->
<section class="content">
	<div class="row">

		<div class="col-12">
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">List of Members</h4>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
						<table id="example2" class="table table-striped table-bordered table-hover display nowrap margin-top-10 w-p100">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Surname</th>
									<th>ID Number</th>
									<th>Association</th>
									<th>Membership Type</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$count = 1;
								?>
								@if($all_members !== null)
								@foreach($all_members as $member)
								<tr>
									<td>{{$count}}</td>
									<td>{{$member->name}} </td>
									<td>{{$member->surname}}</td>
									<td>{{$member->id_number}}</td>
									<td>{{$member['member_association']['name']}}</td>
									<td>{{$member['membership_type']['membership_type']}}</td>
									<td>
										<a href="{{ url('show_member', $member->id)}}"><b>Edit</b></a> |
										{{-- <a href="#" data-toggle="modal" data-target="#modal-default" id="modal-button-id"  > <b>Profile</b></a> |--}}
										<a href="{{ url('showmodal', $member->id)}}"> <b>View Profile</b></a>

									</td>
								</tr>
								<?php $count++?>
								@endforeach
								@endif
							</tbody>
							<tfoot>
								<tr>
									<th style="display:none;">#</th>
									<th>Name</th>
									<th>Surname</th>
									<th>ID Number</th>
									<th>Association</th>
									<th>Membership Type</th>
									<th >Action</th>
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



<!-- member profile modal Area -->
<div class="modal fade" id="modal-default">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Member Profile</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
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
								<input type="number" class="form-control required" id="idnumber" name="idnumber" maxlength="13" pattern="[0-9]"> </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="licensenumber"> License Number : <span class="danger">*</span> </label>
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
								<label for="wphoneNumber2">Phone Number : <span class="danger">*</span> </label>
								<input type="tel" class="form-control required" id="wphoneNumber2" name="phonenumber" pattern="[0-9]" maxlength="10"> </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="addressline1">Address Line 1 : <span class="danger">*</span> </label>
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
									{{-- @foreach ($all_members as $all_type)--}}
									{{-- <option value="{{$all_type['membership_type']['id']}}">{{$all_type['membership_type']['membership_type']}}</option>--}}
									{{-- @endforeach--}}
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
							{{-- <div class="form-group">--}}
							{{-- <label for="wint1">Interview For :</label>--}}
							{{-- <input type="text" class="form-control required" id="wint1">--}}
							{{-- </div>--}}
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
								<select class="custom-select form-control " id="wLocation1" name="association">
									<option value="">Please select Association</option>
									{{-- @foreach ($all_associations as $association)--}}
									{{-- <option value="{{$association->id}}">{{$association->name}}</option>--}}
									{{-- @endforeach--}}
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Route :</label>
								<hr class="mb-15 mt-0">
								{{-- @foreach ($all_routes as $route)--}}
								<input name="route" type="checkbox" id="id" value="Route 1">

								{{-- <input name="route" type="checkbox" id="{{$route->id}}" value="{{$route->id}}">--}}
								{{-- <label for="{{$route->id}}" class="d-block">{{$route->origin}}{{' - '.$route->via.' - '}} {{$route->destination}}</label>--}}
								{{-- @endforeach--}}
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
				@foreach($all_members as $member)
				<a href="{{ url('show_member', $member->id)}}" type="submit" id="edit_button" class="btn btn-primary float-right">Edit </a>
				@endforeach
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection