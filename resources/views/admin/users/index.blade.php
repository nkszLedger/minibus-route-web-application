@extends('datacapturer.home')


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
											<th>Name</th>
											<th>Surname</th>
											<th>Email</th>
											<th>Role</th>
											<th>Date Created</th>
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
											<td>{{ $user['name'] }}</td>
											<td>{{ $user['surname']  }}</td>
											<td>{{ $user['email'] }}</td>
											<td>{{ $user->getRoleNames()->first() }}</td>
											<td>
												<span class="text-muted">{{ $user->created_at }}</span>
											</td>
											<td>
												@if( $user->email_verified_at !== null )
												<span class="badge badge-pill badge-success">Active</span>
												@else
													<span class="badge badge-pill badge-danger">Inactive</span>
												@endif
									     	</td>
											 <td>
											 	<div class="row">
												 	<div class="col-xl-2">
														<button type="submit" class="btn btn-sm btn-rounded btn-secondary" 
															value="EDIT">EDIT</button>
													</div>
													<div class="col-xl-2">
													@if( $user->email_verified_at !== null )
														@if( $user->trashed() )
															<button type="submit" class="btn btn-sm btn-rounded btn-primary" 
																id="activate" onclick="activate('{{ $user->id }}')">
																	ACTIVATE
															</button>
														@else
															<button type="submit" class="btn btn-sm btn-rounded btn-warning" 
																id="deactivate" onclick="deactivate('{{ $user->id }}')">
																	DEACTIVATE
															</button>
														@endif
													@endif
													</div>
												</div> 	
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
