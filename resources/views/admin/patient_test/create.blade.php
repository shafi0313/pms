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
                    <li class="nav-item"><a href="{{ route('patient_test.appointment')}}">Appointments</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Add Test</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- Page Content Start --}}
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Medicine</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            {{-- <div class="container">
                                <div class="row doctor_info">
                                    <div class="col-md-12 text-center">
                                        <h1>{{$appointments->doctor->name}}</h1>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="container">
                                <div class="row doctor_info">
                                    <div class="col-md-12 text-center">
                                        <h1>{{$appointments->doctor->name}}</h1>
                                        @foreach ($appointments->specialistCat as $item)
                                            <li style="list-style: none;font-size:15px">{{$item->degree}}</li>
                                        @endforeach
                                        @foreach ($doctorDeg as $degree)
                                            <h2>{{$degree->doctorDegree->specialist}}</h2>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row pres_patient">
                                    <div class="col-sm-6">
                                        <p>Name: {{$appointments->patient->name}}</p>
                                    </div>
                                    <div class="col-sm-3 text-right">
                                        <p>Age: {{$appointments->patient->age}}</p>
                                    </div>
                                    <div class="col-sm-3 text-right">
                                        <p>Data: {{ \Carbon\Carbon::parse($appointments->date)->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            </div>


                            <form action="{{ route('patient_test.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="appointmentId" value="{{$appointments->id}}">
                                <table class="table table-bordered">
                                    <tr>
                                        <th><input class='check_all' type='checkbox' onclick="select_all()" /></th>
                                        <th>Medicine Name</th>
                                    </tr>
                                    <tr>
                                        <td><input type='checkbox' class='chkbox' /></td>
                                        <input class="form-control autocomplete_txt" type="hidden" data-type="medicinesId" id="medicine_id_1" name="test_cat_id[]" />
                                        <td><input class="form-control autocomplete_txt" type="text" data-type="medicalTest" id="medicine_name_1" /></td>
                                        <input type="hidden" name="doctor_id[]" value="{{$appointments->doctor_id}}">
                                        <input type="hidden" name="patient_id[]" value="{{$appointments->patient_id}}">
                                        <input type="hidden" name="apnmt_id[]" value="{{$appointments->id}}">
                                    </tr>
                                </table>
                                <button type="button" class='btn btn-danger delete'>Delete</button>
                                <button type="button" class='btn btn-success addbtn'>Add More</button></td>
                                <br>
                                <br>
                                {{-- <div class="form-group">
                                    <label for="advice">Advice</label>
                                    <textarea name="advice" class="form-control" cols="30" rows="2"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="next_meet">Next Meet</label>
                                    <textarea name="next_meet" class="form-control" cols="30" rows="2"></textarea>
                                </div> --}}

                                <button class="btn btn-primary col-md-offset-6" type="submit">Submit</button>
                            </form>

                        {{-- Page Content End --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('custom_scripts')
<script type="text/javascript">
    $(".delete").on('click', function () {
        $('.chkbox:checkbox:checked').parents("tr").remove();
        $('.check_all').prop("checked", false);
        updateSerialNo();
    });
    var i = $('table tr').length;
    $(".addbtn").on('click', function () {
        count = $('table tr').length;
        var data = '<tr><td><input type="checkbox" class="chkbox"/></td>';
        data += '<input class="form-control autocomplete_txt" type="hidden" data-type="medicinesId" id="medicine_id_' + i + '" name="test_cat_id[]"/>';
        data += '<td><input class="form-control autocomplete_txt" type="text" data-type="medicalTest" id="medicine_name_' + i + '" /></td>';
        data += '<input type="hidden" name="doctor_id[]" value="{{$appointments->doctor->id}}">';
        data += '<input type="hidden" name="patient_id[]" value="{{$appointments->patient->id}}">';
        data += '<input type="hidden" name="apnmt_id[]" value="{{$appointments->id}}">';
        data += "</tr>";
        $('table').append(data);
        i++;
    });

    function select_all() {
        $('input[class=chkbox]:checkbox').each(function () {
            if ($('input[class=check_all]:checkbox:checked').length == 0) {
                $(this).prop("checked", false);
            } else {
                $(this).prop("checked", true);
            }
        });
    }

    function updateSerialNo() {
        obj = $('table tr').find('span');
        $.each(obj, function (key, value) {
            id = value.id;
            $('#' + id).html(key + 1);
        });
    }
    //autocomplete script
    $(document).on('focus', '.autocomplete_txt', function () {
        type = $(this).data('type');

        if (type == 'medicalTest') autoType = 'name';
        if (type == 'medicinesId') autoType = 'id';

        $(this).autocomplete({
            minLength: 0,
            source: function (request, response) {
                $.ajax({
                    url: "{{ route('patientsearch') }}",
                    dataType: "json",
                    data: {
                        term: request.term,
                        type: type,
                    },
                    success: function (data) {
                        var array = $.map(data, function (item) {
                            return {
                                label: item[autoType],
                                value: item[autoType],
                                data: item
                            }
                        });
                        response(array)
                    }
                });
            },
            select: function (event, ui) {
                var data = ui.item.data;
                id_arr = $(this).attr('id');
                id = id_arr.split("_");
                elementId = id[id.length - 1];
                $('#medicine_id_' + elementId).val(data.id);
                $('#medicine_name_' + elementId).val(data.name);
            }
        });


    });
</script>
@endpush
@endsection
