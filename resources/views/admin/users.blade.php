@extends('admin/home')

@section('content')
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">User Registration</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Registered Users Summary</li>
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
							<h4 class="box-title">Registered Users Summary</h4>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Full Names</th>
											<th>Email</th>
											<th>Date Created</th>
											<th>Role</th>
											<th>Status</th>
											<th>Action</th>
											{{-- <th></th> --}}
										</tr>
									</thead>

									<tbody>
									<?php
										$count = 1;
									?>
									@foreach($all_users as $user )
										<tr>
											<td>{{$count}}</td>
											<td>{{ $user['employees']['name'] }} {{ $user['employees']['surname']  }}</td>
											<td>{{ $user['employees']['email'] }}</td>
											<td>
												<span class="text-muted">{{ $user->created_at }}</span>
											</td>
											<td>{{ $all_roles['roles']['name'] }}</td>
											<td>
												{{-- {% if user.is_active %} --}}
												<span class="badge badge-pill badge-success">Active</span>
												{{-- {% else %}
													<span class="badge badge-pill badge-danger">Inactive</span>
												{% endif %} --}}
									     	</td>
											 <td>
												<a href="#"><b>Edit</b></a> 
											</td>
											{{-- <td><a href="{% url 'portfolio:editUser' profile.id %}"><span class="glyphicon glyphicon-pencil"></span></a></td> --}}
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