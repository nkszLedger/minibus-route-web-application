@extends('member.home')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="box box-body pb-10 bl-4 border-info pull-up">
                <h6 class="text-uppercase">REGISTERED OPERATORS OR OWNERS</h6>
                <div class="d-flex justify-content-between">
                <span class=" font-size-30">{{ $operator_count }}</span>
                <span class="font-size-30 text-info mdi mdi-account"></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="box box-body pb-10 bl-4 border-danger pull-up">
                <h6 class="text-uppercase">REGISTERED DRIVERS</h6>
                <div class="d-flex justify-content-between">
                <span class=" font-size-30">{{ $driver_count }}</span>
                <span class="font-size-30 text-danger mdi mdi-taxi"></span>
                </div>
            </div>
        </div>				
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="box box-body pb-10 bl-4 border-primary pull-up">
                <h6 class="text-uppercase">OPERATING ROUTES</h6>
                <div class="d-flex justify-content-between">
                <span class=" font-size-30">{{ $route_count }}</span>
                <span class="font-size-30 text-primary mdi mdi-road"></span>
                </div>
            </div>
        </div>								
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="box box-body pb-10 bl-4 border-warning pull-up">
                <h6 class="text-uppercase">NUMBER OF ASSOCIATIONS</h6>
                <div class="d-flex justify-content-between">
                <span class=" font-size-30">{{ $association_count }}</span>
                <span class="font-size-30 text-warning mdi mdi-briefcase"></span>
                </div>
            </div>
        </div>	
        <div class="col-12 col-xl-3">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Members Registrations</h4>
                </div>
                <div class="box-body">
                    <div id="flotRealtime2" class="h-300"></div>
                </div>
                <!-- /.box-body-->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-12 col-xl-5">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Member Verification Proportion</h4>
                </div>

                <div class="box-body">
                    <div id="flotPie2" class="h-300"></div>
                </div>
                <!-- /.box-body-->

            </div>
            <!-- /.box -->
        </div>
        
        <div class="col-12 col-xl-4">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Drivers vs Operators</h4>
                </div>
                <div class="box-body">
                    <div id="bookingstatus"></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-8 col-12">
            <div class="box">
            </div>
        </div>
    </div>
</section>

@endsection
