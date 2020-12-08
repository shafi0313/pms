@extends('admin.layout.master')
@section('title', 'Prescription')
@section('content')
<?php $p = 'prescription'; ?>
<style>
    .print_page {
        width: 815px;
        height: 1000px;
        margin-left: auto;
        margin-right: auto;
        display: block;
    }

    /* .print_page {
        height: 842px;
        width: 595px;
        margin-left: auto;
        margin-right: auto;
    } */
</style>
{{-- <style>
    .icon i {
        margin-left: 40px;
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
    .v_line {
        position: relative;
    }
    .v_line::before {
        content: "";
        position: absolute;
        background: red;
        width: 1px;
        height: 200%;
        top: 0;
        left: 35px;
    }
    .test tr td{
        font-size: 14px;
    }
}
</style> --}}
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
        <section class="print_page" id="print_page">
            <div class="container">
                <div class="row doctor_info">
                    <div class="col-md-12 text-center">
                        <h1>{{$prescriptionInfo->doctor->name}}</h1>
                        @foreach ($prescriptionInfo->specialistCat as $item)
                            <li style="list-style: none;font-size:15px">{{$item->degree}}</li>
                        @endforeach
                        @foreach ($doctorDeg as $degree)
                            <h2>{{$degree->doctorDegree->specialist}}</h2>
                        @endforeach
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
                    <div>{!! $prescriptionInfo->prescriptionInfo->symptoms !!}</div>
                    <br>
                    <table class="table test">
                        <h3 style="font-weight: bold; text-decoration:underline">Tests</h3>
                        @php $x=1 @endphp
                        @forelse($patient_tests as $patient_test)

                        <tr>
                            <td>{{$x++}}. {{ $patient_test->medicalTest->name }}</td>
                        </tr>
                        @empty
                        @endforelse
                    </table>
                </div>

                <div class="col-md-8 v_line">
                    <div class="icon">
                        <i style="font-size: 45px" class="fas fa-prescription"></i>
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
            <input class="print btn btn-info px-5" type="button" onclick="printDiv('print_page')" value="Print">
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

<script>
    function printDiv(print_page) {
        var printContents = document.getElementById(print_page).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endpush
@endsection

