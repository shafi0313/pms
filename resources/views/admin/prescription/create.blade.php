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
                                        <p>Data: {{$appointments->date}}</p>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('prescription.store') }}" method="post" id="insert_form">
                                @csrf
                                {{-- <div class="form-group">
                                    <label for="patient_mobile_no" class="col-sm-3 control-label">Advice for
                                        Investigation : </label>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="invest_field">
                                            <tr>
                                                <td><input type="text" name="advice_invest[]" placeholder="Enter Advice for Investigation" class="form-control name_list" /></td>
                                                <td><button type="button" name="invest_add" id="invest_add" class="btn btn-success">Add More</button></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div> --}}
                                {{-- <input type="hidden" name="doctor_id" value="{{$appointments->doctor->id}}">
                                <input type="hidden" name="doctor_id" value="{{$appointments->patient->id}}"> --}}

                                <div class="form-group">
                                    <label for="patient_mobile_no" class="col-sm-3 control-label">Medicine :
                                    </label>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="medicine_field">
                                            <tr>
                                                <td><input type="text" name="medicine_id[]" placeholder="Enter medicine Name" class="form-control name_list" /></td>
                                                <td><input type="text" name="eating_time[]" placeholder="0+0+0" class="form-control name_list" /> </td>
                                                <td><input type="text" name="days[]" placeholder="Enter medicine time" class="form-control name_list" /></td>
                                                <td><button type="button" name="med_add" id="med_add" class="btn btn-success">Add More</button></td>

                                                    <input type="hidden" name="doctor_id[]" value="{{$appointments->doctor->id}}">
                                                    <input type="hidden" name="patient_id[]" value="{{$appointments->patient->id}}">

                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="patient_mobile_no" class="col-sm-3 control-label">Advice :
                                    </label>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="name_field">
                                            <tr>
                                                <td><input type="text" name="name[]" placeholder="Enter Doctor Advice" class="form-control name_list" /></td>
                                                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div> --}}
                                <button class="btn btn-primary col-md-offset-6" type="submit">Submit</button>
                            </form>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12"><h2>Laravel 5.7 Auto Complete Search Using Jquery UI</h2></div>
                                    <div class="col-12">
                                        <div id="custom-search-input">
                                            <div class="input-group">
                                                <input id="search" name="search" type="text" class="form-control" placeholder="Search" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- Page Content End --}}
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

            var medicine = '<tr id="row1' + j + '">'+
             '<td><input type="text" name="medicine_id[]" placeholder="Enter Medicine Name" class="form-control name_list" /></td>'+
             '<td><input type="text" name="eating_time[]" placeholder="0+0+0" class="form-control name_list" /></td>'+
             '<td><input type="text" name="days[]" placeholder="Enter Medicine Time" class="form-control name_list" /></td>'+
             '<input type="hidden" name="doctor_id[]" value="{{$appointments->doctor->id}}">'+
             '<input type="hidden" name="patient_id[]" value="{{$appointments->patient->id}}">'+
             '<td><button type="button" name="remove" id="' + j + '" class="btn btn-danger btn_remove">X</button></td></tr>'
            var j = 1;
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
            //  $('#submit').click(function(){
            //       $.ajax({
            //            url:"",
            //            method:"POST",
            //            data:$('#add_name').serialize(),
            //            success:function(data)
            //            {
            //                 alert(data);
            //                 $('#add_name')[0].reset();
            //            }
            //       });
            //  });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            var html =
                '<tr><td><input class="form-control" type="text" name="medicine_id[]" required=""></td><td><input class="form-control" type="email" name="email[]"></td><td><input class="form-control" type="text" name="phone[]" ></td><td><input class="form-control" type="text" name="address[]" ></td><td><input class="btn btn-danger" type="button" id="remove" name="remove" value="Remove"></td></tr>';


            var max = 10;
            var x = 1;

            $("#add").click(function () {
                if (x <= max) {
                    $("#table_field").append(html);
                    x++;
                }
            });
            $("#table_field").on('click', '#remove', function () {
                $(this).closest('tr').remove();
                x--;
            });

        });
    </script>

{{-- <script type="text/javascript">
    $(document).ready(function () {
        $('#country').on('keyup',function() {
            var query = $(this).val();
            $.ajax({
                url:"{{ route('search') }}",
                type:"GET",
                data:{'country':query},
                success:function (data) {
                    $('#country_list').html(data);
                }
            })
            // end of ajax call
        })

        $(document).on('click', 'li', function(){
            var value = $(this).text();
            $('#country').val(value);
            $('#country_list').html("");
        });
    });
</script> --}}


<script>
    $(document).ready(function() {
       $( "#search" ).autocomplete({

           source: function(request, response) {
               $.ajax({
               url: "{{route('autocomplete')}}",
               data: {
                       term : request.term
                },
               dataType: "json",
               success: function(data){
                  var resp = $.map(data,function(obj){
                    //    console.log(obj.name);
                       return obj.name;
                  });

                  response(resp);
               }
           });
       },
       minLength: 1
    });
   });

   </script>

    @endpush

    @endsection
