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
			<h2 class="nav-brand"><a href="{{ route('employees.index') }}"><img src="/minibus/images/taxi.png" class="max-w-50" alt="minibus-app"></a></h2>
			<!-- Mobile menu toggle button (hamburger/x icon) -->
			<button class="topbar-toggler" id="mobile_topbar_toggler"><i class="mdi mdi-dots-horizontal"></i></button>
			<input id="main-menu-state" type="checkbox" />
			<label class="main-menu-btn" for="main-menu-state">
				<span class="main-menu-btn-icon"></span> Toggle main menu visibility
			</label>

			<!-- Sample menu definition -->
			<ul id="main-menu" class="sm sm-blue">
				{{-- <li><a href="{{ route('dashboard.index') }}" class="current"><i class="ti-dashboard mx-5"></i>DASHBOARD</a></li> --}}
                <li><a href="{{ route('employees.index') }}"><i class="ti-files mx-5"></i>MANAGE EMPLOYEES</a>
					<ul>
						<li><a href="{{ route('employees.create') }}">Register Employee</a></li>
						<li><a href="{{ route('employees.index') }}">View Employees</a></li>
					</ul>
				</li>
				<li><a href="{{ route('members.index') }}"><i class="ti-files mx-5"></i>MANAGE MEMBERS</a>
					<ul>
						<li><a href="{{ route('members.create') }}">Register Member</a></li>
						<li><a href="{{ route('members.index') }}">View Members</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<!-- Header Navbar -->
		<nav class="navbar navbar-static-top icon-topbar hmobile">

		  <div class="navbar-custom-menu r-side">
			<ul class="nav navbar-nav">
			  
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
						  <span>{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
						  <small>{{ Auth::user()->email }}</small>
						</h4>
					  </div>
				  </li>
				  <!-- Menu Body -->
				  <li class="user-body">
						<div class="p-10">
							<form action="{{ route('logout') }}" method="POST">
								@csrf
								<a class="btn btn-sm btn-rounded btn-success">
									<input  class="btn btn-sm btn-rounded btn-success" type="submit" value="LOGOUT"/>
								</a>
							</form>
						</div>
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

	<!-- FLOT CHARTS -->
	<script src="/minibus/assets/vendor_components/Flot/jquery.flot.js"></script>
	<script src="/minibus/assets/vendor_components/Flot/jquery.flot.resize.js"></script>
	<script src="/minibus/assets/vendor_components/Flot/jquery.flot.pie.js"></script>
	<script src="/minibus/assets/vendor_components/Flot/jquery.flot.categories.js"></script>
	<script src="/minibus/assets/vendor_components/Flot/jquery.flot.time.js"></script>

	<!-- VoiceX Admin App -->
	<script src="/minibus/main/js/jquery.smartmenus.js"></script>
	<script src="/minibus/main/js/menus.js"></script>
	<script src="/minibus/main/js/template.js"></script>

	<!-- VoiceX Admin dashboard demo (This is only for demo purposes) -->
	<script src="/minibus/main/js/pages/dashboard3.js"></script>
	<script src="/minibus/main/js/pages/dashboard5.js"></script>

	<!-- VoiceX Admin for demo purposes -->
	<script src="/minibus/main/js/demo.js"></script>

	<script type="text/javascript">
	// Start jQuery function after page is loaded
	$(document).ready(function() {
		// Initiate DataTable function comes with plugin
		// $('#dataTable').DataTable();
		// Start jQuery click function to view Bootstrap modal when view info button is clicked
		// $('#modal-default').on('show', function(){
		$('#modal-button-id').click(function() {
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
				success: function(data) {

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

					alert($('#wfirstName2').val());
					alert('wwwwwwwwwwwwwwwwwwwww');

					// $('#modal-default').on('show');


					var new_modal = document.getElementById('modal_body_content');

					new_modal += '<img src=mimibus/fingerprint-gey.png>';

					$('#modal-default').html(new_modal);
				}
			, });
			// End AJAX function
		});
	});

</script>

<script>
	 $('#ismemberassociated').change(function() {
        if($(this).is(":checked")) 
		{
			document.getElementById("region").disabled = false;
			document.getElementById("association").disabled = false;
			document.getElementById("route").disabled = false;
		} 
		else
		{	
			document.getElementById("region").disabled = true;
			document.getElementById("association").disabled = true;
			document.getElementById("route").disabled = true;
			// clear area
			$("#route").html('');
		}  
    });
</script>

<script>
	document.getElementById("ismemberassociated").checked = true;
	document.getElementById("region").disabled = false;
	document.getElementById("association").disabled = false;
	document.getElementById("route").disabled = false;
	document.getElementById("licensenumber").disabled = true;
	document.getElementById("operatinglicensenumber").disabled = true;
	document.getElementById("createoperatinglicensefile").disabled = true;
	document.getElementById("drivinglicencecodes").disabled = true;
	$("#attachment").html( 'Uploads' );
</script>

<script>
	$('#membership-type').change(function(){
			var desc = $(this).find(":selected").text();

			console.log(desc.trim());

			// clear area
			$("#title").html('');

			if( $(this).val() != "")
			{
				$("#title").html( 'Create <b>' + desc +'</b> Member Profile');
				if( desc.trim() == "Driver")
				{
					$("#licensenumbertypelabel").html( 'Association Membership Number : <span class="text-danger">*</span>' );
					document.getElementById("licensenumber").disabled = false;
					document.getElementById("operatinglicensenumber").disabled = false;
					document.getElementById("createoperatinglicensefile").disabled = false;
					document.getElementById("drivinglicencecodes").disabled = false;
					document.getElementById("membershiplicensenumbertype").style.display = "none";
					$("#attachment").html( 'Upload Operating Sticker' );
				}
				else if( desc == "Operator")
				{
					$("#licensenumbertypelabel").html( 'Operating License Number : <span class="text-danger">*</span>' );
					document.getElementById("licensenumber").disabled = true;
					document.getElementById("operatinglicensenumber").disabled = false;
					document.getElementById("createoperatinglicensefile").disabled = false;
					document.getElementById("drivinglicencecodes").disabled = true;
					document.getElementById("membershiplicensenumbertype").disabled = true;
					document.getElementById("membershiplicensenumbertype").style.display = "none";
					$("#attachment").html( 'Upload Operating License' );

				}
				else if( desc == "Both Driver and Operator")
				{
					$("#licensenumbertypelabel").html( 'Operating License Number : <span class="text-danger">*</span>' );

					document.getElementById("licensenumber").disabled = false;
					document.getElementById("operatinglicensenumber").disabled = false;
					document.getElementById("createoperatinglicensefile").disabled = false;
					$("#membershiplicensenumbertype").html('\
						<label for="associationmembershipnumber">\
							Association Membership Number : \
							<span class="text-danger">*</span> \
						</label> \
						<input type="text" class="form-control required" \
							id="associationmembershipnumber" \
							name="associationmembershipnumber" \
							maxlength="12"> '
					);
					document.getElementById("membershiplicensenumbertype").style.display = "block";
					document.getElementById("drivinglicencecodes").disabled = false;
					document.getElementById("membershiplicensenumbertype").disabled = false;
					$("#attachment").html( 'Upload Operating License' );
				}
				else
				{
					// should never reach
					
				}
			}
			else
			{
				$("#title").html( 'Member Registration: Create Member Profile' );
				document.getElementById("licensenumber").disabled = true;
				document.getElementById("operatinglicensenumber").disabled = true;
				document.getElementById("createoperatinglicensefile").disabled = true;
				document.getElementById("drivinglicencecodes").disabled = true;
				document.getElementById("membershiplicensenumbertype").disabled = true;
				document.getElementById("membershiplicensenumbertype").style.display = "none";
				$("#attachment").html( 'Uploads' );
			}
			
	});

	$('#membership-type2').change(function(){
			var desc = $(this).find(":selected").text();

			console.log(desc);

			// clear area
			$("#title2").html('');

			if( $(this).val() != "")
			{
				$("#title2").html( 'Update <b>' + desc +'</b> Member Profile');
			}
			else
			{
				$("#title2").html( 'Member Registration: Create Member Profile' );
			}
			
	});

</script>

<script>

	$('#region').change(function(){
		var id = $(this).val();

		// clear area
		$("#route").html('');

		$('#association').find('option').not(':first').remove();

		$.ajax({
			url: 'members/getAssociations/'+ id.toString(),
			type: 'GET',
			dataType: 'json',
			success: function(response){

				var len = 0;
				if(response['data'] != null){
					len = response['data'].length;
				}

				console.log('hi2');


				if(len > 0){
					// Read data and create <option >
					for(var i=0; i<len; i++){

						var id = response['data'][i].association_id;
						var name = response['data'][i].name;

						console.log('the loop');
						console.log(name);

						var option = "<option value='"+id+"'>"+name+"</option>";

						console.log('the option to append');
						console.log(option);
						$("#association").append(option);
					}
					console.log('outside loop');
				}

			},
			error: function() {
				console.log(this.url);
			}
		});
	});

	//routes per association ajax function //TODO pull routes based of the selected association ID.

	$('#association').change(function(){
		var id = $(this).val();

		console.log(id);
		// alert(id);

		console.log("setting associations...");

		$('#route').find('input').not(':first').remove();

		$.ajax({
			url: 'members/getRoutesPerAssociation/'+id,
			type: 'get',
			dataType: 'json',
			success: function(response){

				var len = 0;

				// clear area
				$("#route").html('');

				if(response['data'] != null){
					len = response['data'].length;
				}

				if(len > 0){
					// Read data and create <option >
					for(var i=0; i<len; i++){

						var id = response['data'][i].id;
						var route_name = response['data'][i].route_id +" : " + response['data'][i].origin + " - " + response['data'][i].via + " - " + response['data'][i].destination;

						console.log('the loop');
						console.log(route_name);
							
						var input = "<input name=" + "'route[]'" + " type='" + "checkbox'" + " id='" + id + "'" + " value='" + id + "' " + ">";
						var label = "<label for='"+id+"' >" + route_name + "</label>";

						var option = "<div>" + input + label + "</div>";

						console.log('the option to append');
						console.log(option);

						
						$("#route").append(option);
					}
					console.log('outside loop');


				}

			}
		});
	});

		
</script>

<script>

	$('#editregion').change(function(){
		var id = $(this).val();

		// clear area
		$("#editroute").html('');

		$('#editassociation').find('option').not(':first').remove();

		$.ajax({
			url: 'getAssociations/'+ id.toString(),
			type: 'GET',
			dataType: 'json',
			success: function(response){

				var len = 0;
				if(response['data'] != null){
					len = response['data'].length;
				}

				if(len > 0){
					// Read data and create <option >
					for(var i=0; i<len; i++){

						var id = response['data'][i].association_id;
						var name = response['data'][i].name;

						console.log('the loop');
						console.log(name);

						var option = "<option value='"+id+"'>"+name+"</option>";

						console.log('the option to append');
						console.log(option);
						$("#editassociation").append(option);
					}
					console.log('outside loop');
				}

			},
			error: function() {
				console.log(this.url);
			}
		});
	});

	//routes per association ajax function //TODO pull routes based of the selected association ID.

	$('#editassociation').change(function(){
		var id = $(this).val();

		$.ajax({
			url: 'getRoutesPerAssociation/'+id,
			type: 'get',
			dataType: 'json',
			success: function(response){

				var len = 0;

				// clear area
				$("#editroute").html('');

				if(response['data'] != null){
					len = response['data'].length;
					console.log(id);
				}

				if(len > 0){
					// Read data and create <option >
					for(var i=0; i<len; i++){

						var id = response['data'][i].id;
						var route_name = response['data'][i].route_id +" : " + 
										response['data'][i].origin + " - " + 
										response['data'][i].via + " - " + 
										response['data'][i].destination;
							
						var input = "<input name=" + "'route[]'" + 
										" type='" + "checkbox'" + " id='" + 
											id + "'" + " value='" + id + "' " + ">";

						var label = "<label for='"+id+"' >" + route_name + "</label>";

						var option = "<div>" + input + label + "</div>";

						console.log('the option to append');
						console.log(option);

						
						$("#editroute").append(option);
					}
					console.log('outside loop');


				}

			}
		});
	});

		
</script>

<script>
	$('#error_on_email_number').fadeIn().delay(10000).fadeOut();
	$('#error_on_id_number').fadeIn().delay(10000).fadeOut();
	$('#error_on_employee_number').fadeIn().delay(10000).fadeOut();
	$('#error_on_create_member').fadeIn().delay(10000).fadeOut();
	//$('#vehicleregnoexistance').fadeIn().delay(10000).fadeOut();
</script>

<script>
	$("#regnumber").change(function() {
		var text = $(this).val();
		//console.log(text);
        $.ajax({
			url: 'getCarRegNumberCount/'+ text.toString(),
			type: 'GET',
			dataType: 'json',
			success: function(response){

				var count = 0;

				if(response['count'] != null){
					count = response['count'];
					console.log(text);
				}

				if(count > 0)
				{
					// clear area
					$("#vehicleregnoexistance").html('');
					$("#vehicleregnoexistance").html('<h5 class="text-warning" >\
														Vehicle already exists</h5>');

					console.log("vehicles");

				}
				else
				{
					// clear area
					$("#vehicleregnoexistance").html('');
					$("#vehicleregnoexistance").html('<h5 class="text-success" >\
														There are no drivers for this vehicle</h5>');
				}
			}
		});
	});
</script>

<script>
	$("#editregnumber").change(function() {
		var text = $(this).val();
		//console.log(text);
        $.ajax({
			url: 'getCarRegNumberCount/'+ text.toString(),
			type: 'GET',
			dataType: 'json',
			success: function(response){

				var count = 0;

				if(response['count'] != null){
					count = response['count'];
					console.log(text);
				}

				if(count > 0)
				{
					// clear area
					$("#editvehicleregnoexistance").html('');
					$("#editvehicleregnoexistance").html('<h5 class="text-warning" >\
														Vehicle already exists. Please click edit again</h5>');
					
					if(typeof response['datamv'] !== 'undefined' && 
						response['datamv'].length > 0 )
					{
						document.getElementById("vehicle_id").value = response['datamv'][0]['vehicles']
																	['vehicleclass']['id'].toString();
																	
						vehicle_class_id = response['datamv'][0]['vehicles']['vehicleclass']['id'].toString() ;
						vehicle_class = response['datamv'][0]['vehicles']['vehicleclass']['make'] + ';';
						vehicle_class += response['datamv'][0]['vehicles']['vehicleclass']['model'] + ';';
						vehicle_class += response['datamv'][0]['vehicles']['vehicleclass']['year'] + ' - range;';
						vehicle_class += response['datamv'][0]['vehicles']['vehicleclass']['seats_number'] + ' - seater;';
						
						vehicle_class_html = "<option value=\"" + vehicle_class_id + "\">";
						vehicle_class_html += vehicle_class.toString() + "</option>";
						$("#editvehicle_class").html('');
						$("#editvehicle_class").html(vehicle_class_html);
					
						notes = response['datamv'][0]['vehicles']['info'].toString();
						$("#editnotes").html('');
						$("#editnotes").html(notes);
					}
					if(typeof response['datar'] !== 'undefined' && 
									response['datar'].length > 0 )
					{
						region_id = response['datar'][0]['region_id'].toString();
						region_html += "<option selected value=\"";
						region_html +=  region_id.toString() + "\">";
						region_html += response['datamra'][0]['region_name'].toString();
						region_html += "</option>";
						$("#editregion").html('');
						$("#editregion").html(region_html);
					}

					if(typeof response['dataa'] !== 'undefined' && 
									response['dataa'].length > 0 )
					{
						association_id = response['dataa'][0]['association_id'].toString();
						association_html += "<option selected value=\"";
						association_html +=  association_id.toString() + "\">";
						association_html += response['datamra'][0]['association_name'].toString();
						association_html += "</option>";
						$("#editassociation").html('');
						$("#editassociation").html(association_html);
					}
					
					document.getElementById("editvehicle_class").disabled = true;
					document.getElementById("editnotes").disabled = true;
					document.getElementById("editregion").disabled = true;
					document.getElementById("editassociation").disabled = true;
					document.getElementById("editadd").disabled = true;
					$("#vehicleregnoexistance").html('');

					// clear area
					if(typeof response['dataa'] !== 'undefined' && 
									response['dataa'].length > 0 )
					{
						$("#editroute").html('');
						for(var i=0; i<response['datarv'].length; i++){

							var id = response['datarv'][i].id;
							var route_name = response['datarv'][i].route_id +" : " + 
											response['datarv'][i].origin + " - " + 
											response['datarv'][i].via + " - " + 
											response['datarv'][i].destination;
								
							var input = "<input name=" + "'route[]'" + 
											" type='" + "checkbox'" + " id='" + 
												id + "'" + " value='" + id + "' " + ">";
												
							var label = "<label for='"+id+"' >" + route_name + "</label>";

							var option = "<div>" + input + label + "</div>";

							console.log('the option to append');
							console.log(option);

							
							$("#editroute").append(option);
							document.getElementById("editroute").disabled = true;
						}
					}
				}
				else
				{
					// clear area
					$("#editvehicleregnoexistance").html('');
					$("#editvehicleregnoexistance").html('<h5 class="text-success" >\
														There are no drivers for this vehicle</h5>');
					
					document.getElementById("vehicle_id").value = "";

					document.getElementById("editvehicle_class").disabled = false;
				}
			}
		});
	});
</script>

<script>
	function validate() {
		var id_number = document.getElementById("idnumber").value;
		var dlicencenumber = document.getElementById("licensenumber").value;
		var olicencenumber = document.getElementById("operatinglicensenumber").value;
		var amembershipnumber = document.getElementById("associationmembershipnumber").value;
		var isValid = null;

		console.log("validate");

		$.ajax({
			url: 'idExists/'+ id_number.toString(),
			type: 'GET',
			dataType: 'json',
			success: function(response){

				if( response['data'] > 0)
				{
					return swal("Submission Cancelled", 
					"Member ID number already exists", 
					"error");
					isValid = false;
				}
				
			}
		});

		$.ajax({
			url: 'operatingLicenseNumberExists/'+ olicencenumber.toString(),
			type: 'GET',
			dataType: 'json',
			success: function(response){

				if( response['data'] > 0)
				{
					return swal("Submission Cancelled", 
					"Member Operating Licence number already exists", 
					"error");
					isValid = false;
				}
				
			}
		});

		$.ajax({
			url: 'driversLicenseNumberExists/'+ dlicencenumber.toString(),
			type: 'GET',
			dataType: 'json',
			success: function(response){

				if( response['data'] > 0)
				{
					return swal("Submission Cancelled", 
					"Member Driver Licence number already exists", 
					"error");
					isValid = false;
				}
				
			}
		});

		$.ajax({
			url: 'membershipNumberExists/'+ amembershipnumber.toString(),
			type: 'GET',
			dataType: 'json',
			success: function(response){

				if( response['data'] > 0)
				{
					return swal("Submission Cancelled", 
					"Membership number already exists", 
					"error");
					isValid = false;
				}
				
			}
		});

		if( isValid )
		{
			return swal({   
					title: "Member Submission",   
					text: "Are you sure you want to submit form ?",   
					type: "warning",   
					showCancelButton: true,   
					confirmButtonColor: "#DD6B55",   
					confirmButtonText: "Yes, submit it!",   
					cancelButtonText: "No, cancel plx!",   
					closeOnConfirm: false,   
					closeOnCancel: false 
				}, 
				function(isConfirm)
				{   
					if (isConfirm) {     
						swal("Sumitted!", "Member Profile has been created", "success");   
					} else {     
						swal("Cancelled", "Member Profile not submitted", "error");   
					}
				} 
			});
		}

	}
</script>


</body>
</html>
