@extends('admin/home')

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
							<h4 class="box-title">Registered Employees Summary</h4>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Firstname</th>
                                            <th>Surname</th>
											<th>National ID Number</th>
											<th>Employee Number</th>
											<th>Phone Number</th>
											<th>Email</th>
											<th>Address Line</th>
                                            <th>City</th>
                                            <th>Postal Code</th>
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
											<td>{{ $employee->idnumber }}</td>
                                            <td>{{ $employee->employee_number }}</td>
                                            <td>{{ $employee->phonenumber }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->addressline1 }}</td>
                                            <td>{{ $employee->city }}</td>
                                            <td>{{ $employee->postal-code }}</td>
											 <td>
												<a href="#"><b>Edit</b></a> |
												<a href="#"> <b>View Profile</b></a>
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
