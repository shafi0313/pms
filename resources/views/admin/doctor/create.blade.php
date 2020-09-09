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
                        <a href="{{ route('doctor.index')}}">Doctors</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Create</a>
                    </li>
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
                            <form action="{{ route('doctor.store')}}" method="post">
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
                                            @foreach($doctorSpecialists as $doctorSpecialist)
                                            <option value="{{ $doctorSpecialist->id }}">{{ $doctorSpecialist->specialist }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label for="phone" class="placeholder">Doctor</label>
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
                                </div>
                                <div class="mr-auto card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@push('custom_scripts')
@endpush
@endsection

