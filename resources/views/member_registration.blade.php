<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

      <title> MiniBus Route Registration App</title>


      <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="/minibus/assets/vendor_components/bootstrap/dist/css/bootstrap.css">

      <!--alerts CSS -->
      <link href="/minibus/assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

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


  </head>

<body class="layout-top-nav light-skin theme-purple fixed">

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
			<h2 class="nav-brand"><a href="dashboard"><img src="/minibus/free-minibus-vector.png" class="max-w-50" alt="minibus-app"></a></h2>
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
{{--                    <ul>--}}
{{--                        <li><a href="pages/layout_boxed.html">Register</a></li>--}}
{{--                        <li><a href="pages/layout_fixed.html">Register op2</a></li>--}}
{{--                    </ul>--}}
                </li>

                <li><a href="/list_members"><i class="ti-files mx-5"></i>MEMBER MANAGEMENT</a>
                </li>

<!--				<li><a href="#"><i class="ti-layout-grid2 mx-5"></i>APPS</a>-->
<!--				  <ul>-->
<!--					<li><a href="pages/mailbox.html">Mailbox</a></li>-->
<!--					<li><a href="#">Contact</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/contact_app_chat.html">Chat app</a></li>-->
<!--						<li><a href="pages/contact_app.html">Contact / Employee</a></li>-->
<!--						<li><a href="pages/contact_userlist_grid.html">Userlist Grid</a></li>-->
<!--						<li><a href="pages/contact_userlist.html">Userlist</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--					<li><a href="#">Extra</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/extra_app_ticket.html">Support Ticket</a></li>-->
<!--						<li><a href="pages/extra_calendar.html">Calendar</a></li>-->
<!--						<li><a href="pages/extra_profile.html">Profile</a></li>-->
<!--						<li><a href="pages/extra_taskboard.html">Project DashBoard</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--				  </ul>-->
<!--				</li>-->
<!--				<li><a href="#"><i class="ti-pencil-alt mx-5"></i>UI & WIDGETS</a>-->
<!--				  <ul>-->
<!--					<li><a href="#">UI Elements</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/ui_badges.html">Badges</a></li>-->
<!--						<li><a href="pages/ui_border_utilities.html">Border</a></li>-->
<!--						<li><a href="pages/ui_buttons.html">Buttons</a></li>-->
<!--						<li><a href="pages/ui_color_utilities.html">Color</a></li>-->
<!--						<li><a href="pages/ui_dropdown.html">Dropdown</a></li>-->
<!--						<li><a href="pages/ui_dropdown_grid.html">Dropdown Grid</a></li>-->
<!--						<li><a href="pages/ui_typography.html">Typography</a></li>-->
<!--						<li><a href="pages/ui_progress_bars.html">Progress Bars</a></li>-->
<!--						<li><a href="pages/ui_grid.html">Grid</a></li>-->
<!--						<li><a href="pages/ui_ribbons.html">Ribbons</a></li>-->
<!--						<li><a href="pages/ui_sliders.html">Sliders</a></li>-->
<!--						<li><a href="pages/ui_tab.html">Tabs</a></li>-->
<!--						<li><a href="pages/ui_timeline.html">Timeline</a></li>-->
<!--						<li><a href="pages/ui_timeline_horizontal.html">Horizontal Timeline</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--					<li><a href="#">Icons</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/icons_fontawesome.html">Font Awesome</a></li>-->
<!--						<li><a href="pages/icons_glyphicons.html">Glyphicons</a></li>-->
<!--						<li><a href="pages/icons_material.html">Material Icons</a></li>-->
<!--						<li><a href="pages/icons_themify.html">Themify Icons</a></li>-->
<!--						<li><a href="pages/icons_simpleline.html">Simple Line Icons</a></li>-->
<!--						<li><a href="pages/icons_cryptocoins.html">Cryptocoins Icons</a></li>-->
<!--						<li><a href="pages/icons_flag.html">Flag Icons</a></li>-->
<!--						<li><a href="pages/icons_weather.html">Weather Icons</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--					<li><a href="#">Components</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/component_bootstrap_switch.html">Bootstrap Switch</a></li>-->
<!--						<li><a href="pages/component_date_paginator.html">Date Paginator</a></li>-->
<!--						<li><a href="pages/component_media_advanced.html">Advanced Medias</a></li>-->
<!--						<li><a href="pages/component_modals.html">Modals</a></li>-->
<!--						<li><a href="pages/component_nestable.html">Nestable</a></li>-->
<!--						<li><a href="pages/component_notification.html">Notification</a></li>-->
<!--						<li><a href="pages/component_portlet_draggable.html">Draggable Portlets</a></li>-->
<!--						<li><a href="pages/component_sweatalert.html">Sweet Alert</a></li>-->
<!--						<li><a href="pages/component_rangeslider.html">Range Slider</a></li>-->
<!--						<li><a href="pages/component_rating.html">Ratings</a></li>-->
<!--						<li><a href="pages/component_animations.html">Animations</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--					<li><a href="#">Box Cards</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/box_cards.html">User Card</a></li>-->
<!--						<li><a href="pages/box_advanced.html">Advanced Card</a></li>-->
<!--						<li><a href="pages/box_basic.html">Basic Card</a></li>-->
<!--						<li><a href="pages/box_color.html">Card Color</a></li>-->
<!--						<li><a href="pages/box_group.html">Card Group</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--					<li><a href="#">Widgets</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/widgets_blog.html">Blog</a></li>-->
<!--						<li><a href="pages/widgets_chart.html">Chart</a></li>-->
<!--						<li><a href="pages/widgets_list.html">List</a></li>-->
<!--						<li><a href="pages/widgets_social.html">Social</a></li>-->
<!--						<li><a href="pages/widgets_statistic.html">Statistic</a></li>-->
<!--						<li><a href="pages/widgets_weather.html">Weather</a></li>-->
<!--						<li><a href="pages/widgets.html">Widgets</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--				  </ul>-->
<!--				</li>-->
<!--				<li><a href="#"><i class="ti-write mx-5"></i>FORMS & TABLES</a>-->
<!--				  <ul>-->
<!--					<li><a href="#">Forms</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/forms_advanced.html">Advanced Elements</a></li>-->
<!--						<li><a href="pages/forms_code_editor.html">Code Editor</a></li>-->
<!--						<li><a href="pages/forms_editor_markdown.html">Markdown</a></li>-->
<!--						<li><a href="pages/forms_editors.html">Editors</a></li>-->
<!--						<li><a href="pages/forms_validation.html">Form Validation</a></li>-->
<!--						<li><a href="pages/forms_wizard.html">Form Wizard</a></li>-->
<!--						<li><a href="pages/forms_general.html">General Elements</a></li>-->
<!--						<li><a href="pages/forms_mask.html">Formatter</a></li>-->
<!--						<li><a href="pages/forms_xeditable.html">Xeditable Editor</a></li>-->
<!--						<li><a href="pages/forms_dropzone.html">Dropzone</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--					<li><a href="#">Tables</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/tables_simple.html">Simple tables</a></li>-->
<!--						<li><a href="pages/tables_data.html">Data tables</a></li>-->
<!--						<li><a href="pages/tables_editable.html">Editable Tables</a></li>-->
<!--						<li><a href="pages/tables_color.html">Table Color</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--				  </ul>-->
<!--				</li>-->
<!--				<li><a href="#"><i class="ti-stats-up mx-5"></i>CHARTS</a>-->
<!--				  <ul>-->
<!--					<li><a href="pages/charts_chartjs.html">ChartJS</a></li>-->
<!--					<li><a href="pages/charts_flot.html">Flot</a></li>-->
<!--					<li><a href="pages/charts_inline.html">Inline charts</a></li>-->
<!--					<li><a href="pages/charts_morris.html">Morris</a></li>-->
<!--					<li><a href="pages/charts_peity.html">Peity</a></li>-->
<!--					<li><a href="pages/charts_chartist.html">Chartist</a></li>-->
<!--					<li><a href="#">C3 Charts</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/charts_c3_axis.html">Axis Chart</a></li>-->
<!--						<li><a href="pages/charts_c3_bar.html">Bar Chart</a></li>-->
<!--						<li><a href="pages/charts_c3_data.html">Data Chart</a></li>-->
<!--						<li><a href="pages/charts_c3_line.html">Line Chart</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--					<li><a href="#">Echarts</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/charts_echarts_basic.html">Basic Charts</a></li>-->
<!--						<li><a href="pages/charts_echarts_bar.html">Bar Chart</a></li>-->
<!--						<li><a href="pages/charts_echarts_pie_doughnut.html">Pie & Doughnut Chart</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--				  </ul>-->
<!--				</li>-->
<!--				<li><a href="#"><i class="ti-plug mx-5"></i>EXTRA COMPONENTS</a>-->
<!--				  <ul>-->
<!--					<li><a href="#">Emails</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/email_welcome.html">Welcome Email</a></li>-->
<!--						<li><a href="pages/email_verify_email.html">Verify Emial</a></li>-->
<!--						<li><a href="pages/email_change_pass.html">Change Password</a></li>-->
<!--						<li><a href="pages/email_update.html">User Updates</a></li>-->
<!--						<li><a href="pages/email_expired_card.html">Expired Card</a></li>-->
<!--						<li><a href="pages/email_closed_account.html">Closed Account</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--					<li><a href="#">Map</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/map_google.html">Google Map</a></li>-->
<!--						<li><a href="pages/map_vector.html">Vector Map</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--					<li><a href="#">Extension</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/extension_fullscreen.html">Fullscreen</a></li>-->
<!--						<li><a href="pages/extension_pace.html">Pace</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--				  </ul>-->
<!--				</li>-->

<!--                MORE tab starts here-->
<!--				<li><a href="#"><i class="ti-shopping-cart mx-5"></i>ECOMMERCE</a>-->
<!--				  <ul>-->
<!--					<li><a href="pages/ecommerce_products.html">Products</a></li>-->
<!--					<li><a href="pages/ecommerce_cart.html">Products Cart</a></li>-->
<!--					<li><a href="pages/ecommerce_products_edit.html">Products Edit</a></li>-->
<!--					<li><a href="pages/ecommerce_details.html">Product Details</a></li>-->
<!--					<li><a href="pages/ecommerce_orders.html">Product Orders</a></li>-->
<!--					<li><a href="pages/ecommerce_checkout.html">Products Checkout</a></li>-->
<!--				  </ul>-->
<!--				</li>-->
<!--				<li><a href="#"><i class="ti-files mx-5"></i>PAGES</a>-->
<!--				  <ul>-->
<!--					<li><a href="#">Authentication</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/auth_login.html">Login</a></li>-->
<!--						<li><a href="pages/auth_login2.blade.php">Login 2</a></li>-->
<!--						<li><a href="pages/auth_register.html">Register</a></li>-->
<!--						<li><a href="pages/auth_register2.html">Register 2</a></li>-->
<!--						<li><a href="pages/auth_lockscreen.html">Lockscreen</a></li>-->
<!--						<li><a href="pages/auth_user_pass.html">Recover password</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--					<li><a href="#">Invoice</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/invoice.html">Invoice</a></li>-->
<!--						<li><a href="pages/invoicelist.html">Invoice List</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--					<li><a href="#">Error Pages</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/error_400.html">Error 400</a></li>-->
<!--						<li><a href="pages/error_403.html">Error 403</a></li>-->
<!--						<li><a href="pages/error_404.html">Error 404</a></li>-->
<!--						<li><a href="pages/error_500.html">Error 500</a></li>-->
<!--						<li><a href="pages/error_503.html">Error 503</a></li>-->
<!--						<li><a href="pages/error_maintenance.html">Maintenance</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--					<li><a href="#">Coming Soon</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/sample_coming_soon_1.html">Coming Soon 1</a></li>-->
<!--						<li><a href="pages/sample_coming_soon_2.html">Coming Soon 2</a></li>-->
<!--						<li><a href="pages/sample_coming_soon_3.html">Coming Soon 3</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--					<li><a href="#">Sample Pages</a>-->
<!--					  <ul>-->
<!--						<li><a href="pages/sample_blank.html">Blank</a></li>-->
<!--						<li><a href="pages/sample_custom_scroll.html">Custom Scrolls</a></li>-->
<!--						<li><a href="pages/sample_faq.html">FAQ</a></li>-->
<!--						<li><a href="pages/sample_gallery.html">Gallery</a></li>-->
<!--						<li><a href="pages/sample_lightbox.html">Lightbox Popup</a></li>-->
<!--						<li><a href="pages/sample_pricing.html">Pricing</a></li>-->
<!--					  </ul>-->
<!--					</li>-->
<!--				  </ul>-->
<!--				</li>-->
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
							<img src="minibus/images/user2-160x160.jpg" class="rounded-circle" alt="User Image">
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
		<!-- Content Header (Page header) -->
		<!-- Main content -->
          <section class="content">
              <div class="row">
                  <div class="col-12">
                      <!-- Validation wizard -->
                      <div class="box box-default">
                          <div class="box-header with-border">
                              <h4 class="box-title">Complete the following form.</h4>
                              <h6 class="box-subtitle"></h6>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body wizard-content">
                              <form action="/create_member" type="POST" id="member-form" class="validation-wizard wizard-circle">
                              {{ csrf_field() }}
                                  <input type="hidden" class="form-control " id="member-id" value="" name="member-id">

                          <!-- Step 1 -->
                                  <h6>Personal Details</h6>
                                  <section>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="wfirstName2"> First Name : <span class="danger">*</span> </label>
{{--                                                  <a href="#modal-default" data-toggle="modal" id="modal-button-id"  > <b>Profile</b></a>--}}

                                                  <input type="text" class="form-control required" id="wfirstName2" name="firstName"> </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="wlastName2"> Last Name : <span class="danger">*</span> </label>
                                                  <input type="text" class="form-control required" id="wlastName2" name="lastName"> </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="idnumber"> ID Number : <span class="danger">*</span> </label>
                                                  <input type="number" class="form-control required" id="idnumber" name="idnumber" maxlength="13" pattern="[0-9]"> </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="licensenumber"> License Number : <span class="danger">*</span> </label>
                                                  <input type="text" class="form-control required" id="licensenumber" name="licensenumber"> </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="wemailAddress2"> Email Address :</label>
                                                  <input type="email" class="form-control" id="wemailAddress2" name="emailAddress"> </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="wphoneNumber2">Phone Number : <span class="danger">*</span>  </label>
                                                  <input type="tel" class="form-control required" id="wphoneNumber2" name="phonenumber" pattern="[0-9]" maxlength="10"> </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="addressline1">Address Line 1 : <span class="danger">*</span>  </label>
                                                  <input type="text" class="form-control required" id="addressline1" name="addressline1"> </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="addressline2">Address Line 2 :</label>
                                                  <input type="text" class="form-control" id="addressline2" name="addressline2"> </div>
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="membership-type"> Select Membership : <span class="danger">*</span> </label>
                                                  <select class="custom-select form-control required" id="membership-type" name="membership-type">
                                                      <option value="">Please Select Membership</option>
                                                      @foreach ($all_types as $all_type)
                                                          <option value="{{$all_type->id}}">{{$all_type->membership_type}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
{{--                                              <div class="form-group">--}}
{{--                                                  <button type="submit" onclick=""> save to db</button>--}}
{{--                                              </div>--}}
                                          </div>
                                      </div>
                                  </section>
                                  <!-- Step 2 -->
                                  <h6>Vehicle Details</h6>
                                  <section>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="regnumber">Registration Number : <span class="danger">*</span> </label>
                                                  <input type="text" class="form-control required" id="regnumber" name="regnumber">
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="vehiclemake">Make : <span class="danger">*</span></label>
                                                  <input type="text" class="form-control required" id="vehiclemake" name="vehiclemake"> </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="vehiclemodel">Model : <span class="danger">*</span> </label>
                                                  <input type="text" class="form-control required" id="vehiclemodel" name="vehiclemodel">
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="webUrl3">Year : <span class="danger">*</span></label>
                                                  <input type="text" class="form-control required" id="webUrl3" name="vehicleyear"> </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="vehicleseats">Number of seats : <span class="danger">*</span></label>
                                                  <input type="number" class="form-control required" id="vehicleseats" name="vehicleseats">
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                              </div>
                                          </div>
                                      </div>
                                  </section>
                                  <!-- Step 3 -->
                                  <h6>Association and Routes</h6>
                                  <section>
                                      <div class="row">
                                          <div class="col-md-6">
                                              {{--                                              <div class="form-group">--}}
                                              {{--                                                  <label for="wint1">Interview For :</label>--}}
                                              {{--                                                  <input type="text" class="form-control required" id="wint1">--}}
                                              {{--                                              </div>--}}
                                              <div class="form-group">
                                                  <label for="wintType1">Region: <span class="danger">*</span> </label>
                                                  <select class="custom-select form-control required" id="region" data-placeholder="Type to search cities" name="region">
                                                      <option value="">Please select Region</option>
                                                      @foreach ($all_regions as $region)
                                                          <option value="{{$region->region_id}}">{{$region->region_name}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                              <div class="form-group">
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="association">Association :<span class="danger">*</span>  </label>
                                                  <select class="custom-select form-control required " id="association" name="association">
                                                      <option value="">Please select Association</option>
                                                      @foreach ($all_associations as $association)
                                                          <option value="{{$association->association_id}}">{{$association->name}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label>Route : <span class="danger">*</span></label>
                                                  <hr class="mb-15 mt-0">
                                                  @foreach ($all_routes as $route)
                                                      <input name="route[]" type="checkbox" id="{{$route->id}}" value="{{$route->id}}">
                                                      <label for="{{$route->id}}" class="d-block">{{$route->id.'  :  '}}{{$route->origin}}{{' - '.$route->via.' - '}} {{$route->destination}}</label>
                                                  @endforeach
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                          </div>
                                      </div>
                                  </section>
                                  <!-- Step 4 -->
{{--                                  <h6>Step 4</h6>--}}
{{--                                  <section>--}}
{{--                                      <div class="row">--}}
{{--                                          <div class="col-md-6">--}}
{{--                                              <div class="form-group">--}}
{{--                                                  <label for="behName3">Behaviour :</label>--}}
{{--                                                  <input type="text" class="form-control required" id="behName3">--}}
{{--                                              </div>--}}
{{--                                              <div class="form-group">--}}
{{--                                                  <label for="participants3">Confidance</label>--}}
{{--                                                  <input type="text" class="form-control required" id="participants3">--}}
{{--                                              </div>--}}
{{--                                              <div class="form-group">--}}
{{--                                                  <label for="participants4">Result</label>--}}
{{--                                                  <select class="custom-select form-control required" id="participants4" name="location">--}}
{{--                                                      <option value="">Select Result</option>--}}
{{--                                                      <option value="Selected">Selected</option>--}}
{{--                                                      <option value="Rejected">Rejected</option>--}}
{{--                                                      <option value="Call Second-time">Call Second-time</option>--}}
{{--                                                  </select>--}}
{{--                                              </div>--}}
{{--                                          </div>--}}
{{--                                          <div class="col-md-6">--}}
{{--                                              <div class="form-group">--}}
{{--                                                  <label for="decisions2">Comments</label>--}}
{{--                                                  <textarea name="decisions" id="decisions2" rows="4" class="form-control"></textarea>--}}
{{--                                              </div>--}}
{{--                                              <div class="form-group">--}}
{{--                                                  <label>Rate Interviwer :</label>--}}
{{--                                                  <div class="c-inputs-stacked">--}}
{{--                                                      <input type="checkbox" id="checkbox_6">--}}
{{--                                                      <label for="checkbox_6" class="d-block">1 star</label>--}}
{{--                                                      <input type="checkbox" id="checkbox_7">--}}
{{--                                                      <label for="checkbox_7" class="d-block">2 star</label>--}}
{{--                                                      <input type="checkbox" id="checkbox_8">--}}
{{--                                                      <label for="checkbox_8" class="d-block">3 star</label>--}}
{{--                                                      <input type="checkbox" id="checkbox_9">--}}
{{--                                                      <label for="checkbox_9" class="d-block">4 star</label>--}}
{{--                                                      <input type="checkbox" id="checkbox_10">--}}
{{--                                                      <label for="checkbox_10" class="d-block">5 star</label>--}}
{{--                                                  </div>--}}
{{--                                              </div>--}}
{{--                                          </div>--}}
{{--                                      </div>--}}
{{--                                  </section>--}}
                              </form>
                          </div>
                          <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                  </div>
              </div>
          </section>
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


<!-- member profile modal Area -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Member Profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" id="modal_body_content">
                <h4>Personal Details</h4>
                <hr>
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wfirstName2"> First Name : <span class="danger">*</span> </label>
                                <input type="text" class="form-control required" id="wfirstName2" name="firstName"> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wlastName2"> Last Name : <span class="danger">*</span> </label>
                                <input type="text" class="form-control required" id="wlastName2" name="lastName"> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idnumber"> ID Number : <span class="danger">*</span> </label>
                                <input type="number" class="form-control required" id="idnumber" name="idnumber" maxlength="13" pattern="[0-9]"> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="licensenumber"> License Number : <span class="danger">*</span> </label>
                                <input type="text" class="form-control required" id="licensenumber" name="licensenumber"> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wemailAddress2"> Email Address :</label>
                                <input type="email" class="form-control" id="wemailAddress2" name="emailAddress"> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wphoneNumber2">Phone Number : <span class="danger">*</span>  </label>
                                <input type="tel" class="form-control required" id="wphoneNumber2" name="phonenumber" pattern="[0-9]" maxlength="10"> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addressline1">Address Line 1 : <span class="danger">*</span>  </label>
                                <input type="text" class="form-control required" id="addressline1" name="addressline1"> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addressline2">Address Line 2 :</label>
                                <input type="text" class="form-control" id="addressline2" name="addressline2"> </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="membership-type"> Select Membership : <span class="danger">*</span> </label>
                                <select class="custom-select form-control required" id="membership-type" name="membership-type">
                                    <option value="">Please Select Membership</option>
                                    {{--                                        @foreach ($all_members as $all_type)--}}
                                    {{--                                            <option value="{{$all_type['membership_type']['id']}}">{{$all_type['membership_type']['membership_type']}}</option>--}}
                                    {{--                                        @endforeach--}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                <input type="text" class="form-control required" id="regnumber" name="regnumber">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vehiclemake">Make : <span class="danger">*</span></label>
                                <input type="text" class="form-control required" id="vehiclemake" name="vehiclemake"> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vehiclemodel">Model : <span class="danger">*</span> </label>
                                <input type="text" class="form-control required" id="vehiclemodel" name="vehiclemodel">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="webUrl3">Year : <span class="danger">*</span></label>
                                <input type="text" class="form-control required" id="webUrl3" name="vehicleyear"> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vehicleseats">Number of seats : <span class="danger">*</span></label>
                                <input type="number" class="form-control required" id="vehicleseats" name="vehicleseats">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            </div>
                        </div>
                    </div>
                </section>

                <h6>Association and Routes</h6>
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            {{--                                              <div class="form-group">--}}
                            {{--                                                  <label for="wint1">Interview For :</label>--}}
                            {{--                                                  <input type="text" class="form-control required" id="wint1">--}}
                            {{--                                              </div>--}}
                            <div class="form-group">
                                <label for="wintType1">Region:</label>
                                <select class="custom-select form-control required" id="wintType1" data-placeholder="Type to search cities" name="wintType1">
                                    <option value="Banquet">Tshwane</option>
                                    <option value="Fund Raiser">Region 1</option>
                                    <option value="Dinner Party">Region 2</option>
                                </select>
                            </div>
                            <div class="form-group">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="association">Association :</label>
                                <select class="custom-select form-control " id="association" name="association">
                                    <option id="association_option" value="">Please select Association</option>
                                    {{--                                        @foreach ($all_associations as $association)--}}
                                    {{--                                            <option value="{{$association->id}}">{{$association->name}}</option>--}}
                                    {{--                                        @endforeach--}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Route :</label>
                                <hr class="mb-15 mt-0">
                                {{--                                    @foreach ($all_routes as $route)--}}
                                <input name="route[]" type="checkbox" id="route" value="Route 1">

                                {{--                                        <input name="route" type="checkbox" id="{{$route->id}}" value="{{$route->id}}">--}}
                                {{--                                        <label for="{{$route->id}}" class="d-block">{{$route->route_id.' : '}}{{$route->origin}}{{' - '.$route->via.' - '}} {{$route->destination}}</label>--}}
                                {{--                                    @endforeach--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        </div>
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <a href="{{ url('show_member', 1)}}" type="submit" id="edit_button" class="btn btn-primary float-right">Edit </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->





	<!-- jQuery 3 -->
	<script src="minibus/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

	<!-- fullscreen -->
	<script src="minibus/assets/vendor_components/screenfull/screenfull.js"></script>

	<!-- popper -->
	<script src="minibus/assets/vendor_components/popper/dist/popper.min.js"></script>

	<!-- Bootstrap 4.0-->
	<script src="minibus/assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>

	<!-- date-range-picker -->
	<script src="minibus/assets/vendor_components/moment/min/moment.min.js"></script>
	<script src="/minibus/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>

	<!-- Slimscroll -->
	<script src="minibus/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

	<!-- FastClick -->
	<script src="minibus/assets/vendor_components/fastclick/lib/fastclick.js"></script>

	<!-- apexcharts -->
	<script src="minibus/assets/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
	<script src="minibus/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>

	<!-- FLOT CHARTS -->
	<script src="minibus/assets/vendor_components/Flot/jquery.flot.js"></script>
	<script src="minibus/assets/vendor_components/Flot/jquery.flot.resize.js"></script>
	<script src="minibus/assets/vendor_components/Flot/jquery.flot.pie.js"></script>
	<script src="minibus/assets/vendor_components/Flot/jquery.flot.categories.js"></script>
	<script src="minibus/assets/vendor_components/Flot/jquery.flot.time.js"></script>

	<!-- VoiceX Admin App -->
	<script src="minibus/main/js/jquery.smartmenus.js"></script>
	<script src="minibus/main/js/menus.js"></script>
	<script src="minibus/main/js/template.js"></script>
	<script src="minibus/main/js/pages/voice-search.js"></script>

	<!-- VoiceX Admin dashboard demo (This is only for demo purposes) -->
	<script src="minibus/main/js/pages/dashboard3.js"></script>

	<!-- VoiceX Admin for demo purposes -->
	<script src="minibus/main/js/demo.js"></script>

    <!-- steps  -->
    <script src="minibus/assets/vendor_components/jquery-steps-master/build/jquery.steps.js"></script>

    <!-- validate  -->
    <script src="minibus/assets/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>


    <!-- Sweet-Alert  -->
    <script src="minibus/assets/vendor_components/sweetalert/sweetalert.min.js"></script>

    <!-- wizard  -->
    <script src="minibus/main/js/pages/steps.js"></script>

<script>

    $('#region').change(function(){
        var id = $(this).val();

        console.log(id);

        $('#association').find('option').not(':first').remove();
        $.ajax({
            url: 'getAssociations/'+id,
            type: 'get',
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
                        $("#association").append(option);
                    }
                    console.log('outside loop');


                }

            }
        });
    });

    //routes per association ajax function //TODO pull routes based of the selected association ID.

    $('#association').change(function(){
        var id = $(this).val();

        console.log(id);
        // alert(id);

        // $('#route').find('input').not(':first').remove();
        $.ajax({
            url: 'getRoutesPerAssociation/'+id,
            type: 'get',
            dataType: 'json',
            success: function(response){

                var len = 0;
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

                        var option = "<input  type='checkbox'  value='"+id+"'>"+ route_name  +
                            "<label for='"+id+"' >" + route_name + "</label>";

                    {{--<input name="route[]" type="checkbox" id="{{$route->id}}" value="{{$route->id}}">--}}
                    {{--        <label for="{{$route->id}}" class="d-block">{{$route->origin_id. ' :  '}}{{$route->origin}}{{' - '.$route->via.' - '}} {{$route->destination}}</label>--}}

                        console.log('the option to append');
                        console.log(option);
                        // $("#route").replaceWith(option);
                    }
                    console.log('outside loop');


                }

            }
        });
    });


</script>

{{--<script type="text/javascript">--}}
{{--    // Start jQuery function after page is loaded--}}
{{--    $(document).ready(function(){--}}
{{--        // Initiate DataTable function comes with plugin--}}
{{--        // $('#dataTable').DataTable();--}}
{{--        // Start jQuery click function to view Bootstrap modal when view info button is clicked--}}
{{--        // $('#modal-default').on('show', function(){--}}
{{--        $('#modal-button-id').click(function(){--}}
{{--            //console.log('hello wordd');--}}

{{--            // Get the id of selected phone and assign it in a variable called phoneData--}}
{{--            var phoneData = $(this).attr('id');--}}
{{--            $('#modal_body_content').html('Loading..');--}}
{{--            //console.log(phoneData);--}}
{{--            // Start AJAX function--}}
{{--            $.ajax({--}}
{{--                // Path for controller function which fetches selected phone data--}}
{{--                url: "showmodal/1",--}}
{{--                // Method of getting data--}}
{{--                method: "GET",--}}
{{--                // Data is sent to the server--}}
{{--                // data: {'phoneDataaaa':phoneData},--}}
{{--                // Callback function that is executed after data is successfully sent and recieved--}}
{{--                success: function(data){--}}

{{--                   // console.log(data.member_record.name);--}}
{{--                    // Print the fetched data of the selected phone in the section called #phone_result--}}
{{--                    // within the Bootstrap modal--}}
{{--                    $('#modal_body_content').html(data);--}}


{{--                    //if(data.member_record !==) {--}}
{{--                    //    document.getElementById('wfirstName2').value = 'Tshegoidfunction';// = "Tshegoidfunction";//data.member_record.name;--}}
{{--                    //     document.getElementById('wlastName2').value = data.member_record.surname;--}}

{{--                    // nm.value = 'Tshegoidfunction';--}}
{{--                    // surname.value = data.member_record.surname;--}}
{{--                    // }--}}
{{--                    // else {--}}
{{--                    //     console.log("data.member_record is null");--}}
{{--                    // }--}}
{{--                    //--}}
{{--                    console.log("surname value");--}}
{{--                    $('#wfirstName2').val('data.member_record.surname');--}}

{{--                    alert( $('#wfirstName2').val());--}}

{{--                    // $('#modal-default').on('show');--}}
{{--                    $('#modal-default').modal('show');--}}


{{--                },--}}
{{--            });--}}
{{--            // End AJAX function--}}
{{--        });--}}
{{--    });--}}


{{--</script>--}}

</body>
</html>
