@extends('datacapturer.home')

@section('content')
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Employees Registration</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Registered Employees Summary</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- Main content -->
		<section class="content">
		  	<div class="row">
			  	<div class="col-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Registered Employees Summary</h3>
							@hasanyrole(['Systems Admin|Oversight'])
								<h6 class="box-subtitle">
									Export data to CSV, Excel, PDF & Print
								</h6>
							@else
								<h6 class="box-subtitle">
									View list of Registered Employees
								</h6>
							@endhasanyrole
						</div>
						
						<div class="box-body">
							<div class="table-responsive">
								@hasanyrole(['Systems Admin|Oversight'])
								<table id="example" class="table table-bordered table-hover" 
									style="width:100%">
								@else
								<table id="example2" class="table table-bordered table-hover" 
									style="width:100%">
								@endhasanyrole
									<thead>
										<tr>
											<th>#</th>
											<th>First Name</th>
                                            <th>Surname</th>
											<th>Phone Number</th>
											<th>Email</th>
											<th>Region</th>
											<th>Taxi Rank</th>
											<th>Rank Position</th>
											<th>Date Captured</th>
											<th>Actions</th>

											{{-- Hidden Columns --}}
											<th style="display:none;">Biometrics Captured</th>
											<th style="display:none;">SAID Number</th>
											<th style="display:none;">Gender</th>
											<th style="display:none;">Employee Number</th>
											<th style="display:none;">Emergency Contact Name</th>
											<th style="display:none;">Emergency Contact Number</th>
											<th style="display:none;">Emergency Contact Relationship</th>

											<th style="display:none;">Residential Address</th>
											<th style="display:none;">Suburb</th>
											<th style="display:none;">Postal Code</th>
											<th style="display:none;">City/Town</th>
											<th style="display:none;">Province</th>
											<th style="display:none;">Association</th>
											<th style="display:none;">Association Provided</th>

											<th style="display:none;">Regional Coordinator Name</th>
											<th style="display:none;">Regional Coordinator's Contact Details</th>
											<th style="display:none;">Cadet Taxi Rank</th>
											<th style="display:none;">Taxi Rank Provided</th>
											<th style="display:none;">Subordinate Taxi Ranks</th>
											<th style="display:none;">Taxi Rank Manager Name</th>
											<th style="display:none;">Taxi Rank Manager's Contact Details</th>

										</tr>
									</thead>

									<tbody>
									<?php
										$count = 1;
									?>
									@foreach($all_employees as $employee )
										<tr>
											<td>{{$count}}</td>

											<td>
												{{ $employee->name }}
											</td>
                                            <td>
												{{ $employee->surname }}
											</td>
                                            <td>
												{{ $employee->phone_number }}
											</td>
											<td>
												{{ $employee->email }}
											</td>
											<td>
												{{ $employee['region']['region_name'] }}
											</td>
											<td style="white-space:normal; width: 200px;">
												{{ $employee->organization->facility->name ?? ''}}
											</td>
                                            <td>
												{{ $employee['position']['position'] }}
											</td>
											<td>{{ $employee->created_at->format("d/m/Y") }}</td>

											<td>
												@if(Auth::user()->roles->pluck( 'name' )->contains('Oversight') )
												<a href="{{ route('employees.show', $employee->id)}}"> 
													<b>View Profile</b>
												</a>
												@else
												<a href="{{ route('employees.edit', $employee->id) }}">
													<b>Edit</b>
												</a> || 
												<a href="{{ route('employees.show', $employee->id)}}"> 
													<b>View Profile</b>
												</a>
												@endif
											</td>
											<td style="display:none;">
												{{-- @if( $employee['portrait']['id'] == ''
													&  $employee['fingerprint']['id'] == '')
													no
												@else
													yes
												@endif --}}
											</td>
											<td style="display:none;"> 
												{{ $employee->id_number }} 
											</td>
											<td style="display:none;"> 
												{{ $employee['gender']['type'] }} 
											</td>
											<td style="display:none;"> 
												{{ $employee->employee_number }} 
											</td> 
											<td style="display:none;"> 
												{{ $employee->emergency_contact_name }} 
											</td>
											<td style="display:none;"> 
												{{ $employee->emergency_contact_number }} 
											</td>
											<td style="display:none;"> 
												{{ $employee->emergency_contact_relationship }} 
											</td>

											<td style="display:none;"> {{ $employee->address_line }} </td>
											<td style="display:none;"> {{ $employee->surburb }} </td>
											<td style="display:none;"> {{ $employee->postal_code }} </td>
											<td style="display:none;"> {{ $employee['city']['city']}} </td>
											<td style="display:none;"> {{ $employee['province']['name']}} </td>

											<td style="display:none;"> 
												{{ $employee->organization->association->name ?? '' }} 
											</td>
											<td style="display:none;"> 
												{{ $employee->organization->association_name ?? '' }} 
											</td>
											<td style="display:none;"> 
												{{ $employee->organization->regional_coordinator_full_name ?? ''  }} 
											</td>
											<td style="display:none;"> 
												{{ $employee->organization->regional_coordinator_contact_details ?? '' }} 
											</td>
											<td style="display:none;"> 
												{{ $employee->organization->facility->name ?? ''  }} 
											</td>
											<td style="display:none;"> 
												{{ $employee->rank }} 
											</td>
											<td style="display:none;"> 
												{{ $employee->organization->subordinate_taxi_ranks ?? '' }} 
											</td>
											<td style="display:none;"> 
												{{ $employee->organization->facility_manager_full_name ?? '' }} 
											</td>
											<td style="display:none;"> 
												{{ $employee->organization->facility_manager_contact_details ?? '' }} 
											</td>
										</tr>
						  			<?php $count++?>
									@endforeach
									</tbody>
									<tfoot>
										<tr>
											<th>#</th>
											<th>First Name</th>
                                            <th>Surname</th>
											<th>Phone Number</th>
											<th>Email</th>
											<th>Region</th>
											<th>Taxi Rank</th>
											<th>Rank Position</th>
											<th>Date Captured</th>
											<th>Actions</th>

											{{-- Hidden Columns --}}
											<th style="display:none;">Biometrics Captured</th>
											<th style="display:none;">SAID Number</th>
											<th style="display:none;">Gender</th>
											<th style="display:none;">Employee Number</th>
											<th style="display:none;">Emergency Contact Name</th>
											<th style="display:none;">Emergency Contact Number</th>
											<th style="display:none;">Emergency Contact Relationship</th>

											<th style="display:none;">Residential Address</th>
											<th style="display:none;">Suburb</th>
											<th style="display:none;">Postal Code</th>
											<th style="display:none;">City/Town</th>
											<th style="display:none;">Province</th>
											<th style="display:none;">Association</th>
											<th style="display:none;">Association Provided</th>

											<th style="display:none;">Regional Coordinator Name</th>
											<th style="display:none;">Regional Coordinator's Contact Details</th>
											<th style="display:none;">Cadet Taxi Rank</th>
											<th style="display:none;">Taxi Rank Provided</th>
											<th style="display:none;">Subordinate Taxi Ranks</th>
											<th style="display:none;">Taxi Rank Manager Name</th>
											<th style="display:none;">Taxi Rank Manager's Contact Details</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
		 	</div>
			<!-- /.row -->
		</section>
	<!-- /.content -->
@endsection
