@extends('admin.layout.master')
@section('title', 'Dashboard')
@section('content')
<style>
    .icon i {
        font-size: 40px;
    }
    .medicin_area {
        margin-left: 30px;
    }
    .next_meet {
        font-size: 20px;
        font-weight: 600
    }
    .advice {
        margin-top: 20px;
        text-align: left;
        font-weight: 600;
        font-size: 20px;
    }
    ..medicin_area {
        position: relative;
    }
    .medicin_area::before {
        content: "";
        position: absolute;
        background: red;
        width: 1px;
        height: 200%;
        top: 0;
        left: 0;
    }
    @media print {
        /* All your print styles go here */
       .main-header,.sidebar,.page-header { display: none !important; }
       .print_{
           position: absolute;
           top:0;
           left: 0;
           max-width: 1366px !important;
           overflow: hidden;
       }
    }
}
</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                    <a href="{{ route('admin.dashboard')}}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Appoinments</a>
                    </li>
                </ul>
            </div>
            <div class="divider1"></div>
        <section class="print_">
            <div class="container">
                <div class="row doctor_info">
                    <div class="col-md-12 text-center">
                        <h1>{{$prescriptionInfo->doctor->name}}</h1>
                        {{ $prescriptionInfo->Specialist->specialist }}
                    </div>
                </div>

                <div class="row pres_patient">
                    <div class="col-sm-6">
                        <p>Name: {{$prescriptionInfo->patient->name}}</p>
                    </div>
                    <div class="col-sm-3 text-right">
                        <p>Age: {{$prescriptionInfo->patient->age}}</p>
                    </div>
                    <div class="col-sm-3 text-right">
                        <p>Data: {{ \Carbon\Carbon::parse($prescriptionInfo->date)->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">

                </div>

                <div class="col-md-8">
                    <div class="icon">
                        <i class="fas fa-prescription"></i>
                    </div>
                    <table class="table medicin_area">
                        @forelse($prescriptionShows as $prescriptionShow)
                        <tr>
                            <td>{{ $prescriptionShow->medicines->name }}</td>
                            <td>{{ $prescriptionShow->eating_time }}</td>
                            <td>{{ $prescriptionShow->days }}</td>
                            <td>{{ $prescriptionShow->note }}</td>
                        </tr>
                        @empty
                        <tr>Medicine Not Found</tr>

                        @endforelse
                        <input type="hidden" name="doctorId" value="{{$prescriptionShow->doctor_id}}">
                    </table>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-8">
                    <p class="advice">Advice: {{ $prescriptionInfo->prescriptionInfo->advice }}</p>
                </div>
            </div>

                <p class="text-center text-danger next_meet">Next meet: {{ $prescriptionInfo->prescriptionInfo->next_meet }}</p>

            </div>
        </section>
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

