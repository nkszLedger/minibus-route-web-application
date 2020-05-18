@extends('member.home')

@section('content')

<section class="content">
    <div class="row">

        <div class="col-12 col-xl-3">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Members</h4>
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
                    <h4 class="box-title">Drivers Per Association</h4>
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
                    <h4 class="box-title">Owners vs Operators</h4>
                </div>
                <div class="box-body">
                    <div id="flotBar2" class="h-300"></div>
                </div>
                <!-- /.box-body-->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-xl-3 col-lg-6 col-12">
            <div class="box bg-info">
                <div class="box-body">
                    <div class="d-flex">
                        <h3 class="font-weight-600 mb-0">8,958</h3>
                        <span class="badge badge-danger badge-pill align-self-center ml-auto">+22,6%</span>
                    </div>
                    <div>
                        Active Members Monthly
                        <div class="font-size-16">15 avg</div>
                    </div>
                </div>
                <div class="chart">
                    <div id="spark1"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="box bg-warning">
                <div class="box-body">
                    <div class="d-flex">
                        <h3 class="font-weight-600 mb-0">7,854</h3>
                        <span class="badge badge-danger badge-pill align-self-center ml-auto">+22,6%</span>
                    </div>
                    <div>
                        Inactive members Monthly
                        <div class="font-size-16">6,854 avg</div>
                    </div>
                </div>
                <div class="chart">
                    <div id="spark2"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="box bg-danger">
                <div class="box-body">
                    <div class="d-flex">
                        <h3 class="font-weight-600 mb-0">3,952</h3>
                    </div>
                    <div>
                        Inactive members with no permits Monthly
                        <div class="font-size-16">9,758 avg</div>
                    </div>
                </div>
                <div class="chart">
                    <div id="spark3"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="box bg-success">
                <div class="box-body">
                    <div class="d-flex">
                        <h3 class="font-weight-600 mb-0">85.4%</h3>
                        <div class="list-icons ml-auto">
                            <div class="list-icons-item dropdown">
                                <a href="#" class="list-icons-item dropdown-toggle text-white" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item">Update data</a>
                                    <a href="#" class="dropdown-item">Detailed log</a>
                                    <a href="#" class="dropdown-item">Statistics</a>
                                    <a href="#" class="dropdown-item">Clear list</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        Current server loading
                        <div class="font-size-16">85.6% avg</div>
                    </div>
                </div>
                <div class="chart">
                    <div id="spark4"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-12">
        </div>
        <div class="col-xl-8 col-12">
            <div class="box">
            </div>
        </div>
    </div>
</section>

@endsection
