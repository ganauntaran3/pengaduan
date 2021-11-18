@extends('layouts.admin')

@section('title', 'Petugas')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Petugas</li>
            </ol>
          </div>

          <div class="ml-auto"><a class="btn btn-primary btn-md" href="{{ url('admin/petugas/create') }}">
            <i class="fas fa-plus"></i>   Tambahkan Petugas</a></div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
<div class="row">
          <div class="col-12">

          @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> {{ session('message') }}!</h5>
                </div>
                @endif
           

            <div class="card">
            
              <div class="card-header">
                <h3 class="card-title">Data Petugas</h3>

                <div class="card-tools">
                
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default mx-auto"><i class="fas fa-search mx-auto"></i></button>
                 
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Petugas</th>
                      <th>Username</th>
                      <th>Telp</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($petugas as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama_petugas }}</td>
                        <td>{{ $p->username }}</td>
                        <td>{{ $p->telp }}</td>
                        <td>
                            <a href="{{ url('admin/petugas/edit/'.$p->id) }}" class="btn btn-app"><i class="fas fa-edit"></i>Edit</a>  
                            <a onclick="return hapus('Anda yakin akan menghapus data ini?')" href="{{ url('admin/petugas/delete/'.$p->id) }}" class="btn btn-app"><i class="fas fa-edit"></i>Delete</a>  
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
@endsection('content')