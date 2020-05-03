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
									<th>#</th>
									<th>Name</th>
									<th>Surname</th>
									<th>ID Number</th>
									<th>Association</th>
									<th>Membership Type</th>
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