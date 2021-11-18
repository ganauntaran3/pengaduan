@extends('layouts.user')

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
              <li class="breadcrumb-item active">Tanggapan Petugas</li>
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
              <h3 class="card-title">Kotak Masuk Tanggapan</h3>
              @foreach($tanggapan as $p)
              <span class="mailbox-read-time float-right">{{ $p->tgl_tanggapan }}</span>
            </div>
            <!-- /.card-header -->
            
            <form action="{{ route('verification', $p->id) }}" method="POST">
            @csrf
            <div class="card-body p-0">
              <!-- <div class="mailbox-read-info">
                <h5>
                <input type="hidden" name="nik" value="{{ $p->nik }}">
                  </h5>
              </div> -->
              <!-- /.mailbox-read-info -->
             
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                {!! $p->tanggapan !!}
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-white mb-4">
              <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                <li>
                  <span class="mailbox-attachment-icon has-img"><img width="200px" src="http://127.0.0.1:8000/img/{{ $p->complain->foto }}" alt="Attachment"></span>
                </li>
              </ul>
            </div>
            <!-- /.card-footer -->
            <input type="hidden" name="status" value="proses">
            <div class="card-footer">
              <div class="float-right">
                <a href="{{ url('/') }}" class="btn btn-default"><i class="fas fa-reply"></i>  Kembali </a>
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