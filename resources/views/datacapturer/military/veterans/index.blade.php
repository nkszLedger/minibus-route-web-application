@extends('datacapturer.home')

@section('content')
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">MKV School Cadets Registration</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Registered Military Veterans Summary</li>
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
							<h3 class="box-title">Registered Military Veterans Summary</h3>
							@hasanyrole(['Systems Admin|Oversight'])
								<h6 class="box-subtitle">
									Export data to CSV, Excel, PDF & Print
								</h6>
							@else
								<h6 class="box-subtitle">
									View list of Registered Military Veterans
								</h6>
							@endhasanyrole
						</div>
						
						<div class="box-body">
							<div class="table-responsive">
								@hasanyrole(['Systems Admin|Oversight'])
								<table id="mvdatatable" class="table table-bordered table-hover" 
									style="width:100%">
								@else
								<table id="example2" class="table table-bordered table-hover" 
									style="width:100%">
								@endhasanyrole
									<thead>
										<tr>
											<th>#</th>
                                            <th>First Name </th>
                                            <th>Surname </th>
                                            <th>Phone Number </th>
                                            <th>Email Address </th>
                                            <th>Region </th>
                                            <th>Region Leader Name </th>
                                            <th>Date Captured</th>
											<th>Actions</th>
                                            
                                            {{-- Hidden Columns --}}
                                            <th style="display:none;">National ID Number </th>
                                            <th style="display:none;">Address Line </th>
                                            <th style="display:none;">Surburb </th>
                                            <th style="display:none;">postal_code </th>
                                            <th style="display:none;">City </th>
                                            <th style="display:none;">Province </th>
                                            <th style="display:none;">Gender </th>
                                            <th style="display:none;">emergency_contact_name </th>
                                            <th style="display:none;">emergency_contact_relationship </th>
                                            <th style="display:none;">emergency_contact_number </th>
                                            <th style="display:none;">region_leader_contact_number </th>
                                            <th style="display:none;">number_of_delegated_schools </th>
                                            <th style="display:none;">list_of_delegated_schools</th>

										</tr>
									</thead>

									<tbody>
									<?php
										$count = 1;
									?>
									@foreach($all_military_veterans as $military_veteran )
										<tr>
											<td>{{$count}}</td>
                                            <td> {{ $military_veteran->name }} </td>
                                            <td> {{ $military_veteran->surname }} </td>
                                            <td> {{ $military_veteran->phone_number }} </td>
                                            <td> {{ $military_veteran->email }} </td>
                                            <td> {{ $military_veteran['region']['region_name'] }} </td>
                                            <td> {{ $military_veteran->region_leader_name }} </td>
                                            
                                            <td> {{$military_veteran->created_at->format("d/m/Y") }} </td>
											
                                            <td>
												@if(Auth::user()->roles->pluck( 'name' )->contains('Oversight') )
												<a href="{{ route('military-veterans.show', $military_veteran->id)}}"> 
													<b>View Profile</b>
												</a>
												@else
												<a href="{{ route('military-veterans.edit', $military_veteran->id) }}">
													<b>Edit</b>
												</a> || 
												<a href="{{ route('military-veterans.show', $military_veteran->id)}}"> 
													<b>View Profile</b>
												</a>
												@endif
											</td>

                                            <td style="display:none;"> {{ $military_veteran->id_number }} </td>
                                            <td style="display:none;"> {{ $military_veteran->address_line }} </td>
                                            <td style="display:none;"> {{ $military_veteran->surburb }} </td>
                                            <td style="display:none;"> {{ $military_veteran->postal_code }} </td>
                                            <td style="display:none;"> {{ $military_veteran['city']['city'] }} </td>
                                            <td style="display:none;"> {{ $military_veteran['province']['name'] }} </td>
                                            <td style="display:none;"> {{ $military_veteran['gender']['type'] }} </td>
                                            <td style="display:none;"> {{ $military_veteran->emergency_contact_name }} </td>
                                            <td style="display:none;"> {{ $military_veteran->emergency_contact_relationship }} </td>
                                            <td style="display:none;"> {{ $military_veteran->emergency_contact_number }} </td>
                                            <td style="display:none;"> {{ $military_veteran->region_leader_contact_number }} </td>
                                            <td style="display:none;"> {{ $military_veteran->number_of_delegated_schools }} </td>
                                            <td style="display:none;"> {{ $military_veteran->list_of_delegated_schools }} </td>
										</tr>
						  			<?php $count++?>
									@endforeach
									</tbody>
									<tfoot>
										<tr>
											<th>#</th>
                                            <th>First Name </th>
                                            <th>Surname </th>
                                            <th>Phone Number </th>
                                            <th>Email Address </th>
                                            <th>Region </th>
                                            <th>Region Leader Name </th>
                                            <th>Date Captured</th>
											<th>Actions</th>
                                            
                                            {{-- Hidden Columns --}}
                                            <th style="display:none;">National ID Number </th>
                                            <th style="display:none;">Address Line </th>
                                            <th style="display:none;">Surburb </th>
                                            <th style="display:none;">postal_code </th>
                                            <th style="display:none;">City </th>
                                            <th style="display:none;">Province </th>
                                            <th style="display:none;">Gender </th>
                                            <th style="display:none;">emergency_contact_name </th>
                                            <th style="display:none;">emergency_contact_relationship </th>
                                            <th style="display:none;">emergency_contact_number </th>
                                            <th style="display:none;">region_leader_contact_number </th>
                                            <th style="display:none;">number_of_delegated_schools </th>
                                            <th style="display:none;">list_of_delegated_schools</th>

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
