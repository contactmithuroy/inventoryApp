<!-- public js for vue  -->
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- jQuery -->
<script src="{{asset('admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin')}}/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('admin')}}/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('admin')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{asset('admin')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('admin')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{asset('admin')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('admin')}}/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('admin')}}/dist/js/pages/dashboard2.js"></script>
<!-- DataTables -->
<script src="{{asset('admin')}}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{asset('admin')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="{{asset('admin')}}/plugins/datatables-responsive/js/dataTables.min.js"></script>

<script>
$(".datatable").DataTable({
      'responsive':true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
});
</script>



{{-- Toster Notification --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}");

    @elseif (Session::has('errors'))
    toastr.error("{{ $errors->first('name') }}");
  @endif
</script>

@yield('script')

