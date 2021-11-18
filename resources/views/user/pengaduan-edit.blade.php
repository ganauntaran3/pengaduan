@extends('layouts.user')

@section('title', 'Edit Pengaduan')

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
            
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Edit Pengaduan Anda</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              @foreach($pengaduan as $p)
              <form action="{{ route('update.aduan', $p->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="nik" value="{{ $p->nik }}">
              <input type="hidden" name="status" value="0">
                <div class="form-group">
                    <textarea id="message" name="isi_laporan" class="form-control" style="height: 300px">
                     {!! $p->isi_laporan !!}
                    </textarea>
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Attachment
                    <input type="file" value="{{ $p->foto }}" name="foto">
                  </div>
                  <p class="help-block">{{ $p->foto }}</p>
                  File anda sebelumnya
                  
                </div>

                <input type="hidden" name="tgl_pengaduan" value="{{ $p->tgl_pengaduan }}">

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <a href="{{ url('/') }}" class="btn btn-default"><i class="fas fa-times"></i> Cancel</a>
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
              </div>
              </form>
              @endforeach
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
@endsection('content')