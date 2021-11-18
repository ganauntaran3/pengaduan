@extends('layouts.petugas')

@section('title', 'Detail Pengaduan')

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
            <div class="col-md-11">
            <div class="card card-danger card-outline">
            <div class="card-header">
              <h3 class="card-title">Kotak Masuk</h3>

            </div>
            <!-- /.card-header -->
            @foreach($pengaduan as $p)
            <form action="{{ route('verification', $p->id) }}" method="POST">
            @csrf
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>From: {{ $p->nama }}
                <input type="hidden" name="nik" value="{{ $p->nik }}">
                  <span class="mailbox-read-time float-right">{{ $p->tgl_pengaduan }}</span></h5>
                  <input type="hidden" name="tgl_pengaduan" value="{{ $p->tgl_pengaduan }}">
              </div>
              <!-- /.mailbox-read-info -->
             
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                {!! $p->isi_laporan !!}
                <input type="hidden" name="isi_laporan" value="{{ $p->isi_laporan }}">
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-white mb-4">
              <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                <li>
                  <span class="mailbox-attachment-icon has-img"><img width="200px" src="http://127.0.0.1:8000/img/{{ $p->foto }}" alt="Attachment"></span>
                    <input type="hidden" name="foto" value="{{ $p->foto }}">
                </li>
              </ul>
            </div>
            <!-- /.card-footer -->
            <input type="hidden" name="status" value="proses">
            <div class="card-footer">
              <div class="float-right">
                <a target="_blank" href="{{ url('petugas/detail-print/' . $p->id) }}" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <button type="submit" onclick="return hapus('Anda yakin untuk memverifikasi laporan ini?')" class="btn btn-default"><i class="fas fa-share"></i> Verifikasi</button>
              </div>
              
            </div>
            </form>
            @endforeach
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->

            </div>
        </div>
       
          
@endsection('content')
