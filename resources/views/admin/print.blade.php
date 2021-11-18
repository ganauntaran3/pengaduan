<!DOCTYPE html>
<html>
<head>
  <title>Cetak Laporan</title>
    @include('component.head')
</head>
<body>
    <div class="wrapper">
        <section class="printed">
        <div class="row">
            <div class="col-lg-12">
            @foreach($pengaduan as $p)
            <div class="card @php 
              if($p->status == '0'){
                echo "card-danger";
              }elseif($p->status == 'proses'){
                echo "card-primary";
              }else{
                echo "card-success";
                }
             @endphp card-outline">
            <div class="card-header text-center">
              <h2 class="align-text-center">Laporan Pengaduan Masyarakat</h2>

            </div>
            <!-- /.card-header -->
            
            <form action="{{ route('verification', $p->id) }}" method="POST">
            @csrf
            <div class="card-body p-1">
              <div class="mailbox-read-info">
                <h4>Dilaporkan oleh: {{ $p->nama }}
                
                <input type="hidden" name="nik" value="{{ $p->nik }}">
                  <div class="mailbox-read-time mt-4 float-right">{{ $p->tgl_pengaduan }}</div></h4>

                  <h5 class="mt-2">NIK: {{ $p->nik }}</h5>
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
            <div class="card-footer bg-white mb-5">
              <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                <li>
                  <div class="mailbox-attachment-icon has-img"><img src="http://127.0.0.1:8000/img/{{ $p->foto }}" alt="Attachment"></div>
                  <div class="mailbox-attachment-info">
                    <input type="hidden" name="foto" value="{{ $p->foto }}">
                  </div>
                </li>
              </ul>
            </div>
            <!-- /.card-footer -->
            <input type="hidden" name="status" value="proses">
            <div class="card-footer outline invoice">
              <div class="float-right">
                <div class="h5">Status Laporan : 
                    @if( $p->status == '0')
                    <span class="badge badge-danger">Menunggu Verifikasi</span>
                    @elseif( $p->status == 'proses')
                    <span class="badge badge-primary">Proses</span>
                    @else
                    <span class="badge badge-success">Selesai</span>
                    @endif
                </div>
              </div>
              
            </div>
            </form>
            @endforeach
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->

            </div>
        </div>
        </section>
    </div>

    <script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>

