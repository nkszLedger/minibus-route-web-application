<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../images/favicon.ico">

    <title> MiniBus Route Registration App</title>


    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="/minibus/assets/vendor_components/bootstrap/dist/css/bootstrap.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="/minibus/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">

    <!-- weather weather -->
    <link rel="stylesheet" href="minibus/assets/vendor_components/weather-icons/weather-icons.css">

    <!-- theme style -->
    <link rel="stylesheet" href="/minibus/main/css/horizontal-menu.css">

    <!-- theme style -->
    <link rel="stylesheet" href="/minibus/main/css/style.css">

    <!-- VoiceX Admin skins -->
    <link rel="stylesheet" href="/minibus/main/css/skin_color.css">

    <!-- Data Table-->
    <link rel="stylesheet" type="text/css" href="/minibus/assets/vendor_components/datatable/datatables.min.css"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</head>

<body class="layout-top-nav light-skin theme-purple">
<div class="wrapper">

    <div class="art-bg">
        <img src="../../images/art1.svg" alt="" class="art-img light-img">
        <img src="../../images/art2.svg" alt="" class="art-img dark-img">
        <img src="../../images/art-bg.svg" alt="" class="wave-img light-img">
        <img src="../../images/art-bg2.svg" alt="" class="wave-img dark-img">
    </div>

    <header class="main-header">
        <div class="inside-header clearfix">
            <nav class="main-nav" role="navigation">
                <h2 class="nav-brand"><a href="/dashboard"><img src="/minibus/free-minibus-vector.png" class="max-w-50" alt="minibus-app"></a></h2>

                <!-- Mobile menu toggle button (hamburger/x icon) -->
                <button class="topbar-toggler" id="mobile_topbar_toggler"><i class="mdi mdi-dots-horizontal"></i></button>
                <input id="main-menu-state" type="checkbox" />
                <label class="main-menu-btn" for="main-menu-state">
                    <span class="main-menu-btn-icon"></span> Toggle main menu visibility
                </label>

                <!-- Sample menu definition -->
                <ul id="main-menu" class="sm sm-blue">
                    <li><a href="/dashboard" class="current"><i class="ti-dashboard mx-5"></i>DASHBOARD</a>
                    </li>
                    <li><a href="/showregpage"><i class="ti-files mx-5"></i>MEMBER REGISTRATION</a>
                    </li>
                    <li><a href="/list_members"><i class="ti-files mx-5"></i>MEMBER MANAGEMENT</a>
                    </li>
                </ul>
            </nav>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top icon-topbar hmobile">

                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">
                        <li class="search-bar">
                            <div class="lookup lookup-circle lookup-right">
                                <input type="text" name="s">
                            </div>
                        </li>
                        <!-- Messages -->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Messages">
                                <i class="mdi mdi-email"></i>
                            </a>
                            <ul class="dropdown-menu animated bounceIn">

                                <li class="header">
                                    <div class="p-20 bg-light">
                                        <div class="flexbox">
                                            <div>
                                                <h4 class="mb-0 mt-0">Messages</h4>
                                            </div>
                                            <div>
                                                <a href="#" class="text-danger">Clear All</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu sm-scrol">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../../images/user2-160x160.jpg" class="rounded-circle" alt="User Image">
                                                </div>
                                                <div class="mail-contnet">
                                                    <h4>
                                                        Lorem Ipsum
                                                        <small><i class="fa fa-clock-o"></i> 15 mins</small>
                                                    </h4>
                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../../images/user3-128x128.jpg" class="rounded-circle" alt="User Image">
                                                </div>
                                                <div class="mail-contnet">
                                                    <h4>
                                                        Nullam tempor
                                                        <small><i class="fa fa-clock-o"></i> 4 hours</small>
                                                    </h4>
                                                    <span>Curabitur facilisis erat quis metus congue viverra.</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../../images/user4-128x128.jpg" class="rounded-circle" alt="User Image">
                                                </div>
                                                <div class="mail-contnet">
                                                    <h4>
                                                        Proin venenatis
                                                        <small><i class="fa fa-clock-o"></i> Today</small>
                                                    </h4>
                                                    <span>Vestibulum nec ligula nec quam sodales rutrum sed luctus.</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../../images/user3-128x128.jpg" class="rounded-circle" alt="User Image">
                                                </div>
                                                <div class="mail-contnet">
                                                    <h4>
                                                        Praesent suscipit
                                                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                    </h4>
                                                    <span>Curabitur quis risus aliquet, luctus arcu nec, venenatis neque.</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../../images/user4-128x128.jpg" class="rounded-circle" alt="User Image">
                                                </div>
                                                <div class="mail-contnet">
                                                    <h4>
                                                        Donec tempor
                                                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                    </h4>
                                                    <span>Praesent vitae tellus eget nibh lacinia pretium.</span>
                                                </div>

                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#" class="bg-light">See all e-Mails</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Notifications -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Notifications">
                                <i class="mdi mdi-bell"></i>
                            </a>
                            <ul class="dropdown-menu animated bounceIn">

                                <li class="header">
                                    <div class="bg-light p-20">
                                        <div class="flexbox">
                                            <div>
                                                <h4 class="mb-0 mt-0">Notifications</h4>
                                            </div>
                                            <div>
                                                <a href="#" class="text-danger">Clear All</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu sm-scrol">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-primary"></i> Nunc fringilla lorem
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#" class="bg-light">View all</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account-->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="User">
                                <img src="/minibus/images/avatar/7.jpg" class="user-image rounded-circle" alt="User Image">
                            </a>
                            <ul class="dropdown-menu animated flipInX">
                                <!-- User image -->
                                <li class="user-header bg-img" style="background-image: url(/minibus/images/user-info.jpg)" data-overlay="3">
                                    <div class="flexbox align-self-center">
                                        <img src="/minibus/images/avatar/7.jpg" class="float-left rounded-circle" alt="User Image">
                                        <h4 class="user-name align-self-center">
                                            <span>Samuel Brus</span>
                                            <small>admin@dot.gov.za</small>
                                        </h4>
                                    </div>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-person"></i> My Profile</a>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-bag"></i> My Balance</a>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-email-unread"></i> Inbox</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-settings"></i> Account Setting</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/"><i class="ion-log-out"></i> Logout</a>
                                    <div class="dropdown-divider"></div>
                                    <div class="p-10"><a href="javascript:void(0)" class="btn btn-sm btn-rounded btn-success">View Profile</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="only-icon">
                            <a href="#" data-provide="fullscreen" class="sidebar-toggle" title="Full Screen">
                                <i class="mdi mdi-crop-free"></i>
                            </a>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar" title="Setting"><i class="fa fa-cog fa-spin"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        {{--					<h3 class="page-title">Data Tables</h3>--}}
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="right-title">
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Member Profile </h4>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="wfirstName2"> First Name : <span class="danger">*</span> </label>
                                                <input type="text" class="form-control required" readonly id="wfirstName2" value="{{$member_record->name}}" name="firstName">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="wlastName2"> Last Name : <span class="danger">*</span> </label>
                                                <input type="text" class="form-control required" readonly id="wlastName2" value="{{$member_record->surname}}" name="lastName">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                    </div>
                                    <h4>Biometrics Captured</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="idnumber"> Portrait :  </label>
{{--                                                <input type="number" class="form-control required" id="idnumber" name="idnumber" maxlength="13" pattern="[0-9]"> --}}
{{--                                            </div>--}}
                                                    {{-- @if($member_record['portrait']['portrait'] !== null) --}}
                                                    @if($member_record['portrait'] !== null)
                                                    <img src="/minibus/portrait-green.png" height="225" width="225">
                                                    @else
                                                    <img src="/minibus/portrait-grey.png" height="225" width="225">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="licensenumber"> Fingerprint :  </label>
{{--                                                <input type="text" class="form-control required" id="licensenumber" name="licensenumber"> --}}
{{--                                            </div>--}}
                                                @if($member_record['fingerprint'] !== null)
                                                    <img src="/minibus/fingerprint-green.jpg" height="225" width="225">
                                                @else
                                                    <img src="/minibus/fingerprint-gey.png" height="225" width="225">
                                                @endif
                                            </div>
                                    </div>
                                </section>
                                <h4>Vehicle Details</h4>
                                <hr>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="regnumber">Registration Number : <span class="danger">*</span> </label>
                                                <input type="text" class="form-control required" readonly id="regnumber" value="{{$member_record['vehicles'][0]['registration_number']}}" name="regnumber">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="vehiclemake">Make : <span class="danger">*</span></label>
                                                <input type="text" class="form-control required" readonly  id="vehiclemake" value="{{$member_record['vehicles'][0]['make']}}" name="vehiclemake"> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="vehiclemodel">Model : <span class="danger">*</span> </label>
                                                <input type="text" class="form-control required" readonly id="vehiclemodel" value="{{$member_record['vehicles'][0]['model']}}" name="vehiclemodel">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="webUrl3">Year : <span class="danger">*</span></label>
                                                <input type="text" class="form-control required" readonly id="webUrl3" value="{{$member_record['vehicles'][0]['year']}}" name="vehicleyear"> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="vehicleseats">Number of seats : <span class="danger">*</span></label>
                                                <input type="number" class="form-control required" readonly  id="vehicleseats" value="{{$member_record['vehicles'][0]['seats_number']}}"  name="vehicleseats">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <h4>Association and Routes</h4>
                                <hr>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{--                                              <div class="form-group">--}}
                                            {{--                                                  <label for="wint1">Interview For :</label>--}}
                                            {{--                                                  <input type="text" class="form-control required" id="wint1">--}}
                                            {{--                                              </div>--}}
                                            <div class="form-group">
                                                <label for="wintType1">Region:</label>
                                                <select class="custom-select form-control required" disabled id="wintType1" data-placeholder="Type to search cities" name="region">
                                                    <option value="">Please select Region</option>
                                                    @foreach ($all_regions as $region)
                                                        @if($region->region_id === $member_record['region']['region_id'] )
                                                            <option  selected value="{{$member_record['region']['region_id']}}">{{$member_record['region']['region_name']}}</option>
                                                        @else
                                                            <option value="{{$region->region_id}}">{{$region->region_name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="association">Association :</label>
                                                <select class="custom-select form-control " id="wLocation1"  disabled name="association">
                                                    <option value="">Please select Association</option>
                                                    @foreach ($all_associations as $association)
                                                        @if($association->association_id === $member_record['member_association']['association_id'] )
                                                            <option selected value="{{$member_record['member_association']['association_id']}}">{{$member_record['member_association']['name']}}</option>
                                                        @else
                                                            <option  value="{{$association['association_id']}}">{{$association['name']}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h4>Vehicle Route Details</h4>
                                                <hr class="mb-15 mt-0">
                                                @foreach ($all_routes as $route)
                                                    {{-- @if($route->route_id === $member_vehicle_routes[0]['routes'][0]['route_id']) --}}
                                                        <input checked="checked" disabled name="route" type="checkbox" id="{{$route->id}}" value="{{$route->id}}">
                                                        {{-- <label for="{{$route->id}}" class="d-block">{{$route->id.' : '}}{{$member_vehicle_routes[0]['routes'][0]['origin'].' - '}}{{$member_vehicle_routes[0]['routes'][0]['via'].' - '}}{{$member_vehicle_routes[0]['routes'][0]['destination']}}</label> --}}
                                                        <label for="{{$route->id}}" class="d-block">{{$route->route_id.' : '}}{{$route->origin.' - '}}{{$route->via.' - '}}{{$route->destination}}</label>
                                                    {{-- @endif --}}
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{ url('list_members')}}" type="submit" id="edit_button" class="btn btn-warning ">Cancel </a>
                                            <a href="{{ url('show_member', $member_record->id )}}" type="submit" id="edit_button" class="btn btn-primary float-right">Edit </a>
                                        </div>
                                    </div>
                                </section>

                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.content-wrapper -->


<footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
            <li class="nav-item">
                <a class="nav-link" href="https://www.transport.gov.za/web/department-of-transport/contact-us"  target="_blank" >Contact Us</a>
            </li>
        </ul>
    </div>
    &copy; {{now()->year}} <a href="https://www.transport.gov.za"  target="_blank" >Department of Transport. </a> All Rights Reserved.
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar">

    <div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>  <!-- Create the tabs -->
    <ul class="nav nav-tabs control-sidebar-tabs">
        <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab" title="Notifications"><i class="ti-comment-alt"></i></a></li>
        <li class="nav-item"><a href="#control-sidebar-settings-tab" data-toggle="tab" title="Comments"><i class="ti-tag"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <div class="lookup lookup-sm lookup-right d-none d-lg-block mb-20">
                <input type="text" name="s" placeholder="Search" class="w-p100">
            </div>
            <div class="media-list media-list-hover">
                <a class="media media-single" href="#">
                    <h4 class="w-50 text-gray font-weight-500">10:10</h4>
                    <div class="media-body pl-15 bl-5 rounded border-primary">
                        <p>Morbi quis ex eu arcu auctor sagittis.</p>
                        <span class="text-fade">by Johne</span>
                    </div>
                </a>

                <a class="media media-single" href="#">
                    <h4 class="w-50 text-gray font-weight-500">08:40</h4>
                    <div class="media-body pl-15 bl-5 rounded border-success">
                        <p>Proin iaculis eros non odio ornare efficitur.</p>
                        <span class="text-fade">by Amla</span>
                    </div>
                </a>

                <a class="media media-single" href="#">
                    <h4 class="w-50 text-gray font-weight-500">07:10</h4>
                    <div class="media-body pl-15 bl-5 rounded border-info">
                        <p>In mattis mi ut posuere consectetur.</p>
                        <span class="text-fade">by Josef</span>
                    </div>
                </a>

                <a class="media media-single" href="#">
                    <h4 class="w-50 text-gray font-weight-500">01:15</h4>
                    <div class="media-body pl-15 bl-5 rounded border-danger">
                        <p>Morbi quis ex eu arcu auctor sagittis.</p>
                        <span class="text-fade">by Rima</span>
                    </div>
                </a>

                <a class="media media-single" href="#">
                    <h4 class="w-50 text-gray font-weight-500">23:12</h4>
                    <div class="media-body pl-15 bl-5 rounded border-warning">
                        <p>Morbi quis ex eu arcu auctor sagittis.</p>
                        <span class="text-fade">by Alaxa</span>
                    </div>
                </a>

            </div>
        </div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <div class="media-list media-list-hover media-list-divided">
                <div class="media">
                    <img class="avatar avatar-lg" src="../../images/avatar/1.jpg" alt="...">

                    <div class="media-body">
                        <p><strong>Carter</strong> <span class="float-right">33 min ago</span></p>
                        <p>Cras tempor diam nec metus...</p>
                        <div class="media-block-actions">
                            <nav class="nav nav-dot-separated no-gutters">
                                <div class="nav-item">
                                    <a class="nav-link text-success" href="#"><i class="fa fa-thumbs-up"></i> (17)</a>
                                </div>
                                <div class="nav-item">
                                    <a class="nav-link text-danger" href="#"><i class="fa fa-thumbs-down"></i> (22)</a>
                                </div>
                            </nav>

                            <nav class="nav no-gutters gap-2 font-size-16 media-hover-show">
                                <a class="nav-link text-success" href="#" data-toggle="tooltip" title="" data-original-title="Approve"><i class="ion-checkmark"></i></a>
                                <a class="nav-link text-danger" href="#" data-toggle="tooltip" title="" data-original-title="Delete"><i class="ion-close"></i></a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="media">
                    <img class="avatar avatar-lg" src="../../images/avatar/2.jpg" alt="...">

                    <div class="media-body">
                        <p><strong>Nicholas</strong> <span class="float-right">11 hour ago</span></p>
                        <p>Praesent tristique diam...</p>
                        <div class="media-block-actions">
                            <nav class="nav nav-dot-separated no-gutters">
                                <div class="nav-item">
                                    <a class="nav-link text-success" href="#"><i class="fa fa-thumbs-up"></i> (17)</a>
                                </div>
                                <div class="nav-item">
                                    <a class="nav-link text-danger" href="#"><i class="fa fa-thumbs-down"></i> (23)</a>
                                </div>
                            </nav>

                            <nav class="nav no-gutters gap-2 font-size-16 media-hover-show">
                                <a class="nav-link text-success" href="#" data-toggle="tooltip" title="" data-original-title="Approve"><i class="ion-checkmark"></i></a>
                                <a class="nav-link text-danger" href="#" data-toggle="tooltip" title="" data-original-title="Delete"><i class="ion-close"></i></a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="media">
                    <img class="avatar avatar-lg" src="../../images/avatar/1.jpg" alt="...">

                    <div class="media-body">
                        <p><strong>Carter</strong> <span class="float-right">33 min ago</span></p>
                        <p>Cras tempor diam nec...</p>
                        <div class="media-block-actions">
                            <nav class="nav nav-dot-separated no-gutters">
                                <div class="nav-item">
                                    <a class="nav-link text-success" href="#"><i class="fa fa-thumbs-up"></i> (17)</a>
                                </div>
                                <div class="nav-item">
                                    <a class="nav-link text-danger" href="#"><i class="fa fa-thumbs-down"></i> (22)</a>
                                </div>
                            </nav>

                            <nav class="nav no-gutters gap-2 font-size-16 media-hover-show">
                                <a class="nav-link text-success" href="#" data-toggle="tooltip" title="" data-original-title="Approve"><i class="ion-checkmark"></i></a>
                                <a class="nav-link text-danger" href="#" data-toggle="tooltip" title="" data-original-title="Delete"><i class="ion-close"></i></a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="media">
                    <img class="avatar avatar-lg" src="../../images/avatar/2.jpg" alt="...">

                    <div class="media-body">
                        <p><strong>Nicholas</strong> <span class="float-right">11 hour ago</span></p>
                        <p>Praesent tristique diam...</p>
                        <div class="media-block-actions">
                            <nav class="nav nav-dot-separated no-gutters">
                                <div class="nav-item">
                                    <a class="nav-link text-success" href="#"><i class="fa fa-thumbs-up"></i> (17)</a>
                                </div>
                                <div class="nav-item">
                                    <a class="nav-link text-danger" href="#"><i class="fa fa-thumbs-down"></i> (23)</a>
                                </div>
                            </nav>

                            <nav class="nav no-gutters gap-2 font-size-16 media-hover-show">
                                <a class="nav-link text-success" href="#" data-toggle="tooltip" title="" data-original-title="Approve"><i class="ion-checkmark"></i></a>
                                <a class="nav-link text-danger" href="#" data-toggle="tooltip" title="" data-original-title="Delete"><i class="ion-close"></i></a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="media">
                    <img class="avatar avatar-lg" src="../../images/avatar/1.jpg" alt="...">

                    <div class="media-body">
                        <p><strong>Carter</strong> <span class="float-right">33 min ago</span></p>
                        <p>Cras tempor diam nec metus...</p>
                        <div class="media-block-actions">
                            <nav class="nav nav-dot-separated no-gutters">
                                <div class="nav-item">
                                    <a class="nav-link text-success" href="#"><i class="fa fa-thumbs-up"></i> (17)</a>
                                </div>
                                <div class="nav-item">
                                    <a class="nav-link text-danger" href="#"><i class="fa fa-thumbs-down"></i> (22)</a>
                                </div>
                            </nav>

                            <nav class="nav no-gutters gap-2 font-size-16 media-hover-show">
                                <a class="nav-link text-success" href="#" data-toggle="tooltip" title="" data-original-title="Approve"><i class="ion-checkmark"></i></a>
                                <a class="nav-link text-danger" href="#" data-toggle="tooltip" title="" data-original-title="Delete"><i class="ion-close"></i></a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="media">
                    <img class="avatar avatar-lg" src="../../images/avatar/2.jpg" alt="...">

                    <div class="media-body">
                        <p><strong>Nicholas</strong> <span class="float-right">11 hour ago</span></p>
                        <p>Praesent tristique diam...</p>
                        <div class="media-block-actions">
                            <nav class="nav nav-dot-separated no-gutters">
                                <div class="nav-item">
                                    <a class="nav-link text-success" href="#"><i class="fa fa-thumbs-up"></i> (17)</a>
                                </div>
                                <div class="nav-item">
                                    <a class="nav-link text-danger" href="#"><i class="fa fa-thumbs-down"></i> (23)</a>
                                </div>
                            </nav>

                            <nav class="nav no-gutters gap-2 font-size-16 media-hover-show">
                                <a class="nav-link text-success" href="#" data-toggle="tooltip" title="" data-original-title="Approve"><i class="ion-checkmark"></i></a>
                                <a class="nav-link text-danger" href="#" data-toggle="tooltip" title="" data-original-title="Delete"><i class="ion-close"></i></a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="media">
                    <img class="avatar avatar-lg" src="../../images/avatar/1.jpg" alt="...">

                    <div class="media-body">
                        <p><strong>Carter</strong> <span class="float-right">33 min ago</span></p>
                        <p>Cras tempor diam nec...</p>
                        <div class="media-block-actions">
                            <nav class="nav nav-dot-separated no-gutters">
                                <div class="nav-item">
                                    <a class="nav-link text-success" href="#"><i class="fa fa-thumbs-up"></i> (17)</a>
                                </div>
                                <div class="nav-item">
                                    <a class="nav-link text-danger" href="#"><i class="fa fa-thumbs-down"></i> (22)</a>
                                </div>
                            </nav>

                            <nav class="nav no-gutters gap-2 font-size-16 media-hover-show">
                                <a class="nav-link text-success" href="#" data-toggle="tooltip" title="" data-original-title="Approve"><i class="ion-checkmark"></i></a>
                                <a class="nav-link text-danger" href="#" data-toggle="tooltip" title="" data-original-title="Delete"><i class="ion-close"></i></a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="media">
                    <img class="avatar avatar-lg" src="../../images/avatar/2.jpg" alt="...">

                    <div class="media-body">
                        <p><strong>Nicholas</strong> <span class="float-right">11 hour ago</span></p>
                        <p>Praesent tristique diam...</p>
                        <div class="media-block-actions">
                            <nav class="nav nav-dot-separated no-gutters">
                                <div class="nav-item">
                                    <a class="nav-link text-success" href="#"><i class="fa fa-thumbs-up"></i> (17)</a>
                                </div>
                                <div class="nav-item">
                                    <a class="nav-link text-danger" href="#"><i class="fa fa-thumbs-down"></i> (23)</a>
                                </div>
                            </nav>

                            <nav class="nav no-gutters gap-2 font-size-16 media-hover-show">
                                <a class="nav-link text-success" href="#" data-toggle="tooltip" title="" data-original-title="Approve"><i class="ion-checkmark"></i></a>
                                <a class="nav-link text-danger" href="#" data-toggle="tooltip" title="" data-original-title="Delete"><i class="ion-close"></i></a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
{{--</div>--}}
<!-- ./wrapper -->






<!-- jQuery 3 -->
<script src="/minibus/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

<!-- fullscreen -->
<script src="/minibus/assets/vendor_components/screenfull/screenfull.js"></script>

<!-- popper -->
<script src="/minibus/assets/vendor_components/popper/dist/popper.min.js"></script>

<!-- Bootstrap 4.0-->
<script src="/minibus/assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>

<!-- SlimScroll -->
<script src="/minibus/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- FastClick -->
<script src="/minibus/assets/vendor_components/fastclick/lib/fastclick.js"></script>

<!-- VoiceX Admin App -->
<script src="/minibus/main/js/jquery.smartmenus.js"></script>
<script src="/minibus/main/js/menus.js"></script>
<script src="/minibus/main/js/template.js"></script>
<script src="/minibus/main/js/pages/voice-search.js"></script>

<!-- VoiceX Admin for demo purposes -->
<script src="/minibus/main/js/demo.js"></script>

<!-- This is data table -->
{{--    <script src="/minibus/assets/vendor_components/datatable/datatables.min.js"></script>--}}

<!-- VoiceX Admin for Data Table -->
<script src="/minibus/main/js/pages/data-table.js"></script>


<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function(){
        // Initiate DataTable function comes with plugin
        // $('#dataTable').DataTable();
        // Start jQuery click function to view Bootstrap modal when view info button is clicked
        // $('#modal-default').on('show', function(){
        $('#modal-button-id').click(function(){
            //console.log('hello wordd');

            // Get the id of selected phone and assign it in a variable called phoneData
            var phoneData = $(this).attr('id');
            $('#modal_body_content').html('Loading..');
            //console.log(phoneData);
            // Start AJAX function
            $.ajax({
                // Path for controller function which fetches selected phone data
                url: "showmodal/1",
                // Method of getting data
                method: "GET",
                // Data is sent to the server
                // data: {'phoneDataaaa':phoneData},
                // Callback function that is executed after data is successfully sent and recieved
                success: function(data){

                    // console.log(data.member_record.name);
                    // Print the fetched data of the selected phone in the section called #phone_result
                    // within the Bootstrap modal
                    $('#modal_body_content').html(data);


                    //if(data.member_record !==) {
                    //    document.getElementById('wfirstName2').value = 'Tshegoidfunction';// = "Tshegoidfunction";//data.member_record.name;
                    //     document.getElementById('wlastName2').value = data.member_record.surname;

                    // nm.value = 'Tshegoidfunction';
                    // surname.value = data.member_record.surname;
                    // }
                    // else {
                    //     console.log("data.member_record is null");
                    // }
                    //
                    console.log("surname value");
                    $('#wfirstName2').val('data.member_record.surname');

                    alert( $('#wfirstName2').val());
                    alert('wwwwwwwwwwwwwwwwwwwww');

                    // $('#modal-default').on('show');


                    var new_modal = document.getElementById('modal_body_content');

                    new_modal += '<img src=mimibus/fingerprint-gey.png>';

                    $('#modal-default').html(new_modal);
                },
            });
            // End AJAX function
        });
    });


</script>
</body>
</html>
