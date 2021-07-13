<script src="{{ url('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

@if (Session::has('alert-success'))
    <script>
        swal("Great Job!","{!! Session::get('alert-success') !!}",{
            icon : "success",
            buttons:{        			
				confirm: {
			        className : 'btn btn-success'
				}
			},
        });

    </script>
@endif

@if (Session::has('alert-gagal'))
    <script>
        swal("Something Wrong!","{!! Session::get('alert-gagal') !!}",{
            icon : "warning",
            buttons:{        			
				confirm: {
			        className : 'btn btn-success'
				}
			},
        });
    </script>
@endif


