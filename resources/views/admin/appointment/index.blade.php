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
                    <li class="nav-item"><a href="">Appointment</a></li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">All Appointment</h4>
                                {{-- <a class="btn btn-primary btn-round ml-auto" href="javascript:void(0)" id="createSpecialist"><i class="fa fa-plus"></i> Add New</a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- Page Content start --}}
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover tabel-sm" >
                                    <thead>
                                        <tr>
                                            <th style="width:5%">SN</th>
                                            <th>Name</th>
                                            <th>Doctor Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th class="no-sort" style="width:7%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Doctor Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $x=1;@endphp
                                        @foreach($appointments as $appointment)
                                        <tr>
                                            <td>{{ $x++ }}</td>
                                            <td>{{ $appointment->patient->name }}</td>
                                            <td>{{ $appointment->doctor->name }}</td>
                                            <td>{{ $appointment->date }}</td>
                                            <td>{{ $appointment->time }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('appointments.edit',$appointment->id)}}" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a href="{{route('appointments.destroy',$appointment->id)}}" data-toggle="tooltip" title="" class="btn btn-link btn-danger delete" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
               url:'{{ route("appointment.doctorSpecialist") }}',
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
                    var select = $('<select class="form-control form-control-sm"><option value=""></option></select>')
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

