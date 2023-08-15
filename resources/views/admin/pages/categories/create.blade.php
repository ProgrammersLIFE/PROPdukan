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
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Add Category</li>
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
              <h3 class="card-title">Add Propertie category </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="form" data-action="{{ url('property/create')}}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Property category Name</label>
                  
                  <input type="hidden" class="form-control" value="{{ $selected['id'] }}" name="id">
                  
                  <input type="text" placeholder="Enter Property category Name" class="form-control"  name="name" value="{{ $selected['name']}}" >
                  
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Type</label>
                  <select class="form-control" name="type" id="">
                    <option value="">Select</option>
                    <option {{ $selected['type'] == 1 ? 'selected' : '' }} value="1">Rsesidential</option>
                    <option {{ $selected['type'] == 2 ? 'selected' : '' }} value="2">Commercial</option>
                  </select>
                </div> 
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
<script src="{{ url('/') }}/admin/js/add-route.js"></script>