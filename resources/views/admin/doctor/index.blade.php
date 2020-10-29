@extends('admin.layout.master')
@section('title', 'Doctors')
@section('content')
<?php $p = 'doctor'; ?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard')}}" title="Dashboard"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="#">Doctors</a></li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Doctor Table</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="{{ route('doctor.create') }}">
                                    <i class="fa fa-plus"></i>
                                    Add New Doctor
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th style="width:6%">SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Spesialist</th>
                                            <th>Photo</th>
                                            <th class="no-sort" style="width:4%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $x=1;@endphp
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $x++ }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->age }}</td>
                                            <td>{{ $user->address }}</td>
                                            {{-- <td>{{ $user->doctorDegree->specialist}}</td> --}}
                                            <td>
                                                <?php
                                                    if(isset($user->doctorDegree->specialist)){
                                                        echo $user->doctorDegree->specialist;
                                                    }else{
                                                        echo "Null";
                                                    }
                                                ?>
                                            </td>
                                            <td>{{ $user->photo }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                <a href="{{ route('doctor.edit',$user->id)}}" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    {{-- <form action="" style="display: initial;" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button data-toggle="tooltip" title="" class="btn btn-link btn-danger delete" data-original-title="Remove">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form> --}}
                                                    <a href="admin/doctor/destroy/{{$user->id}}" data-toggle="tooltip" title="" class="btn btn-link btn-danger delete" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
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

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        // $('#addRowButton').click(function() {
        //     $('#add-row').dataTable().fnAddData([
        //         $("#addName").val(),
        //         $("#addPosition").val(),
        //         $("#addOffice").val(),
        //         action
        //         ]);
        //     $('#addRowModal').modal('hide');

        // });
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

