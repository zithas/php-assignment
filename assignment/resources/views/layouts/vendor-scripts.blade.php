<!-- JAVASCRIPT -->
<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/metismenu/metismenu.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js')}}"></script>
<script>
    $('#change-password').on('submit',function(event){
        event.preventDefault();
        var Id = $('#data_id').val();
        var current_password = $('#current-password').val();
        var password = $('#password').val();
        var password_confirm = $('#password-confirm').val();
        $('#current_passwordError').text('');
        $('#passwordError').text('');
        $('#password_confirmError').text('');
        $.ajax({
            url: "{{ url('update-password') }}" + "/" + Id,
            type:"POST",
            data:{
                "current_password": current_password,
                "password": password,
                "password_confirmation": password_confirm,
                "_token": "{{ csrf_token() }}",
            },
            success:function(response){
                $('#current_passwordError').text('');
                $('#passwordError').text('');
                $('#password_confirmError').text('');
                if(response.isSuccess == false){ 
                    $('#current_passwordError').text(response.Message);
                }else if(response.isSuccess == true){
                    setTimeout(function () {   
                        window.location.href = "{{ url('/index') }}";
                    }, 1000);   
                }
            },
            error: function(response) {
                $('#current_passwordError').text(response.responseJSON.errors.current_password);
                $('#passwordError').text(response.responseJSON.errors.password);
                $('#password_confirmError').text(response.responseJSON.errors.password_confirmation);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#datatable').dataTable( {
            "pageLength": 50,
            order: [[0, 'desc']]
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#datatable1').dataTable({
            "pageLength": 50,
            order: [
                [0, 'desc']
            ]
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#datatable2').dataTable( {
            "pageLength": 50,
            order: [[0, 'desc']]
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#datatable3').dataTable( {
            "pageLength": 50,
            order: [[0, 'desc']]
        });
    });
    </script>
        <script>
    $(document).ready(function() {
        $('#datatable4').dataTable( {
            "pageLength": 50,
            order: [[0, 'desc']]
        });
    });
    </script>
         <script>
    $(document).ready(function() {
        $('#datatable5').dataTable( {
            "pageLength": 50,
            order: [[0, 'desc']]
        });
    });
    </script>
             <script>
    $(document).ready(function() {
        $('#datatable6').dataTable( {
            "pageLength": 10,
            order: [[0, 'desc']]
        });
    });
    </script>
             <script>
    $(document).ready(function() {
        $('#datatable7').dataTable( {
            "pageLength": 10,
            order: [[0, 'desc']]
        });
    });
    </script>

@yield('script')

<!-- App js -->
<script src="{{ URL::asset('assets/js/app.min.js')}}"></script>

@yield('script-bottom')