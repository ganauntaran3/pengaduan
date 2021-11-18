@extends('layouts.admin')

@section('title', 'Tanggapan Petugas')

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
              <li class="breadcrumb-item active">Kirim Tanggapan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
<div class="row">

                <div class="col-md-11">
                <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Laporan Pengaduan</h3>
            @foreach($pengaduan as $p)
            </div>

            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>From: {{ $p->nama }}
                
                  <span class="mailbox-read-time float-right">{{ $p->tgl_pengaduan }}</span></h5>
              </div>
              <!-- /.mailbox-read-info -->
             
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                {!! $p->isi_laporan !!}
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-white mb-4">
              <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                <li>
                  <span class="mailbox-attachment-icon has-img"><img width="200px" src="http://127.0.0.1:8000/img/{{ $p->foto }}" alt="Attachment"></span>
                   
                </li>
              </ul>
            </div>
           
            <!-- /.card-footer -->
            <input type="hidden" name="status" value="proses">
            <div class="card-footer">
              <div class="float-right">
                <a target="_blank" href="{{ url('admin/print/' . $p->id) }}" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
              </div>
              
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
                </div>
            </div>

        <!-- Tanggapan dari Admin -->

        <div class="row">
            
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Tulis Tanggapan Anda</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="{{ route('admin.tanggapan', $p->id) }}" method="POST">
              @csrf
              <input type="hidden" name="nik" value="{{ $p->nik }}">
              <input type="hidden" name="isi_laporan" value="{{ $p->isi_laporan }}">
              <input type="hidden" name="tgl_pengaduan" value="{{ $p->tgl_pengaduan }}">
              <input type="hidden" name="foto" value="{{ $p->foto }}">

              <input type="hidden" name="status" value="selesai">
              <input type="hidden" name="complain_id" value="{{ $p->id }}">
              
              <input type="hidden" name="petugas_id" value="{{ request()->session()->get('key') }}">
                <div class="form-group">
                    <textarea id="message" name="tanggapan" class="form-control" style="height: 300px">
                     
                    </textarea>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <a href="{{ url('admin/verified') }}" class="btn btn-default"><i class="fas fa-times"></i> Cancel</a>
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
              </div>
              </form>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        @endforeach
@endsection('content')

        