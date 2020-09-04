@extends('admin.layout.master')
@section('title', 'Appointment')
@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Appointment</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                    <a href="{{ route('admin.dashboard')}}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">
                        <a href="{{ route('specialist.index') }}">Doctor Specialist</a>
                    </li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Appointment</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="javascript:void(0)" id="createSpecialist"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- Page Content start --}}
                            <form action="{{ route('appointments.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
										<label for="doctor">Select Specialist</label>
                                        <select class="form-control" id="doctor" required>
                                            <option></option>
                                            @foreach($doctorSpecialists as $specialistt)
                                            <option value="{{$specialistt->id}}">{{$specialistt->specialist}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
										<label for="doctor">Select Doctor</label>
                                        <select class="form-control" name="doctor_name" id="subs" required></select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="">Appointment Date</label>
                                        <input type="txte" name="date" class="form-control date-picker datepicker" Placeholder="DD/MM/YYYY" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="">Appointment Time</label>
                                        <input type="text" name="time" class="form-control" Placeholder="HH:MM" required>
                                    </div>
                                </div>
                                <input type="hidden" name="patientId" value="{{$patient->id}}">
                                <div align="center">
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                    <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                </div>
                            </form>
                            <br>

                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover tabel-sm" >
                                    <thead>
                                        <tr>
                                            <th style="width:1%">SN</th>
                                            <th>Name</th>
                                            <th>Doctor Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th style="width:7%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Doctor Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $x=1;@endphp
                                        @foreach($appointments as $appointment)
                                        <tr>
                                            <td>{{ $x++ }}</td>
                                            <td>{{ $appointment->patient->name }}</td>
                                            <td>{{ $appointment->doctor->name }}</td>
                                            <td>{{ $appointment->date }}</td>
                                            <td>{{ $appointment->time }}</td>
                                            <td>{{ $appointment->status }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('appointments.edit',$appointment->id)}}" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a href="{{route('appointments.destroy',$appointment->id)}}" data-toggle="tooltip" title="" class="btn btn-link btn-danger delete" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        {{-- Page Content start --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('custom_scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#doctor').on('change',function(e) {
         var cat_id = $("#doctor").val();
         $.ajax({
               url:'{{ route("subcat") }}',
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
        });

    });
</script>
{{-- <script>
     $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('appointments.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'specialist', name: 'specialist'},
            {data: 'details', name: 'details'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#createSpecialist').click(function () {
        $('#saveBtn').val("create-book");
        $('#id').val('');
        $('#specialistForm').trigger("reset");
        $('#modelHeading').html("Create Specialist");
        $('#ajaxModel').modal('show');
    });

    $('body').on('click', '.editBook', function () {
      var id = $(this).data('id');
      $.get("{{ route('specialist.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit Specialist");
          $('#saveBtn').val("edit-book");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#specialist').val(data.specialist);
          $('#details').val(data.details);
      })
   });

   $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');

        $.ajax({
          data: $('#specialistForm').serialize(),
          url: "{{ route('specialist.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#specialistForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
              toastr["success"]("Data Inserted")
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
              toastr["error"]("Data Insert Failed")
          }
      });
    });

    $('body').on('click', '.deleteBook', function () {
        var id = $(this).data("id");
        $confirm = confirm("Are You sure want to delete !");
        if($confirm == true ){
            $.ajax({
                type: "DELETE",
                url: "{{ route('specialist.store') }}"+'/'+id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
});
</script> --}}


{{-- Delete  --}}
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

    $(".datepicker").datepicker({
    format: "dd/mm/yyyy",
    changeMonth: true,
    changeYear: true,
    todayHighlight: true,
});
</script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
@endpush

@endsection

