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
							<h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100" 
									style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Firstname</th>
                                            <th>Surname</th>
											<th>Employee Number</th>
											<th>Phone Number</th>
											<th>Address Line</th>
                                            <th>City</th>
											<th>Region</th>
                                            <th>Province</th>
											<th>Profile Status</th>
											<th>Actions</th>
										</tr>
									</thead>

									<tbody>
									<?php
										$count = 1;
									?>
									@foreach($all_employees as $employee )
										<tr>
											<td>{{$count}}</td>
											<td>{{ $employee->name }}</td>
                                            <td>{{ $employee->surname }}</td>
                                            <td>{{ $employee->employee_number }}</td>
                                            <td>{{ $employee->phone_number }}</td>
                                            <td>{{ $employee->address_line }}</td>
                                            <td>{{ $employee['city']['city'] }}</td>
											<td>{{ $employee['region']['region_name'] }}</td>
											<td>{{ $employee['province']['name'] }}</td>
											<td>
												<span class="badge badge-pill badge-danger">Coming Soon</span>
											</td>
											<td>
												<a href="{{ route('employees.edit', $employee->id) }}">
													<b>Edit</b>
												</a> || 
												<a href="{{ route('employees.show', $employee->id)}}"> 
													<b>View Profile</b>
												</a>
											</td>
										</tr>
						  			<?php $count++?>
									@endforeach
									</tbody>
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
