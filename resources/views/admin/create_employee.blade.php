@extends('admin/home')

@section('content')
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Employee Registration</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Create Employee Profile</li>
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
                      <form method="POST" action= "#">
                        {{ csrf_token() }}

                        <div class="row">
                            <div class="form-group">
                                <div class="controls">
                                    <input type="hidden" class="form-control" name="id" value="{{$employee->id}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <h5>Firstname<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" class="form-control" name="name" required data-validation-required-message="This field is required" >
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Surname<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" class="form-control" name="surname" required data-validation-required-message="This field is required" >
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>National ID Number<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" class="form-control" name="idnumber" required data-validation-required-message="This field is required" >
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group">
                                <h5>Employee Number<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" class="form-control" name="employee_number" required data-validation-required-message="This field is required" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="wphoneNumber2">Phone Number : <span class="danger">*</span>  </label>
                                <input type="tel" class="form-control required" id="wphoneNumber2" name="phonenumber" maxlength="10">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <h5>Email Address<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" class="form-control" name="email" required data-validation-required-message="This field is required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="addressline1">Address Line : <span class="danger">*</span>  </label>
                                <input type="text" class="form-control required" id="addressline1" name="addressline1" maxlength="25"> </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City/Town : <span class="danger">*</span> </label>
                                    <select class="custom-select form-control required" id="city" name="city">
                                    <option value="">Please select City/Town</option>
                                    @foreach ($all_cities as $city)
                                        <option value="{{$city->city_id}}">{{$city->city}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postal-code">Postal Code : <span class="danger">*</span> </label>
                                    <input type="text" class="form-control" id="postal-code" name="postal-code" maxlength="4">
                                </div>
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

@endsection
