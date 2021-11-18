@extends('layouts.user')

@section('title', 'Pengaduan')

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
              <li class="breadcrumb-item active">Pengaduan anda</li>
            </ol>
          </div>
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
                <h3 class="card-title">Bilik Aduan Anda</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 700px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tanggal Pengaduan</th>
                      <th>Isi Laporan</th>
                      <th>Foto</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($pengaduan as $p)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $p->tgl_pengaduan }}</td>
                      <td>{!! substr($p->isi_laporan, 0, 50) !!}....</td>
                      <td><img width="100px" src="img/{{ $p->foto }}" ></td>
                      <td>
                        @if($p->status == '0')
                        <span class="badge badge-danger">Menunggu</span>
                        @elseif($p->status == 'proses')
                        <span class="badge badge-primary">Sedang di Proses</span>
                        @else
                        <span class="badge badge-success">Selesai</span>
                        @endif
                      </td>
                      <td>
                      @if($p->status == 'selesai')
                      <a href="{{ url('tanggapan/'.$p->id) }}" class="btn btn-app"><i class="fas fa-eye"></i>Lihat Tanggapan</a>  
                        @elseif($p->status == '0')
                        <a href="{{ url('pengaduan/edit/'.$p->id) }}" class="btn btn-app"><i class="fas fa-edit"></i>Edit</a>  
                        @endif
                      
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