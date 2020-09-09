@extends('admin.layout.master')
@section('title', 'Medicine')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a>
                    </li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Medicine</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add New</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="javascript:void(0)" id="createCategory"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover data-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 6%">No</th>
                                            <th>Name</th>
                                            <th>Amount</>
                                            <th>Info</th>
                                            <th style="text-align:center;width:80px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="categoryForm" name="categoryForm" class="form-horizontal">
                   <input type="hidden" name="id" id="id">
                   <div class="row">
                        <div class="form-group col-9">
                            <label for="name" class="control-label">Test Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Test Name">
                        </div>
                        <div class="form-group col-3">
                            <label for="amount" class="control-label">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount">
                        </div>

                        {{-- <div class="form-group col-6">
                            <label for="type" class="control-label">Type</label>
                            <select name="type" id="" class="form-control">
                                <option value="Tablet">Tablet</option>
                                <option value="Syrup">Syrup</option>
                                <option value="Injection">Injection</option>
                            </select>
                        </div> --}}

                        <div class="form-group col-12">
                            <label for="info" class="control-label">Details</label>
                            <textarea name="info" id="info" rows="2" class="form-control" placeholder="Enter Medicine Information"></textarea>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('custom_scripts')
<script>
     $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('medical_test.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'amount', name: 'amount'},
            {data: 'info', name: 'info'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#createCategory').click(function () {
        $('#saveBtn').val("create-book");
        $('#id').val('');
        $('#categoryForm').trigger("reset");
        $('#modelHeading').html("Create Medical Test Category");
        $('#ajaxModel').modal('show');
    });

    $('body').on('click', '.editBook', function () {
      var id = $(this).data('id');
      $.get("{{ route('medical_test.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit Medical Test Category");
          $('#saveBtn').val("edit-book");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#name').val(data.name);
          $('#amount').val(data.amount);
          $('#info').val(data.info);
      })
   });

   $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');

        $.ajax({
          data: $('#categoryForm').serialize(),
          url: "{{ route('medical_test.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#categoryForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
              toastr["success"]("Medicine Inserted")
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
              toastr["error"]("Medicine Insert Failed")
          }
      });
    });

    $('body').on('click', '.deleteBook', function () {
        var id = $(this).data("id");
        $confirm = confirm("Are You sure want to delete !");
        if($confirm == true ){
            $.ajax({
                type: "DELETE",
                url: "{{ route('medical_test.store') }}"+'/'+id,
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
