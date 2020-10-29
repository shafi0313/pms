@extends('admin.layout.master')
@section('title', 'Patient')
@section('content')
<?php $p = 'patients'; ?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Patient</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('patients.index')}}">Show Patient</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Create Patient</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- Page Content Start --}}
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Patient</h4>
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
                            <form action="{{ route('patients.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="name">Patient Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="Enter Name" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="phone">Patient Contact No</label>
                                        <input type="text" name="phone" class="form-control" id="phone" value="{{old('phone')}}" placeholder="Enter Contact No" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="email">Patient Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}" placeholder="Enter Name">
                                    </div>
                                    <div class="form-check col-sm-3">
                                        <label>Gender</label><br>
                                        <label class="form-radio-label">
                                            <input class="form-radio-input" type="radio" name="gender" value="Male" checked="">
                                            <span class="form-radio-sign">Male</span>
                                        </label>
                                        <label class="form-radio-label ml-3">
                                            <input class="form-radio-input" type="radio" name="gender" value="Female">
                                            <span class="form-radio-sign">Female</span>
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="age">Patient Age</label>
                                        <input type="text" name="age" class="form-control" id="age" value="{{old('age')}}" placeholder="Enter Age" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="address">Patient Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="2" {{old('address')}}></textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="medical_history">Medical History</label>
                                        <textarea class="form-control" id="medical_history" name="medical_history" rows="2" {{old('medical_history')}}></textarea>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" id="app_sow" name="ifapnmt" type="checkbox" value="1">
                                        <span class="form-check-sign">Click here if you want to take an apartment</span>
                                    </label>
                                </div>

                                <div class="row app" style="display: none">
                                    <div class="form-group col-sm-6">
										<label for="">Select Specialist</label>
                                        <select class="form-control" id="doctorSpecialist">
                                            <option>Select Specialist</option>
                                            @foreach($doctorSpecialists as $specialistt)
                                            <option value="{{$specialistt->id}}">{{$specialistt->specialist}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
										<label for="doctor">Select Doctor</label>
                                        <select class="form-control" name="doctor_name" id="subs" required></select>
                                    </div>


                                    <div class="form-group col-md-6">
										<label for="doctor">Appointment Time</label>
                                        <select class="form-control" name="time" id="doctorTime" required></select>
                                    </div>


                                    <div class="form-group col-sm-6">
                                        <label for="">Appointment Date</label>
                                        <input type="txte" name="date" class="form-control date-picker datepicker" Placeholder="DD/MM/YYYY" required>
                                    </div>
                                </div>
                                <div class="mr-auto card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </form>
                        </div>
                    {{-- Page Content End --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom_scripts')
<script>
    $('#app_sow').click(function() {
        $('.app').slideToggle("slide");
    });
</script>
<script type="text/javascript">
        $('#doctorSpecialist').on('change',function(e) {
         var cat_id = $("#doctorSpecialist").val();
         $.ajax({
               url:'{{ route("patients.doctorSpecialist") }}',
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

           $('#subs').on('change',function(e) {
            var doctor_id = $("#subs").val();
            // alert(doctor_id);
            $.ajax({
                url:'{{ route("patients.doctorTime") }}',
                type:"get",
                data: {
                        doctor_id: doctor_id
                    },
                success:function (res) {
                    res = $.parseJSON(res);
                    console.log(res.doctorTime)
                        $('#doctorTime').html(res.doctorTime);
                },
            })
        });
        });
</script>
@endpush

@endsection

