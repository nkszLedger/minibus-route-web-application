{% extends "home.html" %}
{% block content %}
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Users</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Registered Users Summary</li>
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
							<h4 class="box-title">View All Users</h4>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
									<thead>
										<tr>
											<th>Name</th>
											<th>Surname</th>
											<th>Email</th>
											<th>Role</th>
											<th>Date Created</th>
											<th>Account Status</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
									{% for profile in UserAccounts %}
										<tr>
											<td>{{ profile.user.first_name }}</td>
											<td>{{ profile.user.last_name }}</td>
											<td>{{ profile.user.email }}</td>
											<td>{{ profile.role_at_entity }}</td>
											<td>
											<span class="text-muted">{{ profile.user.date_joined }}</span>
											</td>
											<td>
												{% if profile.user.is_active %}
													<span class="badge badge-pill badge-success">Active</span>
												{% else %}
													<span class="badge badge-pill badge-danger">Inactive</span>
												{% endif %}
									     	</td>
											<td><a href="{% url 'portfolio:editUser' profile.id %}"><span class="glyphicon glyphicon-pencil"></span></a></td>
										</tr>
						  			{% endfor %}
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
		 	</div>
			<!-- /.row -->
		</section>
	<!-- /.content -->
{% endblock content %}
