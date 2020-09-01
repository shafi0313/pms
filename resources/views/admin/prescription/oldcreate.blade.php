@extends('admin.layout.master')
@section('title', 'Dashboard')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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





                            <div class="container">
                                <h1>Laravel 5 - Autocomplete Mutiple Fields Using jQuery, Ajax and MySQL</h1>
                                {!! Form::open() !!}

                                  <table class="table table-bordered">
                                    <tr>
                                        <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
                                        <th>S. No</th>
                                        <th>Country Name</th>
                                        <th>Country code</th>
                                    </tr>
                                    <tr>
                                        <td><input type='checkbox' class='chkbox'/></td>
                                        <td><span id='sn'>1.</span></td>
                                        <td><input class="form-control autocomplete_txt" type='text' data-type="countryname" id='countryname_1' name='countryname[]'/></td>
                                        <td><input class="form-control autocomplete_txt" type='text' data-type="country_code" id='country_code_1' name='country_code[]'/> </td>
                                      </tr>
                                    </table>
                                    <button type="button" class='btn btn-danger delete'>- Delete</button>
                                    <button type="button" class='btn btn-success addbtn'>+ Add More</button>
                                {!! Form::close() !!}
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
                                                <td><input type="text" name="medicine_id[]" placeholder="Enter medicine Name" class="form-control typeahead" /></td>
                                                <td><input type="text" name="eating_time[]" placeholder="0+0+0" class="form-control" /> </td>
                                                <td><input type="text" name="days[]" placeholder="Enter medicine time" class="form-control" /></td>
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

{{--
                            <div class="table-responsive">
                                <table id="autocomplete_table" class="table table-hover autocomplete_table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Country Name</th>
                                            {{-- <th scope="col">Country Number</th>
                                            <th scope="col">Country Phone Code</th>
                                            <th scope="col">Country Code</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr id="row_1">
                                            <th id="delete_1" scope="row" class="delete_row d">a</th>
                                            <td>
                                                <input type="text" data-type="countryname" name="countryname[]" id="countryname_1" class="form-control autocomplete_txt" autocomplete="off">
                                            </td>
                                            <td>
                                                <input type="text" data-type="countryno" name="countryno[]" id="countryno_1" class="form-control autocomplete_txt" autocomplete="off">
                                            </td>
                                            <td>
                                                <input type="text" data-type="phone_code" name="phone_code[]" id="phone_code_1" class="form-control autocomplete_txt" autocomplete="off">
                                            </td>
                                            <td>
                                                <input type="text" data-type="country_code" name="country_code[]" id="country_code_1" class="form-control autocomplete_txt" autocomplete="off">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <div class="btn-container">
                                <button class="btn btn-success" id="addNew">
                                    Add New
                                </button>
                            </div> --}}



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
             '<td><input type="text" name="medicine_id[]" placeholder="Enter Medicine Name" class="form-control addNew" /></td>'+
             '<td><input type="text" name="eating_time[]" placeholder="0+0+0" class="form-control" /></td>'+
             '<td><input type="text" name="days[]" placeholder="Enter Medicine Time" class="form-control" /></td>'+
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


{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> --}}
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
    $('.addNew').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>

<script>
    $(document).ready(function(){
        var rowcount, addBtn, tableBody, imgPath, basePath
        rowcount = $("#autocomplite_table tbody tr");
        addBtn = $("#addNew");
        tableBody = $("#autocomplite_table tbody");
        imgPath = $(".d").val();
        basePath = $("#basePath").val();

        function fromHtml(){
            html = '<tr id="row_'+rowcount+'">';
            html += '<td id="delete_'+rowcount+'" scope="row" class="delete_row d">a</th>';
            html += '<td><input type="text" data-type="countryname" name="countryname[]" id="countryname_1" class="form-control autocomplete_txt" autocomplete="off"></td>';
            html +='<tr>';
            rowcount++;
            return html;
        }

        function addNewRow(){
            var html = formHtml();
            console.log(html);
            tableBody.append(html);
        }

        function registerEvents(){
            addBtn.on("click", addNewRow);
        }
        registerEvents();
    })
</script>
<script type="text/javascript">

    $(".delete").on('click', function() {
     $('.chkbox:checkbox:checked').parents("tr").remove();
     $('.check_all').prop("checked", false);
     updateSerialNo();
   });
   var i=$('table tr').length;
   $(".addbtn").on('click',function(){
     count=$('table tr').length;

       var data="<tr><td><input type='checkbox' class='chkbox'/></td>";
         data+="<td><span id='sn"+i+"'>"+count+".</span></td>";
         data+="<td><input class='form-control autocomplete_txt' type='text' data-type='countryname' id='countryname_"+i+"' name='countryname[]'/></td>";
         data+="<td><input class='form-control autocomplete_txt' type='text' data-type='country_code' id='country_code_"+i+"' name='country_code[]'/></td></tr>";
     $('table').append(data);
     i++;
   });

   function select_all() {
     $('input[class=chkbox]:checkbox').each(function(){
       if($('input[class=check_all]:checkbox:checked').length == 0){
         $(this).prop("checked", false);
       } else {
         $(this).prop("checked", true);
       }
     });
   }
   function updateSerialNo(){
     obj=$('table tr').find('span');
     $.each( obj, function( key, value ) {
       id=value.id;
       $('#'+id).html(key+1);
     });
   }
   //autocomplete script
   $(document).on('focus','.autocomplete_txt',function(){
     type = $(this).data('type');

     if(type =='countryname' )autoType='name';
    //  if(type =='country_code' )autoType='sortname';
      $(this).autocomplete({
          minLength: 0,
          source: function( request, response ) {
               $.ajax({
                   url: "{{ route('searchajax') }}",
                   dataType: "json",
                   data: {
                       term : request.term,
                       type : type,
                   },
                   success: function(data) {
                       var array = $.map(data, function (item) {
                          return {
                              label: item[autoType],
                              value: item[autoType],
                              data : item
                          }
                      });
                       response(array)
                   }
               });
          },
          select: function( event, ui ) {
              var data = ui.item.data;
              id_arr = $(this).attr('id');
              id = id_arr.split("_");
              elementId = id[id.length-1];
              $('#countryname_'+elementId).val(data.name);
            //   $('#country_code_'+elementId).val(data.sortname);
          }
      });
   });
   </script>

<script type="text/javascript">

    $(".delete").on('click', function() {
     $('.chkbox:checkbox:checked').parents("tr").remove();
     $('.check_all').prop("checked", false);
     updateSerialNo();
   });
   var i=$('table tr').length;
   $(".addbtn").on('click',function(){
     count=$('table tr').length;

       var data="<tr><td><input type='checkbox' class='chkbox'/></td>";
         data+="<td><span id='sn"+i+"'>"+count+".</span></td>";
         data+="<td><input class='form-control autocomplete_txt' type='text' data-type='countryname' id='countryname_"+i+"' name='countryname[]'/></td>";
         data+="<td><input class='form-control autocomplete_txt' type='text' data-type='country_code' id='country_code_"+i+"' name='country_code[]'/></td></tr>";
     $('table').append(data);
     i++;
   });

   function select_all() {
     $('input[class=chkbox]:checkbox').each(function(){
       if($('input[class=check_all]:checkbox:checked').length == 0){
         $(this).prop("checked", false);
       } else {
         $(this).prop("checked", true);
       }
     });
   }
   function updateSerialNo(){
     obj=$('table tr').find('span');
     $.each( obj, function( key, value ) {
       id=value.id;
       $('#'+id).html(key+1);
     });
   }
   //autocomplete script
   $(document).on('focus','.autocomplete_txt',function(){
     type = $(this).data('type');

     if(type =='countryname' )autoType='name';
     if(type =='country_code' )autoType='sortname';

      $(this).autocomplete({
          minLength: 0,
          source: function( request, response ) {
               $.ajax({
                   url: "{{ route('searchajax') }}",
                   dataType: "json",
                   data: {
                       term : request.term,
                       type : type,
                   },
                   success: function(data) {
                       var array = $.map(data, function (item) {
                          return {
                              label: item[autoType],
                              value: item[autoType],
                              data : item
                          }
                      });
                       response(array)
                   }
               });
          },
          select: function( event, ui ) {
              var data = ui.item.data;
              id_arr = $(this).attr('id');
              id = id_arr.split("_");
              elementId = id[id.length-1];
              $('#countryname_'+elementId).val(data.name);
              $('#country_code_'+elementId).val(data.sortname);
          }
      });


   });
   </script>
    @endpush

    @endsection
