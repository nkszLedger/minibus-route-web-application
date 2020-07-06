@extends('datacapturer.home')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-xl-2 col-12">
            <div class="box">
                <div class="box-body">
                    <div class="text-center">
                        <a href="{{ route('employees.index') }}">
                        <h1 class="font-size-50 text-danger"><i class="mdi mdi-hand-pointing-right"></i></h1>
                        <h2>{{ $employee_count }}</h2>
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
                        <a href="#">
                        <h1 class="font-size-50 text-secondary"><i class="mdi mdi-verified"></i></h1>
                        <h2>{{ $operator_count }}</h2>
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
                        <h1 class="font-size-50 text-primary"><i class="mdi mdi-account"></i></h1>
                        <h2>{{ $operator_count }}</h2>
                        <span class="badge badge-pill badge-primary px-15 mb-10">REGISTERED OPERATORS</span>
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
                        <h2>{{ $driver_count }}</h2>
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
                        <h2>{{ $route_count }}</h2>
                        <span class="badge badge-pill badge-info px-15 mb-10">OPERATING ROUTES</span>
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
                        <h2>{{ $association_count }}</h2>
                        <span class="badge badge-pill badge-warning px-15 mb-10">NUMBER OF ASSOCIATIONS</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>	
    </div>
    <div class="row">
        {{-- <div class="col-12 col-xl-3"> --}}
        <div class="col-12 col-xl-3">
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
        </div>

        <div class="col-12 col-xl-5">
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

        <div class="col-12 col-xl-4">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Employee Gender Distribution</h4>
                </div>

                <div class="box-body">
                    <div id="flotPie22" class="h-400"></div>
                </div>
                <!-- /.box-body-->

            </div>
            <!-- /.box -->
        </div>
        
        {{-- <div class="col-12 col-xl-5">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Drivers vs Operators</h4>
                </div>
                <div class="box-body">
                    <div id="#bookingstatus" class="h-400"></div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="col-lg-8 col-12">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title">
                        Sales Overview
                    </h4>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <div id="sales-overview"></div>
                    </div>
                </div>
            </div>
        </div> --}}
        
        <div class="col-xl-8 col-12">
            <div class="box">
            </div>
        </div>
    </div>
</section>

@endsection
