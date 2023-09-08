@extends('layouts.master-layouts')
@section('title') @lang('Register') @endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<style>
    #datatable img {
        width: 60px;
        border-radius: 50%;
    }
</style>
@endsection
@section('content')


<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <form id="filter-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-3" style="width: 25%;">
                                    <div class="md-3">
                                        <label>Start Date</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" placeholder="Start Date" id="fromDate" name="fromDate" value=''>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2" style="width: 25%;">
                                    <div class="md-3">
                                        <label>End Date</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" placeholder="End Date" id="endDate" name="endDate" value=''>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2" style="margin-top: 29px;">
                                    <div class="md-3">
                                        <button type='submit' class="btn bg-add filter" name="filter" id="filter" style="width: 120px;">Filter</button>
                                    </div>
                                </div>
                        </form>
                        <div class="col-md-2" style="margin-top: 29px;">
                            <div class="md-3">
                                <button type="button" class="btn bg-cancel" id="clear-filter" style="width: 120px;">Clear</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4" style="text-align:right;padding-top: 22px;">
                    <input type="button" class="btn bg-add font-weight-bolder text-uppercase get_value_no" id="register" style=" height:41px;  margin-bottom:20px;" name="" value="+ Register" title="Register">
                </div>
            </div>
            <div class="row">
                <div class="">
                    <div class="table-responsive" style="overflow-x: hidden;">
                        <form action="" Method="GET">

                            <table class="table table-striped table-bordered mb-0" id="mytable">
                                <thead>
                                    <tr>
                                        <th scope="col" width="10%">Emp. Code</th>
                                        <th scope="col" width="12%">Profile Image</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col" width="15%">Joining Date</th>
                                    </tr>
                                </thead>
                                <tbody id="emp_data">

                                </tbody>
                            </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="register-form">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Employee Registration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="employee-register" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-3">
                                <label for="" class="form-label">Employee Code</label>
                                <input type="text" class="form-control" id="emp_id" name="emp_code" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-3">
                                <label for="" class="form-label">Joining Date</label>
                                <input type="date" class="form-control" id="joining_date" name="joining_date">
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-3">
                                <label for="" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-3">
                                <label for="" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-3">
                                <label for="" class="form-label">Profile Image</label>
                                <input type="file" class="form-control" id="profile_img" name="profile_img">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-add waves-effect waves-light font-weight-bolder text-uppercase">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {

        var table = $('#mytable').DataTable({});
        const baseUrl = "{{ asset ('') }}";
        EmployeeData();
        $('#clear-filter').on('click', function() {
            $('#fromDate').val('');
            $('#endDate').val('');
            EmployeeData();
        });

        function EmployeeData() {
            $.ajax({
                url: "{{ route('employee.data') }}",
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    table.clear().draw();
                    $.each(data.data, function(index, item) {
                        table.row.add([
                            item.emp_code,
                            '<img src="' + baseUrl + '' + item.profile_img + '" alt="Profile Picture" width="50">',
                            item.full_name,
                            convertYMDtoDMY(item.joining_date),
                        ]).draw(false);
                    });
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        }



        $("body").on("click", "#register", function() {
            $.ajax({
                url: "{{ route('getEmpcode') }}",
                method: "GET",
                success: function(data) {
                    $('#emp_id').val(data);
                    $('#register-form').modal('show');
                }

            });

        });

        $('#employee-register').submit(function(e) {
            e.preventDefault();

            var formData = new FormData($(this)[0]);

            $.ajax({
                url: "{{ route('employee.register') }}",
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    Swal.fire(
                        'Done!',
                        response.message,
                        'success')
                    $('#register-form').modal('hide');
                    $.ajax({
                        url: "{{ route('employee.data') }}",
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            table.clear().draw();
                            $.each(data.data, function(index, item) {
                                table.row.add([
                                    item.emp_code,
                                    '<img src="' + baseUrl + '' + item.profile_img + '" alt="Profile Picture" width="50">',
                                    item.full_name,
                                    convertYMDtoDMY(item.joining_date),
                                ]).draw(false);
                            });
                        },
                        error: function(error) {
                            console.error('Error fetching data:', error);
                        }
                    });

                },
                error: function(error) {
                    Swal.fire(
                        'Error!',
                        error.responseJSON.message,
                        'error')
                }
            });
        });

        $('#filter-form').submit(function(e) {
            e.preventDefault();

            var formData = new FormData($(this)[0]);

            $.ajax({
                url: "{{ route('employee.filter') }}",
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {

                    table.clear().draw();
                    $.each(data.data, function(index, item) {
                        table.row.add([
                            item.emp_code,
                            '<img src="' + baseUrl + '' + item.profile_img + '" alt="Profile Picture" width="50">',
                            item.full_name,
                            convertYMDtoDMY(item.joining_date),
                        ]).draw(false);
                    });
                },
                error: function(error) {
                    Swal.fire(
                        'Warning!',
                        'No Data Found..',
                        'warning')
                }
            });


        });

        function convertYMDtoDMY(ymdDate) {
            return new Date(ymdDate).toLocaleDateString('en-GB');
        }
    });
</script>
@endsection