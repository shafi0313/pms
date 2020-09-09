@extends('admin.layout.master')
@section('title', 'Appointment')
@section('content')
<?php $p = 'appoinments'; ?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a>
                    </li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="">Add Appointment</a></li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Appointment</h4>
                                {{-- <a class="btn btn-primary btn-round ml-auto" href="javascript:void(0)" id="createSpecialist"><i class="fa fa-plus"></i> Add New</a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- Page Content start --}}
                            <form action="{{ route('appointments.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
										<label for="doctor">Select Specialist</label>
                                        <select class="form-control" id="doctor" required>
                                            <option></option>
                                            @foreach($doctorSpecialists as $specialistt)
                                            <option value="{{$specialistt->id}}">{{$specialistt->specialist}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
										<label for="doctor">Select Doctor</label>
                                        <select class="form-control" name="doctor_name" id="subs" required></select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="">Appointment Date</label>
                                        <input type="txte" name="date" class="form-control date-picker datepicker" Placeholder="DD/MM/YYYY" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="">Appointment Time</label>
                                        <input type="text" name="time" class="form-control" Placeholder="HH:MM" required>
                                    </div>
                                </div>
                                <input type="hidden" name="patientId" value="{{$patient->id}}">
                                <div align="center">
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                    <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                </div>
                            </form>
                        </div>

                        {{-- Page Content start --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@push('custom_scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#doctor').on('change',function(e) {
         var cat_id = $("#doctor").val();
         $.ajax({
               url:'{{ route("subcat") }}',
               type:"get",
               data: {
                   cat_id: cat_id
                },
               success:function (res) {
                   res = $.parseJSON(res);
                   console.log(res.subCat)
                    $('#subs').html(res.subCat);
               }
           })
        });

    });
</script>

{{-- Delete  --}}
<script>
    $('.delete').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>

<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });

        $('#multi-filter-select').DataTable( {
            "pageLength": 10,
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                            );

                        column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                    } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
                ]);
            $('#addRowModal').modal('hide');

        });
    });
</script>
<script>

    $(".datepicker").datepicker({
    format: "dd/mm/yyyy",
    changeMonth: true,
    changeYear: true,
    todayHighlight: true,
});
</script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
@endpush

@endsection

