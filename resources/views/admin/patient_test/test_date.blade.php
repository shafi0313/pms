@extends('admin.layout.master')
@section('title', 'Patient Test')
@section('content')
<?php $p = 'patient_test'; ?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="#"></a></li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                {{-- <h4 class="card-title">{{ $prescriptionDates->patient->name }}</h4> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th style="width:40px">SN</th>
                                            <th>Patient Name</th>
                                            <th>Date</th>
                                            <th class="no-sort text-center" style="width: 70px">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Patient Name</th>
                                            <th>Date</th>
                                            {{-- <th>Status</th> --}}
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $x=1;@endphp
                                        @foreach($prescriptionDates as $prescriptionDate)
                                        <tr>
                                            <td class="text-center">{{ $x++ }}</td>
                                            <td>{{ $prescriptionDate->patient->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($prescriptionDate->date)->format('d/m/Y')}}</td>
                                            <td class="text-center"><a href="{{ route('patientTestShow',$prescriptionDate->date)}}">Show</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                <input type="hidden" name="pDate" value="{{$prescriptionDate->date}}">
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
    });
</script>

@endpush
@endsection

