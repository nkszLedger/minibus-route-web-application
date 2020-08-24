@extends('datacapturer.home')

@section('content')
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Employees Verification</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
                                    <a href="#">
                                        <i class="mdi mdi-home-outline"></i>
                                    </a>
                                </li>
								<li class="breadcrumb-item active" aria-current="page">
                                    Employee Verification Status Summary
                                </li>
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
							<h3 class="box-title">Employee Verification Status Summary</h3>
						</div>
						
						<div class="box-body">
							<div class="table-responsive">
								{{-- @hasanyrole(['Systems Admin|Oversight']) --}}
								<table id="example" class="table table-bordered table-hover" 
									style="width:100%">
								{{-- @else
								<table id="example2" class="table table-bordered table-hover" 
									style="width:100%">
								@endhasanyrole --}}
									<thead>
										<tr>
											<th>#</th>
											<th>First Name</th>
                                            <th>Surname</th>
											<th>Rank Position</th>
											<th>Date Captured</th>
											<th>Association Approved</th>
                                            <th>Letter Issued</th>
                                            <th>Letter Signed</th>
										</tr>
									</thead>

									<tbody>
									<?php
										$count = 1;
									?>
									@foreach($all_employees as $status )
										<tr>
											<td>{{$count}}</td>
                                            <td>
												{{ $status['employee']['name'] }}
											</td>
                                            <td>
												{{ $status['employee']['surname'] }}
											</td>
                                            <td>
												{{ $status['employee']['position']['position'] }}
											</td>
                                            <td>
												{{ $status['employee']['date_created'] }}
											</td>
                                            <td>
												<input type="checkbox" 
                                                    name="ismemberassociationapprovedcheckbox_{{ $status['employee']['id'] }}"
                                                    id="ismemberassociationapprovedcheckbox_{{ $status['employee']['id'] }}" 
                                                    value="{{ $status['employee']['id'] }}">
											</td>
                                            <td>
												<input type="checkbox" 
                                                    name="isletterissuedcheckbox_{{ $status['employee']['id'] }}"
                                                    id="isletterissuedcheckbox_{{ $status['employee']['id'] }}" 
                                                    value="{{ $status['employee']['id'] }}">
											</td>
                                            <td>
												<input type="checkbox" 
                                                    name="islettersignedcheckbox_{{ $status['employee']['id'] }}"
                                                    id="islettersignedcheckbox_{{ $status['employee']['id'] }}" 
                                                    value="{{ $status['employee']['id'] }}">
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
											<th>Rank Position</th>
											<th>Date Captured</th>
											<th>Association Approved</th>
                                            <th>Letter Issued</th>
                                            <th>Letter Signed</th>
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
