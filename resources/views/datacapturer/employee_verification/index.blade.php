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
							<h6 class="box-subtitle">
								Check below to change verification state of employee. Save Changes to submit.
							</h6>
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
											<th>SA ID Number</th>
											<th>Date Captured</th>
											<th>Association Approved</th>
                                            <th>Letter Issued</th>
                                            <th>Letter Signed</th>
											<th>Verification Status</th>
											<th>Actions</th>
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
												{{ $status['employee']['id_number'] ?? '' }}
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
																	name="associationapprovedcheckbox_{{ $status->employee_id }}"
																	id="associationapprovedcheckbox_{{ $status->employee_id }}" 
																	checked>
																<label for="associationapprovedcheckbox_{{ $status->employee_id }}"></label>
															@else
																<input type="checkbox" 
																	name="associationapprovedcheckbox_{{ $status->employee_id }}"
																	id="associationapprovedcheckbox_{{ $status->employee_id }}">
																<label for="associationapprovedcheckbox_{{ $status->employee_id }}"></label>
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
																	name="isletterissuedcheckbox_{{ $status->employee_id }}"
																	id="isletterissuedcheckbox_{{ $status->employee_id }}"
																	checked>
																<label for="isletterissuedcheckbox_{{ $status->employee_id }}"></label>
															@else
																<input type="checkbox" 
																	name="isletterissuedcheckbox_{{ $status->employee_id }}"
																	id="isletterissuedcheckbox_{{ $status->employee_id }}">
																<label for="isletterissuedcheckbox_{{ $status->employee_id }}"></label>
															@endif	
														</div>
													</div>
												</div>
											</td>
                                            <td>
												<div class="form-group row">
													<div class="ml-auto col-sm-10">
														<div class="checkbox">
															@if( $status->letter_signed )
																<input type="checkbox" 
																	name="islettersignedcheckbox_{{ $status->employee_id }}"
																	id="islettersignedcheckbox_{{ $status->employee_id }}"
																	checked>
																<label for="islettersignedcheckbox_{{ $status->employee_id }}"></label>
															@else
																<input type="checkbox" 
																	name="islettersignedcheckbox_{{ $status->employee_id }}"
																	id="islettersignedcheckbox_{{ $status->employee_id }}">
																<label for="islettersignedcheckbox_{{ $status->employee_id }}"></label>
															@endif	
														</div>
													</div>
												</div>
											</td>
											<td>
												@if( $status->association_approved &
														$status->letter_issued & 
														$status->letter_signed)
												<span class="badge badge-pill badge-success">Verified</span>
												@else
													<span class="badge badge-pill badge-danger">Not Verified</span>
												@endif
											</td>
											<td>
												{{-- <button type="submit" data-toggle="modal" data-target="#employee-verify" 
													class="btn btn-success" > --}}
												<button type="submit" class="btn btn-success"
													onclick="verify('{{ $status->employee_id }}')">
													Save Changes
												</button>
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
											<th>SA ID Number</th>
											<th>Date Captured</th>
											<th>Association Approved</th>
                                            <th>Letter Issued</th>
                                            <th>Letter Signed</th>
											<th>Verification Status</th>
											<th>Actions</th>
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
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>South African ID Number</label>
								<input type="text" class="form-control" name="verify-id-number" 
                                    maxlength=13 min=13 id="verify-id-number" 
                                    required data-validation-required-message="This field is required" 
									placeholder="XXXXXXXXXXXXX">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" class="form-control" placeholder="Last Name">
							</div>
						</div>
					</div>
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
