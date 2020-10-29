@extends('admin.layout.master')
@section('title', 'Prescription')
@section('content')
<?php $p = 'prescription'; ?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                    <a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Appoinments</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Appoinments</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="{{ route('doctor.create') }}"><i class="fa fa-plus"></i>Add New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th style="width:5%">SN</th>
                                            <th>Patient Name</th>
                                            <th>Doctor Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th class="no-sort text-center" style="width:10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Patient Name</th>
                                            <th>Doctor Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $x=1;@endphp
                                        @forelse($appointments as $appointment)
                                        <tr>
                                            <td class="text-center">{{ $x++ }}</td>
                                            <td>{{ $appointment->patient->name }}</td>
                                            <td>{{ $appointment->doctor->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }}</td>
                                            <td>{{ $appointment->time }}</td>
                                            <td class="d-flex">
                                                <form action="{{route('prescription.appointmentReject',$appointment->id)}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="1" name="a_status">
                                                    <button class="btn btn-danger btn-sm" style="font-size: 17px;padding:0 10px;" type="submit" onclick="return confirm('Are you sure?')"><i class="far fa-times-circle" ></i></button>
                                                </form> <span style="margin: 0 5px">||</span>
                                                <a class="btn btn-primary btn-sm" style="font-size: 17px;padding:0 10px;" href="{{ route('prescriptionCreate',$appointment->id)}}"><i class="fas fa-prescription"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" align="center">
                                                <h1 class="display-5 text-danger">Table Empty</h1>
                                            </td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@push('custom_scripts')

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
@endpush
@endsection

