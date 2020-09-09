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
                            <form action="{{ route('medicine.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="name">Medicine Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="Enter Medicine Name" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="medicine_group">Medicine Group</label>
                                        <input type="text" name="medicine_group" class="form-control" id="medicine_group" value="{{old('medicine_group')}}" placeholder="Enter Medicine Group">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="company">Company Name</label>
                                        <input type="text" name="company" class="form-control" id="company" value="{{old('company')}}" placeholder="Enter Company Name">
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" class="form-control" id="price" value="{{old('price')}}" placeholder="Enter Price">
                                    </div>
                                </div>

                                <div style="text-align: center" class="mr-auto card-action">
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

@endpush

@endsection

