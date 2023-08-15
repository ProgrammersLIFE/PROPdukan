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
              <div class="card-body">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h6>Where is your property loacted?</h6>
                  </div>
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
                          <label for="exampleInputPassword1">Apartment/society</label>
                          <input type="eamil" class="form-control" name="email" placeholder="Enter your email">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Locality</label>
                          <input type="password" class="form-control" name="password" placeholder="Enter password">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">House No(Optional)</label>
                          <input type="number" class="form-control" name="password" placeholder="Enter password">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                
                
                
                
                
                <h4 class="mb-3">Tell us about your property</h4>
                <div class="form-group">
                    <label for="exampleInputPassword1">Your apartment is a</label>
                    <select class="form-control">
                        <option>Select</option>
                        <option>2 BHK</option>
                        <option>3 BHK</option>
                        <option>4 BHK</option>
                        <option>Other</option>
                    </select>
                </div>
                <h4 class="mb-3">Add Room Dttails</h4>
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
                <h4 class="mb-3">Add Area Details(?)</h4>
                <h6>Atleast one area type is mandatory</h6>
                <div class="form-group">
                  <input type="number" class="form-control" name="password" placeholder="Carpet Area">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" name="password" placeholder="Built-up Area">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" name="password" placeholder="Super Built-up Area">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Other Room(Optional)</label>
                  <select class="form-control">
                    <option>Select</option>
                    <option>Pooja Room</option>
                    <option>Study Room</option>
                    <option>Servant Room</option>
                    <option>Store Room</option>
                </select>
                <div class="form-group">
                  <label for="exampleInputPassword1">Furnishing(Optional)</label>
                  <select class="form-control">
                    <option>Select</option>
                    <option>Furnished</option>
                    <option>Semi-furnished</option>
                    <option>Un-furnished</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Reserved Parking(Optional)</label>
                  <select class="form-control">
                    <option>Select</option>
                    <option>Covered parking</option>
                    <option>open parking</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Floor Details</label>
                  <h6>Total no of floor details</h6>
                  <input type="number" class="form-control" name="password" placeholder="Built-up Area">
                  <select class="form-control">
                    <option>Basement</option>
                    <option>Lower ground</option>
                    <option>Ground</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Availability Status</label>
                  <select class="form-control">
                    <option>Select</option>
                    <option>Ready to move</option>
                    <option>under construction</option>
                  </select>
                </div>
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
                <h4>Add photos of your property(Optional)</h4>
                <h6>A picture is worth a thousand word.87% of buyer lookat photos before buying</h6>
                <div class="form-group">
                  <label for="exampleInputPassword1">Upload from desktop</label>
                  <input type="file" class="form-control" name="password" placeholder="Built-up Area">
                </div>
              <!-- /.card-body -->
              {{-- <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div> --}}
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
<script src="{{ url('/') }}/admin/js/add-user.js"></script>