@extends('admin.components.layout')
<style>
  .hide{
    display: none;
  }
</style>
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1>DataTables</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">View categories</li>
          </ol>
        </div>
        <div class="col-md-12">
          <div class="alert alert-success alert-block hide">
              <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong class="message"></strong>
          </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="card-title">View All Categoriess</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('property/create') }}" class="btn btn-primary">Add New</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection
<script src="{{ url('/') }}/admin/plugins/jquery/jquery.min.js"></script>
<script src="{{ url('/') }}/admin/js/category.js"></script>