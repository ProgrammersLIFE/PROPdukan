@extends('admin.components.layout')
<style>
  .hide{
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
              <h3 class="card-title">Add Properties</h3>
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
                            <label for="exampleInputPassword1">I'm looking to</label>
                            <select id="property_type" name="property_type" class="form-control "> 
                              <option>Select</option>
                              <option value="sell">Sell</option>
                              <option value="rent">Rent/Lease</option>
                              <option class="pg" value="pg">PG</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="exampleInputPassword1">What kind of property do you have?</label><br>
                            <input type="radio" name="residential" value="residential" checked placeholder="Enter Name">
                            <label for="exampleInputPassword1">Residential</label>

                            <input type="radio" name="residential" class="commertial" style="margin-left: 40px;" value="commercial" placeholder="Enter Name">
                            <label for="exampleInputPassword1" class="commertial">Commercial</label>
                          </div>
                        <div class="col-md-12">
                          <select id="property_type" name="property_type" class="form-control "> 
                            <option>Select</option>
                            <option value="">Flate</option>
                            <option value="">Famhouse</option>
                            <option value="">Plot/Land</option>
                          </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card card-secondary">
                  <div class="card-header">
                    <h6 class="card-title w-100"> 
                      <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                        Where is your property located?
                      </a>
                    </h6>
                  </div>
                  <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">City</label>
                            <input type="hidden" class="form-control" name="id">
                            <input type="text" class="form-control" name="name" placeholder="Enter Name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Apartment/society</label>
                            <input type="eamil" class="form-control" name="email" placeholder="Enter your email">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Located inside</label>
                            <select id="property_type" name="property_type" class="form-control "> 
                              <option>Select</option>
                              <option value="">It Park</option>
                              <option value="">Business Park</option>
                              <option value="">Other</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Locality</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                          </div>
                        </div>
                        <div class="col-md-4 commercial">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Project(Optional)</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Sub-Locality(Optional)</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">House No(Optional)</label>
                            <input type="number" class="form-control" name="password" placeholder="Enter password">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Address(Optional)</label>
                            <input type="eamil" class="form-control" name="email" placeholder="Enter your email">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Zone Type</label>
                            <select id="property_type" name="property_type" class="form-control "> 
                              <option>Select</option>
                              <option>Industrial</option>
                              <option>Commercial</option>
                              <option>Residential</option>
                              <option>Transport and Communication</option>
                              <option>Public Utilities</option>
                              <option>Public and Semi Public Use</option>
                              <option>Open Spaces</option>
                              <option>Agriculture Zone</option>
                              <option>Special Economic Zone</option>
                              <option>Natural Conservation Zone</option>
                              <option>Government Use</option>
                              <option>Other</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- About Proper ties --}}
                <div class="card card-secondary">
                  <div class="card-header">
                    <h6 class="card-title w-100">
                      <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                        Tell us about your property
                      </a>
                    </h6>
                  </div>
                  <div id="collapseTwo" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Your apartment is a</label>
                            <select class="form-control">
                                <option>Select</option>
                                <option>2 BHK</option>
                                <option>3 BHK</option>
                                <option>4 BHK</option>
                                <option>Other</option>
                            </select>

                            <div class="card card-secondary mt-3">
                              <div class="card-header">
                                <h6>Add Room Dttails</h6>
                              </div>
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">No. of Bedrooms</label>
                                      <select class="form-control">
                                          <option>Select</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">No. of Bathrooms</label>
                                      <select class="form-control">
                                        <option>Select</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Balconies</label>
                                      <select class="form-control">
                                        <option>Select</option>
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card card-secondary mt-3">
                            <div class="card-header">
                              <h6>Add Area Details(?)</h6>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Atleast one area type is mandatory</label>
                                    <input type="number" class="form-control" name="password" placeholder="Carpet Area">
                                  </div>
                                  <div class="form-group">
                                    <input type="number" class="form-control" name="password" placeholder="Built-up Area">
                                  </div>
                                  <div class="form-group">
                                    <input type="number" class="form-control" name="password" placeholder="Super Built-up Area">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Property Dimensions(Optional)</label>
                                    <input type="number" class="form-control" name="password" placeholder="Length ofplot(in Ft.)">
                                  </div>
                                  <div class="form-group">
                                    <input type="number" class="form-control" name="password" placeholder="Breadth ofplot(in Ft.)">
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Other Room(Optional)</label>
                                    <div class="select2-primary">
                                      <select class="select2"  multiple="multiple" data-placeholder="Select Other room" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                        <option>Select</option>
                                        <option>Pooja Room</option>
                                        <option>Study Room</option>
                                        <option>Servant Room</option>
                                        <option>Store Room</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Furnishing(Optional)</label>
                                    <select class="form-control">
                                      <option>Select</option>
                                      <option>Furnished</option>
                                      <option>Semi-furnished</option>
                                      <option>Un-furnished</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Reserved Parking(Optional)</label>
                                    <select class="form-control">
                                      <option>Select</option>
                                      <option>Covered parking</option>
                                      <option>open parking</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Floor Details</label>
                                    <h6>Total no of floor details</h6>
                                    <input type="number" class="form-control " name="password" placeholder="Built-up Area">
                                    <select class="form-control mt-3">
                                      <option>Basement</option>
                                      <option>Lower ground</option>
                                      <option>Ground</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Floors Allowed For Construction</label>
                                    <input type="number" class="form-control" name="password" placeholder="No. of floors">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Is there a boundary wall around the property?</label>
                                    <select class="form-control">
                                      <option>Select</option>
                                      <option>Yes</option>
                                      <option>No</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">No. of open sides?</label>
                                    <select class="form-control">
                                      <option>Select</option>
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Any construction done on this property?</label>
                                    <select class="form-control">
                                      <option>Select</option>
                                      <option>Yes</option>
                                      <option>No</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Availability Status</label>
                                    <select class="form-control">
                                      <option>Select</option>
                                      <option>Ready to move</option>
                                      <option>under construction</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Age of property</label>
                                    <select class="form-control">
                                      <option>Select</option>
                                      <option>0-1 years</option>
                                      <option>1-5 years</option>
                                      <option>5-10 years</option>
                                      <option>10+ years</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Possession By</label>
                                    <select class="form-control">
                                      <option>Select</option>
                                      <option>Within 3 Months</option>
                                      <option>Within 6 Month</option>
                                      <option>By 2024</option>
                                      <option>By 2025</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Avaiable from</label>
                                    <input type="date" class="form-control" name="" placeholder="Enter Name">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Willing to rent out to</label>
                                    <select class="form-control">
                                      <option>Select</option>
                                      <option>Family</option>
                                      <option>Single men</option>
                                      <option>Single women</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Are you ok with brokers contacting you?</label>
                                    <select class="form-control">
                                      <option>Select</option>
                                      <option>Yes</option>
                                      <option>No</option>
                                    </select>
                                  </div>
                                </div>
                                {{-- pg --}}
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Avaiable for</label>
                                    <select class="form-control">
                                      <option>Select</option>
                                      <option>Girl</option>
                                      <option>Boy</option>
                                      <option>Any</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Suitable for</label>
                                    <div class="form-check">
                                      <input type="checkbox" class="form-check-input" name="" placeholder="Enter Name">
                                      <label class="form-check-label" for="exampleInputPassword1">Students</label> <br>
                                      
                                      <input type="checkbox" class="form-check-input" name="" placeholder="Enter Name">
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
                        <input type="file" class="form-control" name="password" placeholder="Built-up Area">
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
                            <label for="exampleInputPassword1">Ownership(?)</label>
                            <select class="form-control">
                              <option>Select</option>
                              <option>Freehold</option>
                              <option>Leasehold</option>
                              <option>Co-operative Society</option>
                              <option>Power Of attorney</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Price Details</label>
                            <input type="text" class="form-control" name="password" placeholder="₹ Excepted Price">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group mt-4">
                            <label for="exampleInputPassword1"></label>
                            <input type="text" class="form-control" name="password" placeholder="₹ Price per Sq .ft">

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="" id="is_parent">
                              <label class="form-check-label" for="exampleCheck1">All inclusive price ?</label>
                              <br/>
                              <input type="checkbox" class="form-check-input" name="" id="is_parent">
                              <label class="form-check-label" for="exampleCheck1">Tax and Govt. charges excluded</label>
                              <br/>
                              <input type="checkbox" class="form-check-input" name="" id="is_parent">
                              <label class="form-check-label" for="exampleCheck1">Price Negotiable</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Additoinal price details(Optional)</label>
                            <input type="number" class="form-control"  name="" placeholder="Maintenance">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="exampleInputPassword1"></label>
                            <select class="form-control mt-4"> 
                              <option>Monthly</option>
                              <option>Annual</option>
                              <option>One time</option>
                              <option>Per Unity/Monthly</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">  
                            <input type="number" class="form-control"  name="" placeholder="Booking Amount">
                            <input type="number" class="form-control mt-3"  name="" placeholder="Enter the width">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                          </div>
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
                            <textarea name="" id=""rows="10" class="form-control"></textarea>
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
                            <label for="exampleInputPassword1">Amenities</label>
                            <div class="select2-primary">
                              <select class="select2 form-control"  multiple="multiple" data-placeholder="Select Other Amenities" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                <option>Select</option>
                                <option>Park</option>
                                <option>Maintanance Staff</option>
                                <option>Water Storage</option>
                                <option>Security/Fire Alarm</option>
                                <option>Visitor Parking</option>
                                <option>Feng shui/Vaastu Compliant</option>
                                <option>Intercom Facility</option>
                                <option>Lift(s)</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Property Features</label>
                            <div class="select2-primary">
                              <select class="select2"  multiple="multiple" data-placeholder="Select Other room" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                <option>Select</option>
                                <option>Internet/Wi-fi connectivity</option>
                                <option>High Ceiling Hight</option>
                                <option>false Ceiling Lighting</option>
                                <option>Piped-gas</option>
                                <option>Central Air Conditoned</option>
                                <option>Water Purifier</option>
                                <option>Recently Renoveted</option>
                                <option>Private Garden/Terrace</option>
                                <option>Natural Light</option>
                                <option>Airy Rooms</option>
                                <option>Spacious interiors</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Socity/Building Features</label>
                            <div class="select2-primary">
                              <select class="select2"  multiple="multiple" data-placeholder="Select Other room" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                <option>Select</option>
                                <option>Water Softening plant</option>
                                <option>Shopping Center</option>
                                <option>Fitness Center/GYM</option>
                                <option>Swimming Pool</option>
                                <option>Clube house/Comunity Center</option>
                                <option>Security Personel</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Adintional Features</label>
                            <div class="select2-primary">
                              <select class="select2"  multiple="multiple" data-placeholder="Select Other room" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                <option>Select</option>
                                <option>Separate entry For servant room </option>
                                <option>Waste Disposal</option>
                                <option>No open drainage aroung</option>
                                <option>Rain Water Harvesting</option>
                                <option>Bank attached Property</option>
                                <option>Low Density Socity</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Water Source</label>
                            <div class="select2-primary">
                              <select class="select2"  multiple="multiple" data-placeholder="Select Other Amenities" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                <option>Select</option>
                                <option>munsipal Corporation</option>
                                <option>Borewell/Tank</option>
                                <option>24*7Water</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Overloking </label>
                            <div class="select2-primary">
                              <select class="select2"  multiple="multiple" data-placeholder="Select Other Amenities" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                <option>Select</option>
                                <option>pool</option>
                                <option>Park/Garden</option>
                                <option>Clube</option>
                                <option>Main Road</option>
                                <option>Other</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Other Features</label>
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="" id="is_parent">
                              <label class="form-check-label" for="exampleCheck1">In a gated society</label>
                              <br/>
                              <input type="checkbox" class="form-check-input" name="" id="is_parent">
                              <label class="form-check-label" for="exampleCheck1">Corner Property</label>
                              <br/>
                              <input type="checkbox" class="form-check-input" name="" id="is_parent">
                              <label class="form-check-label" for="exampleCheck1">Pet Friendy</label>
                              <br/>
                              <input type="checkbox" class="form-check-input" name="" id="is_parent">
                              <label class="form-check-label" for="exampleCheck1">Wheelchair Friendy</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Power Back Up </label>
                            <select class="form-control">
                              <option>Select</option>
                              <option>None</option>
                              <option>Partial</option>
                              <option>Full</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Property Faching </label>
                            <select class="form-control">
                              <option>Select</option>
                              <option>North</option>
                              <option>South</option>
                              <option>East</option>
                              <option>West</option>
                              <option>North-East</option>
                              <option>North-West</option>
                              <option>South-East</option>
                              <option>South-West</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Type of flooring </label>
                            <select class="form-control">
                              <option>Select</option>
                              <option>Marbel</option>
                              <option>Concrete</option>
                              <option>Polished Concrete </option>
                              <option>Granite</option>
                              <option>Ceramic</option>
                              <option>Mosaic</option>
                              <option>Cement</option>
                              <option>Stone</option>
                              <option>Vinly</option>
                              <option>Wood</option>
                              <option>Vitrified</option>
                              <option>Spartex</option>
                              <option>IPSFinish</option>
                              <option>Other</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-10">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Width of faching road</label>
                            <input type="number" class="form-control"  name="" placeholder="Enter the width">
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                          <label for="exampleInputPassword1"></label>
                            <select class="form-control mt-4"  > 
                              <option>Select</option>
                              <option>Feet</option>
                              <option>Meter</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Location Advantage</label>
                            <p>Highlight the nearby landmarks*</p>
                            <div class="select2-primary">
                              <select class="select2"  multiple="multiple" data-placeholder="Select Other Amenities" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                <option>Select</option>
                                <option>Close to Metro station</option>
                                <option>Close to school</option>
                                <option>Close to Hospital</option>
                                <option>Close to Market</option>
                                <option>Close to Railway Station</option>
                                <option>Close to Airport</option>
                                <option>Close to Mall</option>
                                <option>Close to Highway</option>
                              </select>
                            </div>
                          </div>
                        </div>
      
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Suggest a Property Feature</label>
                            <p>That you want us to add in the form</p>
                          <input type="text" class="form-control"  name="" placeholder="Enter your USP's here">
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="" id="">
                            <label class="form-check-label" for="exampleCheck1">Get my listing update vie <span><a href="#">Whatsapp</a></span> </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Continue</button>
              </div>
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
