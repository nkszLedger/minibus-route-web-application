@extends('datacapturer.home')

@section('content')

<!-- Main content -->
<section class="content">
	<div class="row">

		<div class="col-12">
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">Member Management: Member Profiles</h4>
					<h4 class="box-subtitle">Showing Registered Member Profiles</h4>
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
									<th>Email</th>
									<th>City</th>
									<th>Membership Type</th>
									<th>Verification Status</th>
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
									<td>{{$member->email}}</td>
									<td>{{$member['city']['city']}}</td>
									<td>{{$member['membership_type']['membership_type']}}</td>
									<td>
										<span class="badge badge-pill badge-danger">Coming Soon</span>
									</td>
									<td>
										<a href="{{ route('members.edit', $member->id)}}"><b>Edit</b></a> | 
										<a href="{{ route('members.show', $member->id)}}"><b>View Profile</b></a> | 
										<a href="{{ route('vehicles.create', $member->id)}}"><b>Add Vehicles</b></a>
									</td>
								</tr>
								<?php $count++?>
								@endforeach
								@endif
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Surname</th>
									<th>Email</th>
									<th>City</th>
									<th>Membership Type</th>
									<th>Verification Status</th>
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

@endsection