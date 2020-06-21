@extends('datacapturer.home')

@section('content')

@if( isset($member_record) )
<section class="content">
	<div class="row">

		<div class="col-12">
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">
                        Vehicle Management: Vehicle 
                        {{ $vehicle->registration_number ?? ''}} 
                        for MEMBER: 
                        {{ $member_record->name }} {{ $member_record->surname }}
                    </h4>
					<h4 class="box-subtitle">Showing Vehicle Details</h4>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <hr class="mb-15 mt-0">
                    <h4 class="box-title text-info"><i class="ti-car mr-15"></i> Vehicle Details</h4>
                    <hr class="mb-15 mt-0">
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Registration Number : 
                                        <span class="text-danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control" readonly 
                                        value="{{ $vehicle->registration_number ?? ''}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vehicle : 
                                        <span class="text-danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control" readonly  
                                        value="{{ $vehicle->vehicleclass->make }} - type; {{ $vehicle->vehicleclass->model }} - model; {{ $vehicle->vehicleclass->year }}; {{ $vehicle->vehicleclass->seats_number }} - seater;">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>About Vehicle : 
                                        <span class="text-danger">*</span> 
                                    </label>
                                    <textarea class="form-control" readonly>{{ $vehicle->info ?? ''}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Region : 
                                        <span class="text-danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control" readonly 
                                        value="{{ $region[0]['region_name'] ?? ''}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Association : 
                                        <span class="text-danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control" readonly 
                                        value="{{ $association[0]['name'] ?? ''}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><span class="text-danger">Current Vehicle Route Details: </span></label>
                                    <hr class="mb-15 mt-0">
                                    <div>
                                    @foreach ($all_routes as $route)
                                            <input checked="checked"  name="route" type="checkbox" 
                                                id="{{$route->id}}" value="{{$route->id}}" disabled>
                                            <label for="{{$route->id}}" class="d-block">
                                                {{$route->route_id.' : '}}{{$route->origin.' - '}}
                                                {{$route->via.' - '}}{{$route->destination}}
                                            </label>
                                        {{-- @endif --}}
                                    @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                    <div class="row">
                        <div class="col-6 text-right">
                            <a class="btn btn-warning mb-5" 
                                href="{{ route('vehicles.create', $member_record->id)}}">
                                Ok
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<section>
@endif
@endsection