@extends('datacapturer.home')

@section('content')

@if( isset($member_record) )
<section class="content">
	<div class="row">

		<div class="col-12">
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">
                        Vehicle Management: Vehicle Profiles Summary for MEMBER: 
                        {{ $member_record->name }} {{ $member_record->surname }}
                    </h4>
					<h4 class="box-subtitle">Showing Registered Vehicles Profiles</h4>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
						<table id="example2" class="table table-striped table-bordered 
								table-hover display nowrap margin-top-10 w-p100">
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
								@if( isset($member_vehicles) )
								@foreach($member_vehicles as $vehicle)
								<tr>
									<td>{{ $count }}</td>
									<td>{{ $vehicle['vehicles']['registration_number'] }}</td> 
									<td>{{ $vehicle['vehicles']['vehicleclass']['make'] }}</td>
									<td>{{ $vehicle['vehicles']['vehicleclass']['model'] }}</td>
									<td>{{ $vehicle['vehicles']['vehicleclass']['year'] }}</td>
									<td>{{ $vehicle['vehicles']['vehicleclass']['seats_number'] }}</td>
									<td>
										<a href="{{ route('vehicles.show', $vehicle->id) }}" 
											class="hover-info text-primary">
												 <b>View Details</b>
										</a> | 
										<a href="{{ route('vehicles.destroy', $vehicle->id) }}"> 
											<i class="ion ion-trash"></i> <b>Delete</b> 
										</a>
									</td>
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
@if( $member_record->is_member_associated )
<section class="content">
	<div class="row">
		<div class="col-12">
			<!-- Validation wizard -->
			<div class="box box-default">
				<div class="box-header with-border">
					<h4 class="box-title"> Vehicle Registration: Create Vehicle Profile(s) for 
                        MEMBER: {{ $member_record->name }} {{ $member_record->surname }}
                    </h4>
					<h4 class="box-subtitle">Complete the following details to create profile</h4>
				</div>
				<!-- /.box-header -->
				<div class="box-body wizard-content">
					<form action="{{ route('vehicles.store') }}" method="POST" 
						id="member-form" class="validation-wizard wizard-circle">
						{{ csrf_field() }}
						<input type="hidden" class="form-control" id="member_id" 
							value="{{$member_record->id ?? ''}}" name="member_id">
						<!-- Step 2 -->
						<div class="form-group">
							@if (count($errors) > 0)
								<div class="text-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
						</div>
						<hr class="mb-15 mt-0">
						<h4 class="box-title text-info"><i class="ti-car mr-15"></i> Vehicle Details</h4>
						<hr class="mb-15 mt-0">
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="regnumber">Registration Number : 
											<span class="text-danger">*</span> 
										</label>
										<input type="text" class="form-control" 
											id="regnumber" name="regnumber" 
											maxlength="10" value="{{old('regnumber') ?? ''}}">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5 for="vehicle_class">Vehicle : 
											<span class="text-danger">*</span> 
										</h5>
										<select class="custom-select form-control" 
											id="vehicle_class" name="vehicle_class">
											<option value="">Please select Vehicle</option>
											@foreach ($all_vehicle_classes as $vehicle_class)
												<option value="{{$vehicle_class->id}}">
													{{$vehicle_class->make}}; 
													{{$vehicle_class->model}}; 
													{{$vehicle_class->year}} - range; 
													{{$vehicle_class->seats_number}} - seater; 
												</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group" id="vehicleregnoexistance"></div>
								</div>

								<div class="col-md-6">
									<div class="form-group" id="notes" >
										<label for="notes">About Vehicle : 
											<span class="text-danger">*</span> 
										</label>
										<textarea class="form-control" 
											placeholder="e.g. This is a 2015, VW XY model, currently taking 8 seats" 
											 name="notes"> {{old('notes') ?? ''}}
										</textarea>
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
										<label for="wintType1">Region: 
											<span class="text-danger">*</span> 
										</label>
										<select class="custom-select form-control" 
											id="region" data-placeholder="Type to search cities" 
												name="region">
											<option selected value="">Please select Region</option>
											@foreach ($all_regions as $region)
												<option value="{{$region->region_id}}">
													{{$region->region_name}}
												</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="association">Association :
											<span class="text-danger">*</span>  
										</label>
										<select class="custom-select form-control " 
											id="association" name="association">
											<option selected value="">Please select Association</option>
											@foreach ($all_associations as $association)
												<option value="{{$association->association_id}}">
													{{$association->name}}
												</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Vehicle Route Details : 
											<span class="text-danger">*</span>
										</label>
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
@endif

@endsection