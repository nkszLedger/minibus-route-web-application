<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../public/minibus/images/favicon.ico">

    <title> MiniBus Route Registration App</title>

	<!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="/minibus/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="/minibus/assets/vendor_components/bootstrap/dist/css/bootstrap.css">

	<!-- Bootstrap tagsinput -->
    <link rel="stylesheet" href="/minibus/assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

      <!-- daterange picker -->
	<link rel="stylesheet" href="/minibus/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">

	<!-- weather weather -->
	<link rel="stylesheet" href="/minibus/assets/vendor_components/weather-icons/weather-icons.css">

	<!--alerts CSS -->
    <link rel="stylesheet" href="/minibus/assets/vendor_components/sweetalert/sweetalert.css">

	<!-- c3 CSS -->
    <link rel="stylesheet" href="/minibus/assets/vendor_components/c3/c3.min.css">

	<!-- theme style -->
	<link rel="stylesheet" href="/minibus/main/css/horizontal-menu.css">

	<!-- theme style -->
	<link rel="stylesheet" href="/minibus/main/css/style.css">

	<!-- VoiceX Admin skins -->
	<link rel="stylesheet" href="/minibus/main/css/skin_color.css">


  </head>

<body class="layout-top-nav light-skin theme-purple">

<div class="wrapper">

  <div class="art-bg">
	  <img src="../images/art1.svg" alt="" class="art-img light-img">
	  <img src="../images/art2.svg" alt="" class="art-img dark-img">
	  <img src="../images/art-bg.svg" alt="" class="wave-img light-img">
	  <img src="../images/art-bg2.svg" alt="" class="wave-img dark-img">
  </div>

  <header class="main-header">
	  <div class="inside-header clearfix">
		<nav class="main-nav" role="navigation">
			<h2 class="nav-brand"><a href="/dashboard"><img src="/minibus/images/taxi.png" class="max-w-50" alt="minibus-app"></a></h2>
			<!-- Mobile menu toggle button (hamburger/x icon) -->
			<button class="topbar-toggler" id="mobile_topbar_toggler"><i class="mdi mdi-dots-horizontal"></i></button>
			<input id="main-menu-state" type="checkbox" />
			<label class="main-menu-btn" for="main-menu-state">
				<span class="main-menu-btn-icon"></span> Toggle main menu visibility
			</label>

			<!-- Sample menu definition -->
			<ul id="main-menu" class="sm sm-blue">
				<li><a href="{{ route('users') }}" class="current"><i class="ti-files mx-5"></i>USERS</a>
					<ul>
						<li><a href="{{ route('register_employee') }}">Add New Users</a></li>
						<li id="default"><a href="{{ route('users') }}">View Users</a></li>
					</ul>
				</li>
                <li><a href="{{ route('employees') }}"><i class="ti-files mx-5"></i>EMPLOYEES</a>
					<ul>
						<li><a href="{{ route('register_employee') }}">Add New Employees</a></li>
						<li id="default"><a href="{{ route('employees') }}">View Employees</a></li>
					</ul>
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
							<img src="/minibus/images/user2-160x160.jpg" class="rounded-circle" alt="User Image">
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
							<img src="../images/user3-128x128.jpg" class="rounded-circle" alt="User Image">
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
							<img src="../images/user4-128x128.jpg" class="rounded-circle" alt="User Image">
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
							<img src="../images/user3-128x128.jpg" class="rounded-circle" alt="User Image">
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
							<img src="../images/user4-128x128.jpg" class="rounded-circle" alt="User Image">
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

		<!-- Main content -->
		@yield('content')
		<!-- /.content -->
	  </div>
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
	  &copy; {{now()->year}} <a href="https://www.transport.gov.za"  target="_blank">Department of Transport. </a> All Rights Reserved.
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
			  <img class="avatar avatar-lg" src="../images/avatar/1.jpg" alt="...">

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
			  <img class="avatar avatar-lg" src="../images/avatar/2.jpg" alt="...">

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
			  <img class="avatar avatar-lg" src="../images/avatar/1.jpg" alt="...">

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
			  <img class="avatar avatar-lg" src="../images/avatar/2.jpg" alt="...">

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
			  <img class="avatar avatar-lg" src="../images/avatar/1.jpg" alt="...">

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
			  <img class="avatar avatar-lg" src="../images/avatar/2.jpg" alt="...">

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
			  <img class="avatar avatar-lg" src="../images/avatar/1.jpg" alt="...">

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
			  <img class="avatar avatar-lg" src="../images/avatar/2.jpg" alt="...">

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

</div>
<!-- ./wrapper -->



	<!-- jQuery 3 -->
	<script src="/minibus/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

	<!-- fullscreen -->
	<script src="/minibus/assets/vendor_components/screenfull/screenfull.js"></script>

	<!-- popper -->
	<script src="/minibus/assets/vendor_components/popper/dist/popper.min.js"></script>

	<!-- Bootstrap 4.0-->
	<script src="/minibus/assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>

	<!-- date-range-picker -->
	<script src="/minibus/assets/vendor_components/moment/min/moment.min.js"></script>
	<script src="/minibus/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>

	<!-- Slimscroll -->
	<script src="/minibus/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

	<!-- FastClick -->
	<script src="/minibus/assets/vendor_components/fastclick/lib/fastclick.js"></script>

	<!-- apexcharts -->
	<script src="/minibus/assets/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
	<script src="/minibus/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>

	<!-- Formatter -->
	<script src="/minibus/assets/vendor_components/formatter/jquery.formatter.js"></script>
	<script src="/minibus/assets/vendor_components/formatter/formatter.js"></script>
	<script src="/minibus/main/js/pages/formatter.js"></script>

	<!-- This is data table -->
	<script src="/minibus/assets/vendor_components/datatable/datatables.min.js"></script>

	<!-- VoiceX Admin for Data Table -->
	<script src="/minibus/main/js/pages/data-table.js"></script> 

	<!-- steps  -->
	<script src="minibus/assets/vendor_components/jquery-steps-master/build/jquery.steps.js"></script>

	<!-- validate  -->
	<script src="minibus/assets/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>

	<!-- Sweet-Alert  -->
	<script src="minibus/assets/vendor_components/sweetalert/sweetalert.min.js"></script>

	<!-- wizard  -->
	<script src="minibus/main/js/pages/steps.js"></script>

	<!-- Form validator JavaScript -->
	<script src="minibus/main/js/pages/validation.js"></script>
	<script src="minibus/main/js/pages/form-validation.js"></script>

	<!-- VoiceX Admin App -->
	<script src="/minibus/main/js/jquery.smartmenus.js"></script>
	<script src="/minibus/main/js/menus.js"></script>
	<script src="/minibus/main/js/template.js"></script>

</body>
</html>
