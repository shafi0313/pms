@extends('admin.layout.master')
@section('title', 'Dashboard')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Doctord</h4>
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
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Datatables</a>
                    </li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#userModal">
                                    <i class="fa fa-plus"></i>
                                    Add Row
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th style="width:1%">SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Spesialist</th>
                                            <th>Photo</th>
                                            <th style="width:7%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th >Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $x=1;@endphp
                                        @foreach($admins as $admin)
                                        <tr>
                                            <td>{{ $x++ }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->age }}</td>
                                            <td>{{ $admin->address }}</td>
                                            <td>{{ $admin->spesialist }}</td>
                                            <td>{{ $admin->photo }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
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
</div>

<!-- Modal -->
<form id="addUser" action=""  method="post">
    @csrf
    <div class="modal fade"  id="userModal" tabindex="-1" role="dialog" aria-hidden="true" >
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
                    <button type="Submit" id="" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>


@include('sweetalert::alert')
@push('custom_scripts')

<script>
    $('#addUser').on('submit', function (e) {
        e.preventDefault();
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
    function hide(){
        document.getElementById('d').style.display ='none';
    }
    function show2(){
        document.getElementById('d').style.display = 'block';
    }
</script>
@endpush
@endsection

