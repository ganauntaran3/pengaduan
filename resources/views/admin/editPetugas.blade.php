@extends('layouts.admin')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambahkan Petugas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Petugas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
<div class="row">
<div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Lengkapi Data Petugas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              @foreach($petugas as $p)
              <form action="{{ route('update.petugas', $p->id) }}" method="POST">
              @csrf
               
                <div class="form-group">
                  <input type="text" class="form-control" name="nama_petugas" placeholder="Nama Petugas" value="{{ $p->nama_petugas }}">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $p->username }}">
                </div>


                <div class="form-group">
                  <input type="number" class="form-control" name="telp" placeholder="Nomor Telepon" value="{{ $p->telp }}">
                </div>

                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password" >
                </div>


                <input type="hidden" name="level" value="petugas">
                @endforeach

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <a href="{{ url('admin/petugas') }}" class="btn btn-default"><i class="fas fa-times"></i> Cancel</a>
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
              </div>
              </form>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection
