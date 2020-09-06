@extends('admin.layout.master')
@section('title', 'Dashboard')
@section('content')

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
                        <a href="{{ route('medicine.index')}}">Medicine List</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('medicine.create')}}">Add Medicine</a>
                    </li>
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

                            <div class="container">
                                <div class="row doctor_info">
                                    <div class="col-md-12 text-center">
                                        <h1>{{$appointments->doctor->name}}</h1>
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


                            <form action="{{ route('prescription.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="appointmentId" value="{{$appointments->id}}">
                                <table class="table table-bordered">
                                    <tr>
                                        <th><input class='check_all' type='checkbox' onclick="select_all()" /></th>
                                        <th>Medicine Name</th>
                                        <th width="10%">Eating Time</th>
                                        <th>How Many Time</th>
                                        <th>Note</th>
                                    </tr>
                                    <tr>
                                        <td><input type='checkbox' class='chkbox' /></td>
                                        <input class="form-control autocomplete_txt" type="hidden" data-type="medicinesId" id="medicine_id_1" name="medicine_id[]" />
                                        <td><input class="form-control autocomplete_txt" type="text" data-type="medicinesName" id="medicine_name_1" /></td>
                                        <td><input type="text" name="eating_time[]" placeholder="0+0+0" class="form-control" /> </td>
                                        <td><input type="text" name="days[]" placeholder="Enter medicine time" class="form-control" /></td>
                                        <td><input type="text" name="note[]" placeholder="Enter Note" class="form-control" /></td>
                                        <input type="hidden" name="doctor_id[]" value="{{$appointments->doctor->id}}">
                                        <input type="hidden" name="patient_id[]" value="{{$appointments->patient->id}}">
                                        <input type="hidden" name="apnmt_id[]" value="{{$appointments->id}}">
                                    </tr>
                                </table>
                                <button type="button" class='btn btn-danger delete'>Delete</button>
                                <button type="button" class='btn btn-success addbtn'>Add More</button></td>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label for="advice">Advice</label>
                                    <textarea name="advice" class="form-control" cols="30" rows="2"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="next_meet">Next Meet</label>
                                    <textarea name="next_meet" class="form-control" cols="30" rows="2"></textarea>
                                </div>

                                <button class="btn btn-primary col-md-offset-6" type="submit">Submit</button>
                            </form>



                    {{-- <form action="{{ route('prescription.store') }}" method="post" id="insert_form">
                            @csrf
                            <div class="form-group">
                                <label for="patient_mobile_no" class="col-sm-3 control-label">Advice for
                                    Investigation : </label>

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="invest_field">
                                        <tr>
                                            <td><input type="text" name="advice_invest[]"
                                                    placeholder="Enter Advice for Investigation"
                                                    class="form-control name_list" /></td>
                                            <td><button type="button" name="invest_add" id="invest_add"
                                                    class="btn btn-success">Add More</button></td>

                                        </tr>
                                    </table>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="patient_mobile_no" class="col-sm-3 control-label">Medicine :
                                </label>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="medicine_field">
                                        <tr>
                                            <td><input class="form-control autocomplete_txt" type="text"
                                                    data-id="medicineId" id="medicine_id_1" name="medicine_id[]" />
                                            </td>
                                            <td><input class="form-control autocomplete_txt" type="text"
                                                    data-type="medicinesName" id="medicine_name_1" /></td>
                                            <td><input type="text" name="eating_time[]" placeholder="0+0+0"
                                                    class="form-control" /> </td>
                                            <td><input type="text" name="days[]" placeholder="Enter medicine time"
                                                    class="form-control" /></td>
                                            <td><button type="button" name="med_add" id="med_add"
                                                    class="btn btn-success">Add More</button></td>

                                            <input type="hidden" name="doctor_id[]"
                                                value="{{$appointments->doctor->id}}">
                                            <input type="hidden" name="patient_id[]"
                                                value="{{$appointments->patient->id}}">
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="patient_mobile_no" class="col-sm-3 control-label">Advice :
                                </label>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="name_field">
                                        <tr>
                                            <td><input type="text" name="advice[]" placeholder="Enter Doctor Advice"
                                                    class="form-control name_list" /></td>
                                            <td><button type="button" name="add" id="add" class="btn btn-success">Add
                                                    More</button></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <button class="btn btn-primary col-md-offset-6" type="submit">Submit</button>
                        </form> --}}

                        {{-- Page Content End --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('custom_scripts')
<script>
    $(document).ready(function () {
        var j = 1;
        var medicine = '<tr id="row1' + j + '">';
        medicine += '<td><input class="form-control autocomplete_txt" type="text" data-id="medicineId" id="medicine_id_' + j + '" name="medicine_id[]"/> </td>';
        medicine += '<td><input class="form-control autocomplete_txt" type="text" data-type="medicinesName" id="medicine_name_' + j + '"/></td>';
        medicine += '<td><input type="text" name="eating_time[]" placeholder="0+0+0" class="form-control" /></td>';
        medicine += '<td><input type="text" name="days[]" placeholder="Enter Medicine Time" class="form-control" /></td>';
        medicine += '<input type="hidden" name="doctor_id[]" value="{{$appointments->doctor->id}}">';
        medicine += '<input type="hidden" name="patient_id[]" value="{{$appointments->patient->id}}">';
        medicine += '<input type="hidden" name="apnmt_id[]" value="{{$appointments->id}}">';
        medicine += '<td><button type="button" name="remove" id="' + j + '" class="btn btn-danger btn_remove">X</button></td></tr>';

        $('#med_add').click(function () {
            j++;
            $('#medicine_field').append(medicine);
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row1' + button_id + '').remove();
        });

        var z = 1;
        $('#invest_add').click(function () {
            z++;
            $('#invest_field').append('<tr id="row2' + z +
                '"><td><input type="text" name="advice_invest[]" placeholder="Enter Doctor Advice"" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
                z + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row2' + button_id + '').remove();
        });

        var i = 1;
        $('#add').click(function () {
            i++;
            $('#name_field').append('<tr id="row' + i +
                '"><td><input type="text" name="name[]" placeholder="Enter Doctor Advice"" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
        $('#submit').click(function () {
            $.ajax({
                url: "",
                method: "POST",
                data: $('#add_name').serialize(),
                success: function (data) {
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });
    });
</script>
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
        data += '<input class="form-control autocomplete_txt" type="hidden" data-type="medicinesId" id="medicine_id_' + i + '" name="medicine_id[]"/>';
        data += '<td><input class="form-control autocomplete_txt" type="text" data-type="medicinesName" id="medicine_name_' + i + '" /></td>';
        data += '<td><input type="text" name="eating_time[]" placeholder="0+0+0" class="form-control" /> </td>';
        data += '<td><input type="text" name="days[]" placeholder="Enter medicine time" class="form-control" /></td>';
        data += '<td><input type="text" name="note[]" placeholder="Enter Note" class="form-control" /></td>';
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

        if (type == 'medicinesName') autoType = 'name';
        if (type == 'medicinesId') autoType = 'id';

        $(this).autocomplete({
            minLength: 0,
            source: function (request, response) {
                $.ajax({
                    url: "{{ route('searchajax') }}",
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
