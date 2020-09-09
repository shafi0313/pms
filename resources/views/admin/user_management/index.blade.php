@extends('admin.layout.master')
@section('title', 'Dashboard')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Admin User Manegement</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Admin User Table</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Admin User Table</h4>
                            <a class="btn btn-primary btn-round ml-auto" href="{{route('users.create')}}">
                                    <i class="fa fa-plus"></i>
                                    Add
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

{{-- <div class="display table table-striped table-hover userTbl"></div> --}}
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th style="width:6%">SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Photo</>
                                            <th class="no-sort" style="width:5%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Photo</>
                                            <th style="display: none">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $x=1;@endphp
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $x++ }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{($user->role == 1) ? 'Admin':'Counter'}}</td>
                                            <td>{{ $user->age }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->photo }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>

                                                    <a href="admin/users/destroy/{{$user->id}}" data-toggle="tooltip" title="" class="btn btn-link btn-danger delete" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- Modal -->
<form id="addUser" action=""  method="post">
    @csrf
    <div class="modal fade"  id="userModal" tabindex="-1" role="dialog" aria-hidden="true" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                        New</span>
                        <span class="fw-light">
                            Row
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <label>Select Category</label><br>
                                    <label class="form-radio-label">
                                        <input class="form-radio-input" type="radio" name="role" value="1" checked="" onclick="hide();">
                                        <span class="form-radio-sign">Admin</span>
                                    </label>
                                    <label class="form-radio-label ml-3">
                                        <input class="form-radio-input" type="radio" name="role" value="2" onclick="hide();">
                                        <span class="form-radio-sign">Counter</span>
                                    </label>
                                    <label class="form-radio-label ml-3">
                                        <input class="form-radio-input" id="3" type="radio" name="role" onclick="show2();">
                                        <span class="form-radio-sign">Doctor</span>
                                    </label>
                                </div>
                            </div>

                            <div id="d" class="col-sm-6" style="display: none">
                                <div class="form-group">
                                    <label for="specialist">Specialist</label>
                                    <select class="form-control" id="specialist">
                                        <option value="3">Doctor</option>
                                        <option value="2">Counter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input id="name" name="name" type="text" class="form-control" placeholder="Enter Name">
                                </div>
                            </div>

                            <div class="col-md-8 pr-0">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="" name="email" type="text" class="form-control" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input id="" name="age" type="text" class="form-control" placeholder="Enter Age">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input id="name" name="address" type="text" class="form-control" placeholder="Enter Address">
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="" name="password" type="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confrim Password</label>
                                    <input id="" name="password_confirmation" type="password" class="form-control" >
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>


@include('sweetalert::alert')
@push('custom_scripts')

<script>
readUser();

    $('#addUser').on('submit', function () {
        // e.preventDefault();
        form = $(this);
        let modal = $('#userModal');
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function (msg) {
            $("form").trigger("reset");
            modal.modal('hide');
                if (msg == 1){
                    modal.modal('hide');
                    toast('Insert Successful!','success');

                $("form").trigger("reset");
                }else {
                    modal.modal('hide');
                    toast('Insert Successful!','success');
                    $("form").trigger("reset");
                }
                // readUser();
                console.log(msg);
            }
        });
    });

// function readUser() {
//     $.ajax({
//         url: "{{}}",
//         method: 'get',
//         success: function (data) {
//             data = $.parseJSON(data);
//             if (data.status == 'success') {
//                 $('.userTbl').html(data.html);
//             }

//         }
//     });
// }
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
                    var select = $('<select class="form-control form-control-sm"><option value=""></option></select>')
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

<script>
    function hide(){
        document.getElementById('d').style.display ='none';
    }
    function show2(){
        document.getElementById('d').style.display = 'block';
    }
</script>
@endpush
@endsection
{{-- < script >

$('#payg_form').on('submit', function (e) {
    e.preventDefault();
    form = $(this);
    if (checForm(form)) {
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function (msg) {
                if (msg == 1) {
                    toast('success', 'Insert Successful');
                    $("form").trigger("reset");
                } else {
                    toast('error', 'Something is wrong');
                    $("form").trigger("reset");
                }
                readPayg();
            }
        });
    } else {
        toast('error', 'Something is wrong');
    }
});

function readPayg() {
    let client_id = "{{$client->id}}";
    let period_id = "{{$period->id}}";
    let form = $("form");
    $.ajax({
        url: "{{route('payg.index')}}",
        method: 'get',
        data: {
            client_id: client_id,
            period_id: period_id
        },
        success: function (msg) {
            msg = $.parseJSON(msg);
            if (msg.status == 'success') {
                if (msg.data['percent'] !== '') {
                    form.find("#payg_percenttige").val(msg.data['percent']);
                }
                if (msg.data['amount'] !== '') {
                    form.find("#payg_amount").val(msg.data['amount']);
                }
            }
        }
    });
}
$(function () {
    $("#datepicker").keyup(function () {
        let date = $("#datepicker").val();
        let startDate = $("#startDate").val();
        let endDate = $("#endDate").val();
        if (date.length >= 10) {
            if (startDate <= date && endDate >= date) {
                console.log('In Between');
            } else {
                $('#taxMsg').show().html('Date Must between ' + startDate + ' TO ' + endDate);
                console.log('In NOt Between');
            }
        } else {
            $('#taxMsg').hide();
        }
    });
    readData();
    readPayg()

    $('#fueltaxform').on('submit', function (e) {
        e.preventDefault();
        form = $(this);
        if (checForm(form)) {
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                success: function (msg) {
                    if (msg == 1) {
                        toast('success', 'Insert Successful');
                        $("form").trigger("reset");
                    } else {
                        toast('error', 'Something is wrong');
                        $("form").trigger("reset");
                    }
                    readData();
                    console.log(msg);
                }
            });
        } else {
            toast('error', 'Something is wrong');
        }
    });
});

function checForm(form) {
    let inputList = form.find('input');
    for (let i = 0; i < inputList.length; i++) {
        if (inputList[i].value === '' || inputList[i].value === null ||
            inputList[i].value === ' ') {
            return false;
        } else {
            return true;
        }
    }
}

function readData() {
    let client_id = "{{$client->id}}";
    let period_id = "{{$period->id}}";
    $.ajax({
        url: "{{route('fuel.index')}}",
        method: 'get',
        data: {
            client_id: client_id,
            period_id: period_id
        },
        success: function (data) {
            data = $.parseJSON(data);
            if (data.status == 'success') {
                $('.itrTable').html(data.html);
            }
        }
    });
}

function toast(status, header, msg) {
    // $.toast('Here you can put the text of the toast')
    Command: toastr[status](header, msg)
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
} <
/script> --}}

