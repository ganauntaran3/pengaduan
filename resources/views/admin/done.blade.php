@extends('layouts.admin')

@section('title', 'Catatan Pengaduan')

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
              <li class="breadcrumb-item active">Catatan Pengaduan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
<div class="row">
<div class="col-md-12">

@if(session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> {{ session('message') }}!</h5>
                </div>
                @endif

          <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Arsip</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-secondary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
    
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover">
                <thead>
                    <th>#</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Nama Pelapor</th>
                    <th>Isi Laporan</th>
                    <th>Foto</th>
                    <th>action</th>
                </thead>
                  <tbody>
                  @foreach($pengaduan as $p)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->tgl_pengaduan }}</td>
                    <td class="mailbox-name"><a href="read-mail.html">{{ $p->nama }}</a></td>
                    <td class="mailbox-subject">{!! substr($p->isi_laporan, 0, 50) !!}....</td>
                    <td class="mailbox-attachment"><img width="100px" src="http://127.0.0.1:8000/img/{{ $p->foto }}" ></td>
                    <td class="mailbox-date"><a target="_blank" href="{{ url('admin/print/'.$p->id) }}" class="btn btn-app"><i class="fas fa-print"></i>Print</a></td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
        
            </div>
          </div>
          <!-- /.card -->
        </div>
        </div>
        <!-- /.row -->
@endsection('content')