{% extends "home.html" %}
{% block content %}
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Registration</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Users</li>
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
          <h4 class="box-title">User Registration</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
              <div class="row">
                <div class="col-12">
                  <form method="POST" action= "{% url 'portfolio:user_register' %}">
                    {% csrf_token %}

                    <div class="form-group">
                      <div class="controls">
                        <input type="hidden" class="form-control" name="user_id" value="{{UserAccount.user.id}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <h5>Name<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="text" class="form-control" name="userName" required data-validation-required-message="This field is required" value="{{UserAccount.user.first_name}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <h5>Surname<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="text" class="form-control" name="userSurname" required data-validation-required-message="This field is required" value="{{UserAccount.user.last_name}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <h5>Type of user<span class="text-danger">*</span></h5>
                      <div class="controls">
                          <select class="form-control select2" name="userType" required data-validation-required-message="This field is required">
                          {% for role in Roles %}
                            {% if role != UserAccount.role_id%}
                              <option value="{{role.id}}">{{role.role}}</option>
                            {% else %}
                              <option value="{{UserAccount.role_id.id}}" selected="selected">{{UserAccount.role_id.role}}</option>
                            {% endif %}
                          {% endfor %}
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <h5>Implementing Unit<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select class="form-control select2" name="userEntity" required data-validation-required-message="This field is required">
                          {% for entity in FundedEntitys %}
                            {% if entity != UserAccount.funded_entity_id %}
                              <option value="{{entity.id}}">{{entity.name}}</option>
                            {% else %}
                          <option value="{{UserAccount.funded_entity_id.id}}" selected="selected">{{UserAccount.funded_entity_id.name}}</option>
                            {% endif %}
                          {% endfor %}
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <h5>Occupation<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="text" class="form-control" name="userOccupation" required data-validation-required-message="This field is required" value="{{UserAccount.role_at_entity}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <h5>Account Status<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select class="form-control select2" name="userAccountStatus" required data-validation-required-message="This field is required">
                          <option selected="selected "></option>
                          {% for status in AccountStatuses %}
                            <option value="{{status.id}}">{{status.account_status}}</option>
                          {% endfor %}
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <h5>Email<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="text" class="form-control" name="userEmail" required data-validation-required-message="This field is required" value="{{UserAccount.user.email}}">
                      </div>
                    </div>



                      <div class="row">
                       <div class="col-6 text-right">
                          <input class="btn btn-info mb-5" type="submit" value="Submit"/>
                       </div>
                       <div class="col-6 text-left">
                           <a class="btn btn-info mb-5" href="/users">Cancel</a>
                       </div>
                    </div>

                  </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</section>

{% endblock content %}
