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
                        <a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('doctor.index')}}">Doctors</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Create</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
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
                            <form action="{{ route('doctor.store')}}" method="post" id="degree">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="placeholder">Doctor Name</label>
                                        <input id="name" name="name" type="text" class="form-control" value="{{old('name')}}" placeholder="Enter Doctor Name" required>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="specialist" class="placeholder">Select Specialist</label>
                                        <select class="form-control" id="specialist" name="doctor_specialist" required>
                                            <option selected value disabled>Select</option>
                                            @foreach($specialistCat as $doctorSpecialist)
                                            <option value="{{ $doctorSpecialist->id }}">{{ $doctorSpecialist->specialist }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label for="phone" class="placeholder">Doctor Phone</label>
                                        <input id="phone" name="phone" type="text" value="{{old('phone')}}" class="form-control" placeholder="Enter Phone Number" required>
                                    </div>

                                    <div class="form-group col-sm-2">
                                        <label for="age" class="placeholder">Age</label>
                                        <input id="age" name="age" type="text" value="{{old('age')}}" class="form-control" placeholder="Enter Age" required>
                                    </div>

                                    <div class="form-check col-md-3">
                                        <label>Gender</label><br>
                                        <label class="form-radio-label">
                                            <input class="form-radio-input" type="radio" name="gender" value="male" checked="">
                                            <span class="form-radio-sign">Male</span>
                                        </label>
                                        <label class="form-radio-label ml-4">
                                            <input class="form-radio-input" type="radio" name="gender" value="female">
                                            <span class="form-radio-sign">Female</span>
                                        </label>
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="fees" class="placeholder">Fees</label>
                                        <input id="fees" name="fees" value="{{old('fees')}}" type="text" class="form-control" placeholder="Enter Fess" required>
                                    </div>


                                    <div class="form-group col-sm-6">
                                        <label for="email" class="placeholder">Email</label>
                                        <input id="email" name="email" type="email" value="{{old('email')}}" class="form-control" placeholder="Enter Email" required>

                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="address" class="placeholder">Address</label>
                                        <input id="address" name="address" type="text" value="{{old('address')}}" class="form-control" placeholder="Enter Address" required>

                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="password" class="placeholder">Password</label>
                                        <input id="password" name="password" type="password" class="form-control" required>

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="password_confirmation" class="placeholder">Confirm Password</label>
                                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required>

                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="patient_mobile_no" class="col-sm-3 control-label">Degree: </label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="invest_field">
                                                <tr>
                                                    <td><input type="text" name="degree[]"placeholder="Enter Doctor Degree" class="form-control name_list" /></td>
                                                    <td><button type="button" name="invest_add" id="invest_add" class="btn btn-success">Add More</button></td>
                                                    {{-- <input type="hidden" name="specialist_cat_id[]" value="{{$specialistCat->id}}"> --}}
                                                </tr>

                                            </table>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <label for="patient_mobile_no" class="col-sm-3 control-label">Time: </label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="medicine_field">
                                                <tr>
                                                    <td><input type="text" name="time[]"placeholder="Ex: From seven to eight in the morning" class="form-control name_list" /></td>
                                                    <td><button type="button" name="med_add" id="med_add" class="btn btn-success">Add More</button></td>
                                                    {{-- <input type="hidden" name="specialist_cat_id[]" value="{{$specialistCat->id}}"> --}}
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="mr-auto card-action">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>

                        {{-- Page Content End --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@push('custom_scripts')
<script>
    $(document).ready(function () {
        var j = 1;
        var medicine = '<tr id="row1' + j + '">';
        medicine += '<td><input type="text" name="time[]"placeholder="Ex: From seven to eight in the morning" class="form-control name_list" /></td>';
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
                '"><td><input type="text" name="degree[]"placeholder="Enter Doctor Degree" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
                z + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row2' + button_id + '').remove();
        });

        // var i = 1;
        // $('#add').click(function () {
        //     i++;
        //     $('#name_field').append('<tr id="row' + i +
        //         '"><td><input type="text" name="name[]" placeholder="Enter Doctor Advice"" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
        //         i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        // });
        // $(document).on('click', '.btn_remove', function () {
        //     var button_id = $(this).attr("id");
        //     $('#row' + button_id + '').remove();
        // });
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
@endpush
@endsection

