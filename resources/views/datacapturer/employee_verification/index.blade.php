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
							<button type="submit" data-toggle="modal" 
								data-target="#employee-verify" class="btn btn-success pull-right">
								Verify Employee
							</button>
						</div>
						
						<div class="box-body">
							<div class="table-responsive">
								{{-- @hasanyrole(['Systems Admin|Oversight']) --}}
								<table id="example2" class="table table-bordered table-hover" 
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
												{{ $status['employee']['name'] ?? '' }}
											</td>
                                            <td>
												{{ $status['employee']['surname'] ?? ''}}
											</td>
                                            <td>
												{{ $status['employee']['position']['position'] ?? '' }}
											</td>
                                            <td>
												{{ $status['employee']['created_at'] ?? ''}}
											</td>
                                            <td>
												<div class="form-group row">
													<div class="ml-auto col-sm-10">
														<div class="checkbox">
															@if( $status->association_approved )
																<input type="checkbox" 
																	name="associationapprovedcheckbox_{{ $status->id }}"
																	id="associationapprovedcheckbox_{{ $status->id }}"
																	checked>
																<label for="associationapprovedcheckbox_{{ $status->id }}"></label>
															@else
																<input type="checkbox" 
																	name="associationapprovedcheckbox_{{ $status->id }}"
																	id="associationapprovedcheckbox_{{ $status->id }}">
																<label for="associationapprovedcheckbox_{{ $status->id }}"></label>
															@endif	
														</div>
													</div>
												</div>
											</td>
                                            <td>
												<div class="form-group row">
													<div class="ml-auto col-sm-10">
														<div class="checkbox">
															@if( $status->letter_issued )
																<input type="checkbox" 
																	name="isletterissuedcheckbox_{{ $status->id }}"
																	id="isletterissuedcheckbox_{{ $status->id }}"
																	checked>
																<label for="isletterissuedcheckbox_{{ $status->id }}"></label>
															@else
																<input type="checkbox" 
																	name="isletterissuedcheckbox_{{ $status->id }}"
																	id="isletterissuedcheckbox_{{ $status->id }}">
																<label for="isletterissuedcheckbox_{{ $status->id }}"></label>
															@endif	
														</div>
													</div>
												</div>
											</td>
                                            <td>
												<div class="form-group row">
													<div class="ml-auto col-sm-10">
														<div class="checkbox">
															@if( $status->letter_issued )
																<input type="checkbox" 
																	name="islettersignedcheckbox_{{ $status->id }}"
																	id="islettersignedcheckbox_{{ $status->id }}"
																	checked>
																<label for="islettersignedcheckbox_{{ $status->id }}"></label>
															@else
																<input type="checkbox" 
																	name="islettersignedcheckbox_{{ $status->id }}"
																	id="islettersignedcheckbox_{{ $status->id }}">
																<label for="islettersignedcheckbox_{{ $status->id }}"></label>
															@endif	
														</div>
													</div>
												</div>
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

		<!-- Modal -->
		<div class="modal center-modal fade" id="employee-verify" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Your content comes here</p>
				</div>
				<div class="modal-footer modal-footer-uniform">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary float-right">Save changes</button>
				</div>
				</div>
			</div>
		</div>
		<!-- /.modal -->

	<!-- /.content -->
@endsection
