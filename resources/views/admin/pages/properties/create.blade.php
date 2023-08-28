@extends('admin.components.layout')
<style>
  .hide{
    display: none;
  }
.phide{
  display: none;
}
#hide{
  display: none;
}
</style>

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0">Dashboard</h1> --}}
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Properties</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="alert alert-success alert-block hide">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong class="message"></strong>
        </div>
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{$selected['property_type'] > 0 ? 'Edit Properties':'Add Properties' }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="form" data-action="{{ url('properties/create')}}">
              @csrf
              <div class="card-body" id="accordion">

                <div class="card card-secondary">
                  <div class="card-header">
                    <h6 class="card-title w-100"> 
                      <a class="d-block w-100" data-toggle="collapse" href="#collapseZero">
                        Sell or rent your property
                      </a>
                    </h6>
                  </div>
                  <div id="collapseZero" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                         <input type="hidden" class="form-control" value="{{ $selected['id'] }}" name="id">
                            <label for="exampleInputPassword1">I'm looking to</label>
                            <select id="property_type"   name="property_type" class="form-control "> 
                              <option  value="">Select</option>
                              <option  {{ $selected['property_type'] == 'sell' ? 'selected' : '' }} value="sell">Sell</option>
                              <option  {{ $selected['property_type'] == 'Rent/Lease' ? 'selected' : '' }} value="rent/lease">Rent/Lease</option>
                              <option  {{ $selected['property_type'] == 'rent' ? 'selected' : '' }} value="rent">Rent</option>
                              <option  {{ $selected['property_type'] == 'pg' ? 'selected' : '' }} class="pg" value="pg">PG</option>
                            </select>
                          </div>
                        </div>  
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="exampleInputPassword1">What kind of property do you have?</label><br>
                            <input type="radio" name="property_cat" class="change-type residential" value="1" {{ $selected['property_cat'] == 2 ? 'unchecked' : '' }} checked >
                            <label for="exampleInputPassword1">Residential</label>

                            <input type="radio" name="property_cat" class="change-type commercial" value="2" {{ $selected['property_cat'] == 2 ? 'checked' : '' }} style="margin-left: 40px;"  placeholder="Enter Name">
                            <label for="exampleInputPassword1" class="commercial">Commercial</label>
                          </div>
                          
                        <div class="col-md-12">
                          <div class="form-group">
                          <select id="properties_type" required name="properties_type" class="form-control properties_type"> 
                            <option value="">Select</option>
                            @if ($selected['property_cat'] == 2){
                              @foreach ($commercial as $key => $value)
                                <option {{ $selected['properties_type'] == $value['name'] ? 'selected' : '' }} value="{{ $value['name'] }}">{{ $value['name'] }}</option>';
                            @endforeach
                            }@else{
                              @foreach ($residential as $key => $value)
                                <option {{ $selected['properties_type'] == $value['name'] ? 'selected' : '' }} value="{{ $value['name'] }}">{{ $value['name'] }}</option>';
                            @endforeach
                            } @endif
                          </select>
                          </div>
                        </div>
                        </div>

                        <div class="col-md-12" >
                          <div class="form-group hide" id="comtype">
                          <label for="">What kind of ?</label>
                          <select id="property_type" name="what_kind" class="form-control "> 
                            <option>Select</option>
                            <option {{ $selected['what_kind'] == 1 ? 'selected' : '' }} value="1">1</option>
                            <option {{ $selected['what_kind'] == 2 ? 'selected' : '' }} value="2">2</option>
                            <option {{ $selected['what_kind'] == 3 ? 'selected' : '' }} value="3">3</option>
                          </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card card-secondary">
                  <div class="card-header plocated hide">
                    <h6 class="card-title w-100 "> 
                      <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                        Where is your property located?
                      </a>
                    </h6>
                  </div>
                  <div id="collapseOne"  id="" class="collapse show  plocated {{ $selected['property_cat'] > 0 ? 'show' : 'hide'}}" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">City</label>
                            <input type="text" required class="form-control" value="{{ $selected['Located_inside'] }}" name="city" placeholder="Enter Your City name">
                          </div>
                        </div>
                        @if ($selected['property_cat'] == 2)
                          @php
                          $hide = 'show';
                          @endphp
                        @else
                          @php
                          $hide = 'phide';
                          @endphp
                        @endif

                        <div class="col-md-4">
                          <div class="form-group commercialtype {{$hide}}">
                            <label for="exampleInputPassword1">Apartment/society</label>
                            <input type="eamil" class="form-control" value="{{ $selected['apartment_society'] }}" name="apartment_society" placeholder="Enter your Apartment/society Name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          @php
                          $located =[
                            'it_Park' => 'It Park',
                            'business_Park' => 'Business Park',
                            'Other' => 'Other',
                          ]
                              
                          @endphp

                          <div class="form-group commercialtype {{$hide}}">
                            <label for="exampleInputPassword1">Located inside</label>
                            <select id="property_type" name="Located_inside" class="form-control"> 
                              <option value="">Select</option> 
                              @foreach ($located as $li_key=> $li)
                                <option {{ $selected['Located_inside'] == $li_key ? 'selected' : '' }} value="{{ $li_key }}">{{ $li }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Locality</label>
                            <input type="text" required class="form-control" value="{{ $selected['locality'] }}" name="locality" placeholder="Enter Locality">
                          </div>
                        </div>
                        <div class="col-md-4 commercial">
                          <div class="form-group commercialtype {{$hide}}">
                            <label for="exampleInputPassword1">Project(Optional)</label>
                            <input type="text" class="form-control" value="{{ $selected['project'] }}" name="project" placeholder="Project">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group commercialtype {{$hide}}">
                            <label for="exampleInputPassword1">Sub-Locality(Optional)</label>
                            <input type="text" class="form-control" value="{{ $selected['sub_locality'] }}" name="sub_locality" placeholder="Sub-Locality">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">House No(Optional)</label>
                            <input type="number" class="form-control" value="{{ $selected['house_no'] }}"  name="house_no" placeholder="House No">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group commercialtype {{$hide}}">
                            <label for="exampleInputPassword1">Address(Optional)</label>
                            <input type="text" class="form-control" value="{{ $selected['address'] }}"  name="address" placeholder="Address">
                          </div>
                        </div>
                        @php
                        $zone_types = [
                          'industrial' => 'Industrial',
                          'commercial' => 'commercial',
                          'public_utilities' => 'Public Utilities',
                          'residential' =>'Residential',
                          'transport_and_communication' =>'Transport and Communication',
                          'public_utilities' =>'Public Utilities',
                          'public_and_semi_public_use' =>'Public and Semi Public Use',
                          'open_spaces' => 'Open Spaces',
                          'agriculture_zone' =>'Agriculture Zone',
                          'special_economic_zone' =>'Special Economic Zone',
                          'natural_conservation_zone' =>'Natural Conservation Zone',
                          'government_use' =>'Government Use',
                          'other' =>'Other',
                        ];
                        @endphp

                        <div class="col-md-4">
                          <div class="form-group commercialtype {{$hide}}">
                            <label for="exampleInputPassword1">Zone Type</label>
                            <select id="property_type" name="zone_type" class="form-control ">
                              <option value="">Select</option> 
                              @foreach ($zone_types as $z_key=> $z)
                                <option {{ $selected['zone_type'] == $z_key ? 'selected' : '' }} value="{{ $z_key }}">{{ $z }}</option>
                              @endforeach
                            </select> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- About Proper ties --}}
                <div class="card card-secondary">
                  <div class="card-header us_property ">
                    <h6 class="card-title w-100">
                      <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                        Tell us about your property
                      </a>
                    </h6>
                  </div>
                  @php
                        $your_apartment = [
                          '2_BHK' => '2_BHK',
                          '3_BHK' => '3_BHK',
                          '4_BHK' => '4_BHK ',
                          'other' =>'Other',
                        ];
                        @endphp

                  <div id="collapseTwo" class="collapse show" data-parent="#accordion">
                    <div class="card-body us_property ">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Your apartment is a</label>
                            <select class="form-control" required name="your_apartment">
                              <option value="">select</option>
                              @foreach ($your_apartment as $y_key=> $y)
                              <option {{ $selected['your_apartment'] == $y_key ? 'selected' : '' }} value="{{ $z_key }}">{{ $y }}</option>
                            @endforeach
                            </select>
                            <div class="card card-secondary mt-3">
                              <div class="card-header us_property ">
                                <h6>Add Room Dttails</h6>
                              </div>

                              @php
                              $bedrooms = [
                                '1' =>'1',
                                '2' =>'2',
                                '3' =>'3 ',
                                '4' =>'4',
                              ];
                              @endphp

                              <div class="card-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">No. of Bedrooms</label>
                                      <select class="form-control" required name="no_of_bedrooms">
                                        <option value="">select</option>
                                        @foreach ($bedrooms as $b_key=> $b)
                                        <option {{ $selected['no_of_bedrooms'] == $b_key ? 'selected' : '' }} value="{{ $b_key }}">{{ $b }}</option>
                                      @endforeach
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    @php
                                      $Bathrooms = [
                                        '1' =>'1',
                                        '2' =>'2',
                                        '3' =>'3 ',
                                        '4' =>'4',
                                      ];
                                      @endphp
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">No. of Bathrooms</label>
                                      <select class="form-control" required name="no_of_bathrooms">
                                        <option value="">0</option>
                                        @foreach ($Bathrooms as $b_key=> $b)
                                        <option {{ $selected['no_of_bathrooms'] == $b_key ? 'selected' : '' }} value="{{ $b_key }}">{{ $b }}</option>
                                      @endforeach
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    @php
                                    $balconie = [
                                      '1' =>'1',
                                      '2' =>'2',
                                      '3' =>'3 ',
                                      '4' =>'4',
                                    ];
                                    @endphp
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Balconies</label>
                                      <select class="form-control" required name="balconie">
                                        <option value="">0</option>
                                        @foreach ($balconie as $bl_key=> $bl)
                                        <option {{ $selected['balconie'] == $bl_key ? 'selected' : '' }} value="{{ $bl_key }}">{{ $bl }}</option>
                                      @endforeach
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card card-secondary mt-3">
                            <div class="card-header us_property ">
                              <h6>Add Area Details(?)</h6>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Atleast one area type is mandatory</label>
                                    <input type="number" class="form-control" value="{{ $selected['carpet_area'] }}" name="carpet_area" placeholder="Carpet Area">
                                  </div>
                                  <div class="form-group">
                                    <input type="number" class="form-control" value="{{ $selected['built_area'] }}" name="built_area" placeholder="Built-up Area">
                                  </div>
                                  <div class="form-group">
                                    <input type="number" class="form-control" value="{{ $selected['super_area'] }}" name="super_area" placeholder="Super Built-up Area">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Property Dimensions(Optional)</label>
                                    <input type="number" class="form-control"  value="{{ $selected['length'] }}"  name="length" placeholder="Length ofplot(in Ft.)">
                                  </div>
                                  <div class="form-group">
                                    <input type="number" class="form-control" value="{{ $selected['breadth'] }}" name="breadth" placeholder="Breadth ofplot(in Ft.)">
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    @php
                                    $other_rooms = [
                                       'pooja_room' =>'Pooja Room',
                                       'study_room' =>'Study Room',
                                       'servant_room' =>'Servant Room',
                                       'store_room' =>'Store Room',
                                    ];
                                    @endphp
                                    <label for="exampleInputPassword1">Other Room(Optional)</label>
                                    <div class="select2-primary">
                                     <input type="hidden" name="other_room" class="other_room" value="">
                                      <select class="select2 other_rooms"  name="other_rooms" multiple="multiple" data-placeholder="Select Other room" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                        <option value="">Select</option>
                                        
                                        <option value="">0</option>
                                        @foreach ($other_rooms as $r_key=> $r)
                                        <option {{ $selected['other_rooms'] == $r_key ? 'selected' : '' }} value="{{ $r_key }}">{{ $r }}</option>
                                      @endforeach
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    @php
                                    $Furnishing = [
                                       'furnished' =>'Furnished',
                                       'semi_furnished' =>'Study Room',
                                       'servant_room' =>'Semi-furnished',
                                       'un_furnished' =>'Un-furnished',
                                    ];
                                    @endphp
                                    <label for="exampleInputPassword1">Furnishing(Optional)</label>
                                    <select class="form-control" name="furnishing">
                                      <option value="">Select</option>
                                      @foreach ($Furnishing as $f_key=> $f)
                                        <option {{ $selected['furnishing'] == $f_key ? 'selected' : '' }} value="{{ $f_key }}">{{ $f }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Reserved Parking(Optional)</label>
                                    <select class="form-control" name="reserve_parking">
                                      <option value="">Select</option>
                                      <option {{ $selected['reserve_parking'] == 'covered_parking' ? 'selected' : '' }} value="covered_parking">Covered parking</option>
                                      <option {{ $selected['reserve_parking'] == 'open_parking' ? 'selected' : '' }} value="open_parking">open parking</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    @php
                                    $floor_details = [
                                       'basement' =>'Basement',
                                       'lower_ground' =>'Lower ground',
                                       'ground' =>'Ground',
                                    ];
                                    @endphp
                                    <label for="exampleInputPassword1">Floor Details</label>
                                    <h6>Total no of floor details</h6>
                                    <input type="number" name="floor_details" value="{{ $selected['floor_details'] }}" class="form-control" required placeholder="Total Floor" >
                                    <select class="form-control mt-3" name="floor_details_type">
                                      @foreach ($floor_details as $fd_key=> $fd)
                                      <option {{ $selected['floor_details_type'] == $fd_key ? 'selected' : '' }} value="{{ $fd_key }}">{{ $fd }}</option>
                                    @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Floors Allowed For Construction</label>
                                    <input type="number" class="form-control" value="{{ $selected['floors_allowed']}}" name="floors_allowed" placeholder="No. of floors">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Is there a boundary wall around the property?</label>
                                    <select class="form-control" name="boundary">
                                      <option value="">Select</option>
                                      <option {{ $selected['boundary'] == 'yes' ? 'selected' : '' }} value="yes">Yes</option>
                                      <option {{ $selected['boundary'] == 'no' ? 'selected' : '' }} value="no">No</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    @php
                                    $open_sides = [
                                       '1' =>'1',
                                       '2' =>'2',
                                       '3' =>'3',
                                    ];
                                    @endphp
                                    <label for="exampleInputPassword1">No. of open sides?</label>
                                    <select class="form-control" name="open_sides">
                                      <option value="">Select</option>
                                      @foreach ($open_sides as $os_key=> $os)
                                      <option {{ $selected['open_sides'] == $os_key ? 'selected' : '' }} value="{{ $os_key }}">{{ $os }}</option>
                                    @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Any construction done on this property?</label>
                                    <select class="form-control" name="any_construction">
                                      <option>Select</option>
                                      <option {{ $selected['any_construction'] == 'yes' ? 'selected' : '' }} value="yes">Yes</option>
                                      <option {{ $selected['any_construction'] == 'no' ? 'selected' : '' }} value="no">No</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label for="exampleInputPassword1">Availability Status</label>
                                    <select class="form-control availability" name="availability_status">
                                      <option value="">Select</option>
                                      <option {{ $selected['availability_status'] == 'ready_to_move' ? 'selected' : '' }} value="Ready to move">Ready to move</option>
                                      <option {{ $selected['availability_status'] == 'under_construction' ? 'selected' : '' }} value="under_construction">under construction</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  @php
                                  $age_of_property = [
                                     '0-1' =>'0-1 years',
                                     '1-5' =>'1-5 years',
                                     '5-10' =>'5-10 years',
                                     '10+' =>'10+ years',
                                  ];
                                  @endphp
                                  <div class="form-group Age hide ">
                                    <label for="exampleInputPassword1">Age of property</label>
                                    <select class="form-control" name="age_of_property">
                                      <option value="">Select</option>
                                      @foreach ($age_of_property as $ap_key=> $ap)
                                      <option {{ $selected['age_of_property'] == $ap_key ? 'selected' : '' }} value="{{ $ap_key }}">{{ $ap }}</option>
                                    @endforeach
                                    </select>
                                  </div>

                                  <div class="form-group Possession hide ">
                                    @php
                                    $possession = [
                                       'within_3_months' =>'Within 3 Months',
                                       'within_6_months' =>'Within 6 Month',
                                       'by_2024' =>'By 2024',
                                       'by_2025' =>'By 2025',
                                    ];
                                    @endphp
                                    <label for="exampleInputPassword1">Possession By</label>
                                    <select class="form-control" name="possession">
                                      @foreach ($possession as $pn_key=> $pn)
                                      <option {{ $selected['possession'] == $pn_key ? 'selected' : '' }} value="{{ $pn_key }}">{{ $pn }}</option>
                                    @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Available from</label>
                                    <input type="date" class="form-control" value="{{ $selected['available_date'] }}" name="available_date" placeholder="Enter Name">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    @php
                                    $willing = [
                                       'family' =>'Family',
                                       'single_men' =>'Single men',
                                       'single_women' =>'Single women',
                                    ];
                                    @endphp
                                    <label for="exampleInputPassword1">Willing to rent out to</label>
                                    <select class="form-control" name="Willing">
                                      <option value="">Select</option>
                                      @foreach ($willing as $w_key=> $w)
                                      <option {{ $selected['Willing'] == $w_key ? 'selected' : '' }} value="{{ $w_key }}">{{ $w }}</option>
                                    @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Are you ok with brokers contacting you?</label>
                                    <select class="form-control" name="brokers_contacting">
                                      <option>Select</option>
                                      <option {{ $selected['brokers_contacting'] == 'yes' ? 'selected' : '' }} value="yes">Yes</option>
                                      <option {{ $selected['brokers_contacting'] == 'no' ? 'selected' : '' }} value="no">No</option>
                                    </select>
                                  </div>
                                </div>
                                {{-- pg --}}
                                <div class="col-md-6">
                                  <div class="form-group">
                                    @php
                                    $avaiable_type = [
                                       'girl' =>'Girl',
                                       'boy' =>'Boy',
                                       'any' =>'Any',
                                    ];
                                    @endphp
                                    <label for="exampleInputPassword1">Avaiable for</label>
                                    <select class="form-control" name="avaiable_type">
                                      <option value="">Select</option>
                                      @foreach ($avaiable_type as $avail_key=> $avial)
                                      <option {{ $selected['avaiable_type'] == $avail_key ? 'selected' : '' }} value="{{ $avail_key }}">{{ $avial }}</option>
                                    @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Suitable for</label>
                                    <div class="form-check">
                                      <input type="checkbox" class="form-check-input" {{ $selected['suitable'] == 'student' ? 'checked' : '' }} value="student" name="suitable" >
                                      <label class="form-check-label" for="exampleInputPassword1">Students</label> <br>
                                      
                                      <input type="checkbox" class="form-check-input" {{ $selected['suitable'] == 'Working' ? 'checked' : '' }} name="suitable" value="Working">
                                      <label class="form-check-label" for="exampleInputPassword1">Working Professionals</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- For Photos --}}
                <div class="card card-secondary">
                  <div class="card-header">
                    <h6 class="card-title w-100">
                      <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                        Add photos of your property(Optional)
                      </a>
                    </h6>
                  </div>
                  <div id="collapseThree" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                      <h6>A picture is worth a thousand word.87% of buyer lookat photos before buying</h6>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Upload from desktop</label>
                        <input type="hidden" value="{{ $selected['existing_image'] }}" name="existing_image">
                        <input type="file" class="form-control" name="property_image" placeholder="Built-up Area">
                        {{-- <img src="{{url('/')}}/uploads/admin/{{$selected->property_image}}" width="100px" height="60px" alt=""> --}}
                      </div>
                    </div>
                  </div>
                </div>
                {{-- For price --}}
                <div class="card card-secondary">
                  <div class="card-header">
                    <h6 class="card-title w-100">
                      <a class="d-block w-100" data-toggle="collapse" href="#collapsefour">
                        Add Pricing And Details
                      </a>
                    </h6>
                  </div>
                  <div id="collapsefour" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            @php
                              $ownership = [
                                  'freehold' =>'Freehold',
                                  'leasehold' =>'Leasehold',
                                  'co-operative_society' =>'Co-operative Society',
                                  'operative_society' =>'Power Of attorney',
                              ];
                              @endphp
                            <label for="exampleInputPassword1">Ownership(?)</label>
                            <select class="form-control" name="ownership">
                              <option value="">Select</option>
                                    @foreach ($ownership as $own_key=> $own)
                                    <option {{ $selected['ownership'] == $own_key ? 'selected' : '' }} value="{{ $own_key }}">{{ $own }}</option>
                                  @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Price Details</label>
                            <input type="number" value="{{ $selected['excepted_price']}}" class="form-control" name="excepted_price" placeholder="₹ Excepted Price">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group mt-4">
                            <label for="exampleInputPassword1"></label>
                            <input type="number" value="{{ $selected['persft_price']}}" class="form-control" name="persft_price" placeholder="₹ Price per Sq .ft">

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" value="inclusive price" name="price_tax" id="is_parent">
                              <label class="form-check-label" for="exampleCheck1">All inclusive price ?</label>
                              <br/>
                              <input type="checkbox" class="form-check-input" value="tax and govt charges" name="price_tax" id="is_parent">
                              <label class="form-check-label" for="exampleCheck1">Tax and Govt. charges excluded</label>
                              <br/>
                              <input type="checkbox" class="form-check-input" value="price negotiable" name="price_tax" id="is_parent">
                              <label class="form-check-label" for="exampleCheck1">Price Negotiable</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Additoinal price details(Optional)</label>
                            <input type="number" value="{{ $selected['additoinal_price']}}" class="form-control"  name="additoinal_price" placeholder="Maintenance">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            @php
                            $additoinal_price_type = [
                                  'monthly' =>'Monthly',
                                  'annual' =>'Annual',
                                  'one_time' =>'One time',
                                  'per_unity/Monthly' =>'Per Unity/Monthly',
                              ];
                              @endphp
                            <label for="exampleInputPassword1"></label>
                            <select class="form-control mt-4" name="additoinal_price_type">   
                              <option value="">select</option>
                              @foreach ($additoinal_price_type as $ap_key=> $apt)
                                    <option {{ $selected['additoinal_price_type'] == $ap_key ? 'selected' : '' }} value="{{ $ap_key }}">{{ $apt }}</option>
                                  @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">  
                            <input type="number" value="{{  $selected['booking']}}" class="form-control"  name="booking" placeholder="Booking Amount">
                            <input type="number"  value="{{  $selected['width']}}" class="form-control mt-3"  name="width" placeholder="Enter the width">
                          </div>
                        </div>
                    </div>

                      <div class="col-md-6">
                        <div class="form-group lease_ty hide">
                          <label for="exampleInputPassword1">It is Pre-leased/Pre-Rented Details(?)</label>
                          <select class="form-control pre-list" name="lease_type"> 
                            <option value="">select</option>
                            <option {{ $selected['lease_type'] == 'yes' ? 'selected' : '' }} value="yes">Yes</option>
                            <option {{ $selected['lease_type'] == 'no' ? 'selected' : '' }} value="no">No</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group leasedetals hide">
                          <label for="exampleInputPassword1">Pre-leased/Pre-Rented Details(?)</label>
                          <input type="number" value="{{$selected['rent_month']}}" class="form-control"  name="rent_month" placeholder="₹ Current rent per month"><br/>
                          <input type="number" value="{{$selected['lease_year']}}" class="form-control"  name="lease_year" placeholder="Lease tenure in years">
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>

                <div class="card card-secondary">
                  <div class="card-header">
                    <h6 class="card-title w-100">
                      <a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
                        What makes your property unique
                      </a>
                    </h6>
                  </div>
                  <div id="collapseFive" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <p>Adding description will increase your listing visibility</p>
                            <textarea name="textarea" id="textarea"rows="10" class="form-control">{{$selected['textarea']}}</textarea>
                            <p>Minimum 30 Charater required</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card card-secondary">
                  <div class="card-header">
                    <h6 class="card-title w-100">
                      <a class="d-block w-1005" data-toggle="collapse" href="#collapseSix">
                        Add aminities/unique features
                      </a>
                    </h6>
                  </div>
                  <div id="collapseSix" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            @php
                            $amenities = [
                                  'park' =>'Park',
                                  'maintanance_staff' =>'Maintanance Staff',
                                  'water_storage' =>'Water Storage',
                                  'security/fire_alarm' =>'Security/Fire Alarm',
                                  'visitor_parking' =>'Visitor Parking',
                                  'feng_shui/vaastu_compliant' =>'Feng shui/Vaastu Compliant',
                                  'intercom_facility' =>'Intercom Facility',
                                  'lift' =>'Lift(s)',
                              ];
                              @endphp
                            <label for="exampleInputPassword1">Aminities</label>
                            <div class="select2-primary">
                              <input type="hidden" name="amenitie" class="amenitie" value="">
                              <select class="select2 form-control amenities" name="amenities" multiple="multiple" data-placeholder="Select Other Amenities" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                <option value="">Select</option>
                                @foreach ($amenities as $ami_key=> $ami)
                                    <option {{ $selected['amenities'] == $ami_key ? 'selected' : '' }} value="{{ $ami_key }}">{{ $ami }}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            @php
                            $propert_feature = [
                              'internet/wi-fi_connectivity'=>'Internet/Wi-fi connectivity',
                                'high_ceiling_hight'=>'High Ceiling Hight',
                                'false_ceiling_lighting'=>'false Ceiling Lighting',
                                'piped-gas'=>'Piped-gas',
                                'central_air_conditoned'=>'Central Air Conditoned',
                                'water_purifier'=>'Water Purifier',
                                'recently_renoveted'=>'Recently Renoveted',
                                'private_garden/terrace'=>'Private Garden/Terrace',
                                'natural_light'=>'Natural Light',
                                'airy_rooms'=>'Airy Rooms',
                                'spacious_interiors'=>'Spacious interiors',
                              ];
                              @endphp
                            <label for="exampleInputPassword1">Property Features</label>
                            <div class="select2-primary">
                              <input type="hidden" name="propert_features" class="propert_features" value="">
                              <select class="select2 property-feature"  name="propert_feature" multiple data-placeholder="Select Other room" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                <option value="">Select</option>
                                @foreach ($propert_feature as $prof_key=> $prof)
                                    <option {{ $selected['propert_features'] == $prof_key ? 'selected' : '' }} value="{{ $prof_key }}">{{ $prof }}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            @php
                            $society_buildings = [
                              'water_softening_plant'=>'Water Softening plant',
                                'shopping_center'=>'Shopping Center',
                                'fitness_center/GYM'=>'Fitness Center/GYM',
                                'Swimming_pool'=>'Swimming Pool',
                                'clube_house/Comunity_center'=>'Clube house/Comunity Center',
                                'security_personel'=>'Security Personel',
                              ];
                              @endphp
                            <label for="exampleInputPassword1">Socity/Building Features</label>
                            <div class="select2-primary">
                              <input type="hidden" name="society_building" class="society_building" value="">
                              <select class="select2 building-features society_buildings" name="society_buildings" multiple="multiple" data-placeholder="Select Other room" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                <option value="">Select</option>
                                @foreach ($society_buildings as $sbl_key=> $sbl)
                                    <option {{ $selected['society_building'] == $sbl_key ? 'selected' : '' }} value="{{ $sbl_key }}">{{ $sbl }}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            @php
                            $additional_feature = [
                                'Separate_entry_For_servant_room'=>'Separate entry For servant room ',
                                'waste_disposal'=>'Waste Disposal',
                                'no_open_drainage_aroung'=>'No open drainage aroung',
                                'rain_water_harvesting'=>'Rain Water Harvesting',
                                'bank_attached_property'=>'Bank attached Property',
                                'Low Density Socity'=>'Low Density Socity',
                              ];
                              @endphp
                            <label for="exampleInputPassword1">Adintional Features</label>
                            <div class="select2-primary">
                              <input type="hidden" name="additional_feature" class="additional_feature" value="">
                              <select class="select2 additional_features" name="additional_features" multiple="multiple" data-placeholder="Select Other room" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                <option value="">Select</option>
                                @foreach ($additional_feature as $addf_key=> $addf)
                                    <option {{ $selected['additional_feature'] == $addf_key ? 'selected' : '' }} value="{{ $addf_key }}">{{ $addf }}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            @php
                            $water_source = [
                              'munsipal_corporation'=>'Munsipal Corporation',
                              'borewell/tank'=>'Borewell/Tank',
                              '24*7Water'=>'24*7Water',
                              ];
                              @endphp
                            <label for="exampleInputPassword1">Water Source</label>
                            <div class="select2-primary">
                              <input type="hidden" name="water_source" class="water_source" value="">
                              <select class="select2 water_sources" name="water_sources" multiple="multiple" data-placeholder="Select Other Amenities" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                <option value="">Select</option>
                                @foreach ($water_source as $wss_key=> $wss)
                                    <option {{ $selected['water_source'] == $wss_key ? 'selected' : '' }} value="{{ $wss_key }}">{{ $wss }}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            @php
                            $overlooking = [
                              'pool'=>'pool',
                              'park/garden'=>'Park/Garden',
                              'clube'=>'Clube',
                              'main_road'=>'Main Road',
                              'other'=>'Other',
                              ];
                              @endphp
                            <label for="exampleInputPassword1">Overloking </label>
                            <div class="select2-primary">
                              <input type="hidden" name="overlooking" class="overlooking" value="">
                              <select class="select2 overlookings" name="overlookings" multiple="multiple" data-placeholder="Select Other Amenities" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                <option value=" ">Select</option>
                                @foreach ($overlooking as $over_key=> $over)
                                    <option {{ $selected['overlooking'] == $over_key ? 'selected' : '' }} value="{{ $over_key }}">{{ $over }}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Other Features</label>
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" value="gated_society" name="other_features" id="is_parent">
                              <label class="form-check-label" for="exampleCheck1">In a gated society</label>
                              <br/>
                              <input type="checkbox" class="form-check-input" value="corner_property" name="other_features" id="is_parent">
                              <label class="form-check-label" for="exampleCheck1">Corner Property</label>
                              <br/>
                              <input type="checkbox" class="form-check-input" value="pet_friendy" name="other_features" id="is_parent">
                              <label class="form-check-label" for="exampleCheck1">Pet Friendy</label>
                              <br/>
                              <input type="checkbox" class="form-check-input" value="wheelchair_friendy" name="other_features" id="is_parent">
                              <label class="form-check-label" for="exampleCheck1">Wheelchair Friendy</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            @php
                            $power_back_up = [
                                  'none' =>'None',
                                  'partial' =>'Partial',
                                  'full' =>'Full',
                              ];
                              @endphp
                            <label for="exampleInputPassword1">Power Back Up </label>
                            <select class="form-control" name="power_back_up">
                              <option value="">Select</option>
                              @foreach ($power_back_up as $power_key=> $power)
                                    <option {{ $selected['power_back_up'] == $power_key ? 'selected' : '' }} value="{{ $power_key }}">{{ $power }}</option>
                                  @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            @php
                            $property_facing = [
                              'north'=>'North',
                              'south'=>'South',
                              'south'=>'East',
                              'west'=>'West',
                              'north-east<'=>'North-East',
                              'north-west'=>'North-West',
                              'south-eas'=>'South-East',
                              'south-west'=>'South-West',
                              ];
                              @endphp
                            <label for="exampleInputPassword1">Property Faching </label>
                            <select class="form-control" name="property_facing">
                              <option value="">Select</option>
                              @foreach ($property_facing as $prof_key=> $prof)
                              <option {{ $selected['property_facing'] == $prof_key ? 'selected' : '' }} value="{{ $prof_key }}">{{ $prof }}</option>
                            @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            @php
                            $type_of_flooring = [
                              'marbel' =>'Marbel',
                              'concrete' =>'Concrete',
                              'polished Concrete' =>'Polished Concrete ',
                              'granite' =>'Granite',
                              'ceramic' =>'Ceramic',
                              'mosaic' =>'Mosaic',
                              'cement' =>'Cement',
                              'stone' =>'Stone',
                              'vinly' =>'Vinly',
                              'wood' =>'Wood',
                              'vitrified' =>'Vitrified',
                              'spartex' =>'Spartex',
                              'iPSFinish' =>'IPSFinish',
                              'other' =>'Other',
                              ];
                              @endphp
                            <label for="exampleInputPassword1">Type of flooring </label>
                            <select class="form-control" name="type_of_flooring">
                              <option value="">Select</option>
                              @foreach ($type_of_flooring as $flooring_key=> $flor)
                              <option {{ $selected['type_of_flooring'] == $flooring_key ? 'selected' : '' }} value="{{ $flooring_key }}">{{ $flor }}</option>
                            @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-md-10">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Width of faching road</label>
                            <input type="number" value="{{  $selected['Width_of_faching'] }}" class="form-control"  name="Width_of_faching" placeholder="Enter the width">
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                          <label for="exampleInputPassword1"></label>
                            <select class="form-control mt-4" name="faching_type" > 
                              <option value="">Select</option>
                              <option {{ $selected['faching_type'] == 'feet' ? 'selected' : '' }} value="feet">Feet</option>
                              <option {{ $selected['faching_type'] == 'meter' ? 'selected' : '' }} value="meter">Meter</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            @php
                            $location = [
                                'close_to_metro_statio' =>'Close to Metro station',
                                'close_to_school' =>'Close to school',
                                'close_to_hospital' =>'Close to Hospital',
                                'Close_to_market' =>'Close to Market',
                                'Close_to_railway_station' =>'Close to Railway Station',
                                'Close_to_airport' =>'Close to Airport',
                                'Close_to_mall' =>'Close to Mall',
                                'Close_to_highway' =>'Close to Highway',
                              ];
                              @endphp
                            <label for="exampleInputPassword1">Location Advantage</label>
                            <p>Highlight the nearby landmarks*</p>
                            <div class="select2-primary">
                              <input type="hidden" name="location" class="location" value="">
                              <select class="select2 locations" name="locations" multiple="multiple" data-placeholder="Select Other Amenities" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                <option value="">Select</option>
                                @foreach ($location as $location_key=> $location)
                              <option {{ $selected['location'] == $location_key ? 'selected' : '' }} value="{{ $location_key }}">{{ $location }}</option>
                            @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
      
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Suggest a Property Feature</label>
                            <p>That you want us to add in the form</p>
                          <input type="text" class="form-control" value="{{  $selected['property_suggest'] }}" name="property_suggest" placeholder="Enter your USP's here">
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">submit</button>
                </div>
              </div>
              <!-- /.card-body -->  
            </form>
          </div>
          <!-- /.card -->
        </div>
       
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection
<script src="{{ url('/') }}/admin/plugins/jquery/jquery.min.js"></script>
<script src="{{ url('/') }}/admin/js/add-properties.js"></script>
