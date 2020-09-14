@extends('admin.layout.master')
@section('title', 'Doctor Specialist')
@section('content')
<?php //$p = 'ds'; ?>
<?php $p = 'tools'; ?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                    <a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Doctor Specialist</ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Doctor Specialist Table</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="javascript:void(0)" id="createSpecialist"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover data-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 6%">No</th>
                                            <th>Specialist</th>
                                            <th>Details</th>
                                            <th style="text-align:center;width:80px" >Action</th>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="specialistForm" name="specialistForm" class="form-horizontal">
                   <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="specialist" class="col-sm-2 control-label">Specialist</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="specialist" name="specialist" placeholder="Enter Specialist" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Details</label>
                        <div class="col-sm-12">
                            <textarea id="details" name="details" required="" placeholder="Enter Details" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
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
        ajax: "{{ route('specialist.index') }}",
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
</script>

<script>
// // var aurl = '{{ url('admin') }}';
// var _modal = $('#modal');
// var addBtn = $('#addBtn');

// function reset() {
//     _modal.find('input').each(function () {
//         $(this).val(null)
//     });
// }

// function create() {
//     _modal.find('.modal-title').text('Add Sepecialist');
//     reset();
//     $("#updateBtn").hide();
// }


// $('#createe').onclick(function(){
//     _modal.find('.modal-title').text('Add Sepecialist');
//     reset();
//     $("#updateBtn").hide();

// })

// $('#addUser').on('submit', function (e) {
//     e.preventDefault();
//     form = $(this);
//     let modal = $('#userModal');
//     $.ajax({
//         url: {{ route('specialist.store') }},
//         method: form.attr('method'),
//         data: form.serialize(),
//         success: function (msg) {
//             _modal.find('.modal-title').text('Add Sepecialist');
//             // reset();
//             $("#updateBtn").hide();

//             $("form").trigger("reset");
//             modal.modal('hide');
//             if (msg == 1) {
//                 modal.modal('hide');
//                 toast('Insert Successful!', 'success');

//                 $("form").trigger("reset");
//             } else {
//                 modal.modal('hide');
//                 toast('Insert Successful!', 'success');
//                 $("form").trigger("reset");
//             }
//         }
//     });
// });


// function store(){
//     // if(!confirm('Are u s')) return;
//     $.ajax({
//         method: 'POST',
//         url: form.attr('action'),
//         data: form.serialize(),
//         dataType: 'JSON',
//         success: function (){
//             console.log('insesf')
//             reset()
//             // _modal.modal('hide')
//             // getRecord();
//             toastr["success"]("Inconceivable!")
//         }
//     })
// }

// function store() {
//     $.ajax({
//         url: form.attr('action'),
//         method: form.attr('method'),
//         data: form.serialize(),
//         success: function (msg) {
//             $("form").trigger("reset");
//             modal.modal('hide');
//             if (msg == 1) {
//                 modal.modal('hide');
//                 $("form").trigger("reset");
//             } else {
//                 modal.modal('hide');
//                 $("form").trigger("reset");
//             }
//         }
//     });
// }

    // function getData(idName, id) {
    //         $.ajax({
    //             url: ,
    //             method: 'get',
    //             data: {
    //                 id: id
    //             },
    //             success: function(e) {
    //                 e = $.parseJSON(e);
    //                 if (e.status === 'success') {
    //                     if (idName === 'update') {
    //                         let modal = $('#editModal');
    //                         let form = modal.find('.form');
    //                         form.find('#id').val(e.data['id']);
    //                         form.find('#specialist').val(e.data['specialist']);
    //                         form.find('#details').val(e.data['details']);
    //                         modal.modal('show');
    //                         // console.log(form.html());
    //                     } else if (idName === 'delete') {
    //                         let modal = $('#deleteModal');
    //                         let form = modal.find('.form');
    //                         form.find('#deleteId').val(e.data['id']);
    //                         modal.modal('show');
    //                     }
    //                 }
    //             }
    //         });
    //     }
    </script>

{{-- Delete  --}}
{{-- <script>
    $('.delete-confirm').on('click', function (event) {
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
</script> --}}

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

