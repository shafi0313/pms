@extends('admin.layout.master')
@section('title', 'User')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active"><a href="{{ route('users.index')}}">Show User</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Create User</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add New User</h4>
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
                            <form action="{{ route('users.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="name" type="text" class="form-control" {{old('name')}} placeholder="Enter Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Permission</label>
                                            <select name="is_" class="form-control" required>
                                                <option selected value disabled>Select</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Counter</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-7 pr-0">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" type="text" class="form-control" {{old('email')}} placeholder="Enter Email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input name="age" type="number" class="form-control" {{old('email')}} placeholder="Enter Age" required>
                                        </div>
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
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input name="address" type="text" class="form-control" {{old('address')}} placeholder="Enter Address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-0">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="password" type="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Confrim Password</label>
                                            <input name="password_confirmation" type="password" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div align="center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-danger" onclick="return confirm('Are you sure?')">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('custom_scripts')
@endpush
@endsection
