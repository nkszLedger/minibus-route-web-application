@extends('datacapturer.home')

@section('content')

<section class="content">

    <div class="row">
        <div class="col-xl-2 w-150">
            <div class="form-group">
                <h5 class="text-white"> 
                    <b>Choose Region: </b>
                </h5>
                <select id=region_selector class="custom-select form-control">
                    <option value="0"> <b> All </b> </option>
                    @foreach ($all_regions as $region)
                        <option value="{{$region->region_id}}">
                            <b> {{$region->region_name}} </b>
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="form-group">
                <h5 class="text-white"> 
                    <b>By Taxi Rank: </b>
                </h5>
                <select id=taxi_rank_selector class="custom-select form-control">
                    <option value="0"> <b> All </b> </option>  
                    @foreach ($all_facilities as $facility)
                        <option value="{{$facility->id}}">
                            <b> {{$facility->name}} </b>
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xl-2 col-12">
            <div class="box">
                <div class="box-body">
                    <div class="text-center">
                        <a href="{{ route('employees.index') }}">
                        <h1 class="font-size-50 text-danger"><i class="mdi mdi-hand-pointing-right"></i></h1>
                        <h2 id=employee_count>{{ $employee_count }}</h2>
                        <span class="badge badge-pill badge-danger px-15 mb-10">REGISTERED EMPLOYEES</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-12">
            <div class="box">
                <div class="box-body">
                    <div class="text-center">
                        <a href="{{ route('employees_verification') }}">
                        <h1 class="font-size-50 text-secondary"><i class="mdi mdi-verified"></i></h1>
                        {{-- <h2 id="facility_count">{{ $facility_count }}</h2>
                        <span class="badge badge-pill badge-secondary px-15 mb-10">REGISTERED TAXI RANKS</span> --}}
                        <h2 id="verified_count">{{ $verified_employees_count }}</h2>
                        <span class="badge badge-pill badge-secondary px-15 mb-10">VERIFIED EMPLOYEES</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>	
        <div class="col-xl-2 col-12">
            <div class="box">
                <div class="box-body">
                    <div class="text-center">
                        <a href="#">
                        <h1 class="font-size-50 text-primary"><i class="mdi mdi-map-marker-radius"></i></h1>
                        {{-- <h2 id="operator_count">{{ $operator_count }}</h2>
                        <span class="badge badge-pill badge-primary px-15 mb-10">REGISTERED OPERATORS</span> --}}
                        <h2 id="taxi_ranks_count">{{ $taxi_ranks_count }}</h2>
                        <span class="badge badge-pill badge-primary px-15 mb-10">TAXI RANKS BY REGION</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-12">
            <div class="box">
                <div class="box-body">
                    <div class="text-center">
                        <a href="#">
                        <h1 class="font-size-50 text-success"><i class="mdi mdi-taxi"></i></h1>
                        <h2 id="driver_count">{{ $driver_count }}</h2>
                        <span class="badge badge-pill badge-success px-15 mb-10">REGISTERED DRIVERS</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>	
        <div class="col-xl-2 col-12">
            <div class="box">
                <div class="box-body">
                    <div class="text-center">
                        <a href="#">
                        <h1 class="font-size-50 text-info"><i class="mdi mdi-road"></i></h1>
                        <h2 id="route_count">{{ $route_count }}</h2>
                        <span class="badge badge-pill badge-info px-15 mb-10">ROUTES BY REGION</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>	
        <div class="col-xl-2 col-12">
            <div class="box">
                <div class="box-body">
                    <div class="text-center">
                        <a href="#">
                        <h1 class="font-size-50 text-warning"><i class="mdi mdi-briefcase"></i></h1>
                        <h2 id="association_count">{{ $association_count }}</h2>
                        <span class="badge badge-pill badge-warning px-15 mb-10">ASSOCIATIONS BY REGION</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>	
    </div>

    <div class="row">
        <div class="col-12 col-xl-6">
			<div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Employees Captured</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					    <table id="employee_captured_per_region"
                            class="table table-bordered table-hover" 
							style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    {{-- <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_employees as $employee )
                                <tr>
                                    <td>{{ $employee['name'] }}</td>
                                    <td>{{ $employee['surname'] }}</td>
                                    <td>{{ $employee['phone_number'] }}</td>
                                    <td>{{ $employee['email'] }}</td>
                                    <td>{{ $employee['position']['position'] }}</td>
                                    {{-- <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-12 col-xl-6">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Employee Captured Per Region</h4>
                </div>
                <div class="box-body p-15">
                    <div class="media-list media-list-hover media-list-divided">
                    <a class="media media-single" href="#">
                        <i class="font-size-18 mr-0 flag-icon flag-icon-za"></i>
                        <span class="title">Tshwane </span>
                        <span class="badge badge-pill badge-info">{{ $tshwane_count }}</span>
                    </a>

                    <a class="media media-single" href="#">
                        <i class="font-size-18 mr-0 flag-icon flag-icon-za"></i>
                        <span class="title">Johannesburg</span>
                        <span class="badge badge-pill badge-info">{{ $jhb_count }}</span>
                    </a>

                    <a class="media media-single" href="#">
                        <i class="font-size-18 mr-0 flag-icon flag-icon-za"></i>
                        <span class="title">Sedibeng</span>
                        <span class="badge badge-pill badge-info">{{ $sedibeng_count }}</span>
                    </a>

                    <a class="media media-single" href="#">
                        <i class="font-size-18 mr-0 flag-icon flag-icon-za"></i>
                        <span class="title">Ekurhuleni</span>
                        <span class="badge badge-pill badge-info">{{ $ekurhuleni_count }}</span>
                    </a>

                    <a class="media media-single" href="#">
                        <i class="font-size-18 mr-0 flag-icon flag-icon-za"></i>
                        <span class="title">West Rand</span>
                        <span class="badge badge-pill badge-info">{{ $westrand_count }}</span>
                    </a>

                    <a class="media media-single" href="#">
                        <i class="font-size-18 mr-0 flag-icon flag-icon-za"></i>
                        <span class="title">Unknown</span>
                        <span class="badge badge-pill badge-info">{{ $unknown_count }}</span>
                    </a>

                    </div>
                </div>
            </div>
        </div>  --}}

        <div class="col-12 col-xl-6">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Employee Position Distribution</h4>
                </div>

                <div class="box-body">
                    <div id="flotPie2" class="h-400"></div>
                </div>
                <!-- /.box-body-->

            </div>
            <!-- /.box -->
        </div>

        <div class="col-12">
            <div class="box">
                <div class="box-body analytics-info">
                    <h4 class="box-title">Taxi Employee Registrations</h4>
                    <div id="basic-pie" style="height:600px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-body analytics-info">
                    <h4 class="box-title">Facility Overview: Taxi Rank Sites Discovered</h4>
                    <div id="map" style="height:800px;"></div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
