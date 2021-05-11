@extends('datacapturer.home')

@section('content')
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Military Veteran Verification</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
                                    <a href="#">
                                        <i class="mdi mdi-home-outline"></i>
                                    </a>
                                </li>
								<li class="breadcrumb-item active" aria-current="page">
                                    Military Veteran Status Summary
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
							<h3 class="box-title">Military Veteran Verification Status Summary</h3>
							<h6 class="box-subtitle">
								Check below to change verification state of Military Veterans. Save Changes to submit.
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
											<th>SA ID Number</th>
											<th>Date Captured</th>
											<th>Association Approved</th>
                                            <th>Letter Issued</th>
                                            <th>Letter Signed</th>
											<th>Banking Details Confirmed</th>
											<th>Verification Status</th>
											<th>Actions</th>
										</tr>
									</thead>

									<tbody>
									<?php
										$count = 1;
									?>
									@foreach($all_military_veterans as $status )
										<tr>
											<td>{{$count}}</td>
                                            <td> 
												{{ $status['military_veteran']['name'] ?? '' }}
											</td>
                                            <td>
												{{ $status['military_veteran']['surname'] ?? ''}}
											</td>
											<td>
												{{ $status['military_veteran']['id_number'] ?? '' }}
											</td>
                                            <td>
												{{ $status['military_veteran']['created_at'] ?? ''}}
											</td>
                                            <td>
												<div class="form-group row">
													<div class="ml-auto col-sm-10">
														<div class="checkbox">
															@if( $status->association_approved )
																<input type="checkbox" 
																	name="associationapprovedcheckbox_mv_{{ $status->military_veteran_id }}"
																	id="associationapprovedcheckbox_mv_{{ $status->military_veteran_id }}" 
																	checked>
																<label for="associationapprovedcheckbox_mv_{{ $status->military_veteran_id }}"></label>
															@else
																<input type="checkbox" 
																	name="associationapprovedcheckbox_mv_{{ $status->military_veteran_id }}"
																	id="associationapprovedcheckbox_mv_{{ $status->military_veteran_id }}">
																<label for="associationapprovedcheckbox_mv_{{ $status->military_veteran_id }}"></label>
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
																	name="isletterissuedcheckbox_mv_{{ $status->military_veteran_id }}"
																	id="isletterissuedcheckbox_mv_{{ $status->military_veteran_id }}"
																	checked>
																<label for="isletterissuedcheckbox_mv_{{ $status->military_veteran_id }}"></label>
															@else
																<input type="checkbox" 
																	name="isletterissuedcheckbox_mv_{{ $status->military_veteran_id }}"
																	id="isletterissuedcheckbox_mv_{{ $status->military_veteran_id }}">
																<label for="isletterissuedcheckbox_mv_{{ $status->military_veteran_id }}"></label>
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
																	name="islettersignedcheckbox_mv_{{ $status->military_veteran_id }}"
																	id="islettersignedcheckbox_mv_{{ $status->military_veteran_id }}"
																	checked>
																<label for="islettersignedcheckbox_mv_{{ $status->military_veteran_id }}"></label>
															@else
																<input type="checkbox" 
																	name="islettersignedcheckbox_mv_{{ $status->military_veteran_id }}"
																	id="islettersignedcheckbox_mv_{{ $status->military_veteran_id }}">
																<label for="islettersignedcheckbox_mv_{{ $status->military_veteran_id }}"></label>
															@endif	
														</div>
													</div>
												</div>
											</td>
											<td>
												<div class="form-group row">
													<div class="ml-auto col-sm-10">
														<div class="checkbox">
															@if( $status->banking_details_confirmed )
																<input type="checkbox" 
																	name="isbankingdetailsconfirmedcheckbox_mv_{{ $status->military_veteran_id }}"
																	id="isbankingdetailsconfirmedcheckbox_mv_{{ $status->military_veteran_id }}"
																	checked>
																<label for="isbankingdetailsconfirmedcheckbox_mv_{{ $status->military_veteran_id }}"></label>
															@else
																<input type="checkbox" 
																	name="isbankingdetailsconfirmedcheckbox_mv_{{ $status->military_veteran_id }}"
																	id="isbankingdetailsconfirmedcheckbox_mv_{{ $status->military_veteran_id }}">
																<label for="isbankingdetailsconfirmedcheckbox_mv_{{ $status->military_veteran_id }}"></label>
															@endif	
														</div>
													</div>
												</div>
											</td>

											<td>
												@if( $status->association_approved &
														$status->letter_issued & 
														$status->letter_signed & 
														$status->banking_details_confirmed )
												<span class="badge badge-pill badge-success">Verified</span>
												@else
													<span class="badge badge-pill badge-danger">Not Verified</span>
												@endif
											</td>
											<td>
												{{-- <button type="submit" data-toggle="modal" data-target="#employee-verify" 
													class="btn btn-success" > --}}
												<button type="submit" class="btn btn-success"
													onclick="verifyMilitaryVeteran('{{ $status->military_veteran_id }}')">
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
											<th>SA ID Number</th>
											<th>Date Captured</th>
											<th>Association Approved</th>
                                            <th>Letter Issued</th>
                                            <th>Letter Signed</th>
											<th>Banking Details Confirmed</th>
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

	<!-- /.content -->
@endsection
