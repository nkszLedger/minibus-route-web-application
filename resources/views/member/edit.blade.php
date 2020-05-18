@extends('member.home')

@section('content')

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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="idnumber"> ID Number : <span class="danger">*</span> </label>
                                        <input type="text" class="form-control required" readonly id="idnumber" value="{{$member_record->id_number}}" name="idnumber"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="licensenumber">Driver's License Number : <span class="danger">*</span> </label>
                                        <input type="text" class="form-control required" readonly id="licensenumber" value="{{$member_record->license_number}}" name="licensenumber"> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wemailAddress2"> Email Address :</label>
                                        <input type="email" class="form-control" readonly id="emailAddress" value="{{$member_record->email}}" name="emailAddress"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wphoneNumber2">Phone Number : <span class="danger">*</span>  </label>
                                        <input type="tel" class="form-control required" readonly id="phonenumber" value="{{$member_record->phone_number}}" name="phonenumber"> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="addressline1">Address Line : <span class="danger">*</span>  </label>
                                        <input type="text" class="form-control required" readonly id="addressline1" value="{{$member_record->address_line}}" name="addressline1"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City/Town : <span class="danger">*</span> </label>
                                        <select class="custom-select form-control" id="city" disabled name="city">
                                            @foreach ($all_cities as $city)
                                                @if( $city->city_id === $member_record['city']['city_id'] )
                                                    <option selected value="{{$member_record['city']['city_id']}}">{{$city->city}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="membership-type"> Select Membership : <span class="danger">*</span> </label>
                                        <select class="custom-select form-control" id="membership-type" disabled name="membership-type">									
                                            @foreach ($all_membership_types as $membership_type)
                                                @if($membership_type->id === $member_record['membership_type']['id'])
                                                    <option selected value="{{$membership_type->id}}">{{$membership_type->membership_type}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
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
                        <hr>
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
                            </div>
                        </section>
                        <hr>
                        <h4>Association and Routes</h4>
                        <hr>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
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
                                    <a href="{{ url('members.show', $member_record->id )}}" type="submit" id="cancel_button" class="btn btn-warning ">Cancel </a>
                                    <a href="{{ url('members.update', $member_record->id )}}" type="submit" id="edit_button" class="btn btn-primary float-right">Edit </a>
                                </div>
                            </div>
                        </section>

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@endsection