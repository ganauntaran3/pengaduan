<!-- jQuery -->
<script src="{{ asset('vendor/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendor/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('vendor/dist/js/demo.js') }}"></script>

<script>
    function hapus($data){
        return confirm($data)
    }
</script>
<script src="{{ asset('vendor/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
    $('#message').summernote()
  })
</script>