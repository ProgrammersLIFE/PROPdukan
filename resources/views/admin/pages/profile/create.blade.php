@extends('admin.components.layout')
@section('content')
<style>
  .hide{
    display: none;
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="alert alert-success alert-block hide">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong class="message"></strong>
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Profile</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="form" data-action="{{ url('profile/create')}}">
          @csrf
          <div class="card-body">
            <form class="form-horizontal">
                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" value="{{ $selected['id'] }}" name="id">
                    <input type="name" class="form-control" value="{{ $selected['name'] }}" name="name" id="inputName" placeholder="Enter your Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="{{ $selected['email'] }}" id="inputEmail" placeholder="Enter your Email">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputName2" class="col-sm-2 col-form-label">Contact No.</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="mobile_number" value="{{ $selected['mobile_number'] }}" id="inputName2" placeholder="Contact Number">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputExperience" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                    <input type="file" name="image" value="{{ $selected['image'] }}" class="form-control" id="inputName2">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputSkills" class="col-sm-2 col-form-label">Location</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="location" value="{{ $selected['location'] }}" id="inputSkills" placeholder="Add Location">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
          </div>
          <!-- /.card-body -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
    
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection
<script src="{{ url('/') }}/admin/plugins/jquery/jquery.min.js"></script>
<script src="{{ url('/') }}/admin/js/add-profile.js"></script>