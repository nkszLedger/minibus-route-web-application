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
            <li class="breadcrumb-item active" aria-current="page">Register/Edit Users</li>
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
        <div class="box-header with-border">
          <h4 class="box-title">Edit System Users</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
  			  <div class="row">
  				  <div class="col">
              <div class="row">
  						  <div class="col-12">
                  <form method="POST" action="{% url 'portfolio:users' %}" novalidate>
                    {% csrf_token %}
                    <div class="form-group">
      								<h5>First Name<span class="text-danger">*</span></h5>
      								<div class="controls">
      									<input type="text" name="name" class="form-control" required data-validation-required-message="This field is required" value="{{ Profile.user.first_name }}">
                      </div>
      							</div>
                    <div class="form-group">
      								<h5>Surname<span class="text-danger">*</span></h5>
      								<div class="controls">
      									<input type="text" name="surname" class="form-control" required data-validation-required-message="This field is required" value="{{ Profile.user.last_name }}">
                      </div>
      							</div>
                    <div class="form-group">
      								<h5>Occupation/Job Description<span class="text-danger">*</span></h5>
      								<div class="controls">
      									<input type="text" name="occupation" class="form-control" required data-validation-required-message="This field is required" value="{{ Profile.occupation }}">
                      </div>
      							</div>
                    <div class="form-group">
      								<h5>Institution Name<span class="text-danger">*</span></h5>
      								<div class="controls">
                        <select class="form-control" id="institution" name="institution" required data-validation-required-message="This field is required" value="{{ Profile.institution.name }}">
                          {% for institution in AllInstitutions %}
                            <option value={{ institution.id }}>{{ institution.name }}</option>
                          {% endfor %}
                        </select>
      								</div>
      							</div>
                    <div class="form-group">
      								<h5>Official Group<span class="text-danger">*</span></h5>
      								<div class="controls">
                        <select class="form-control" id="roles" name="roles" required data-validation-required-message="This field is required" value="{{ Profile.group.name }}">
                          {% for group in AllGroups %}
                            <option value={{ group.id }}>{{ group.name }}</option>
                          {% endfor %}
                        </select>
      								</div>
      							</div>
                    <div class="form-group">
      								<h5>Email Address<span class="text-danger">*</span></h5>
      								<div class="controls">
      									<input type="email" name="email" class="form-control" required data-validation-required-message="This field is required" {% if Profile.user.email != None %} readonly placeholder="Readonly input field" {% endif %} value="{{ Profile.user.email }}"> </div>
      							</div>
                    <div class="form-group">
                      <div class="controls">
                        <input type="checkbox" id="activity" name="activity" class="filled-in chk-col-info" checked="{{ user.is_active }}" value="{{ user.is_active }}"/>
                        <label for="activity">Activate/Deactivate</label>
                      </div>
                    </div>
                    <div class="box-footer text-right">
                      <button type="submit" class="btn btn-info mb-5">Submit</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </div>
</section>

{% endblock content %}
