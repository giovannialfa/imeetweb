@extends('layouts.app')
@section('content')
<style>
    .page-link {
        color: #44BBA0;
        background: #FFFFFF;
        border-color: #dee2e6
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #44BBA0;
        background-color: #ffffff;
        border-color: #dee2e6
    }

    .btn-modal {
        border-radius: 34px;
        width: 120px;
        height: 45px;
    }
</style>
<!-- Create Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="box-shadow: 0px 6px 15px rgba(172, 172, 172, 0.15);">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content form-modal">
            <form action="{{ action('AdminController@store') }}" method="POST">

                {{ csrf_field() }}
                <div class="modal-body form-modal">
                    <div class="form-group">
                        <label style="display: flex;">Fullname</label>
                        <input type="text" name="fullname" class="form-control" placeholder="Fullname" required>
                    </div>
                    <div class="form-group">
                        <label style="display: flex;">AdminId</label>
                        <input type="number" name="adminId" class="form-control" placeholder="Admin Id" required>
                    </div>
                    <div class="form-group">
                        <label style="display: flex;">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-modal btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn-modal" style="background: #44BBA0; color:white;">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Create Modal -->

<!-- EDIT Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content form-modal">
            <form action="/admin" method="POST" id="editForm">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="modal-body form-modal" style="margin-top: auto;">
                    <div class="form-group">
                        <label style="display: flex;">Fullname</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Fullname">
                    </div>
                    <div class="form-group">
                        <label style="display: flex;">AdminId</label>
                        <input type="number" name="adminId" id="adminId" class="form-control" placeholder="Admin Id">
                    </div>
                    <div class="form-group">
                        <label style="display: flex;">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-modal btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-modal btn-primary">Edit Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End EDIT Modal -->
<!-- DELETE Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content form-modal">
            <form action="/admin" method="POST" id="deleteForm">

                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="modal-header">
                    Hapus Data
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_method" value="DELETE">
                    Apakah anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-modal btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-modal btn-primary">YA</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End DELETE Modal -->
<div class="cover-container d-flex justify-content-start mx-auto">
    <!-- @if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif -->
    <div class="" style="flex: 2;">
        @include('component.sidebar')
    </div>
    <div class="" style="flex: 10;">
        <div class="d-flex flex-column">
            @include('component.header', ['header_title' => 'Admin'])
            <div class="d-flex justify-content-between ml-4 mt-3">
                <div class="mr-3" style="flex: 7;border-radius: 1em;">
                    <div class="d-flex flex-column white-bg p-3" style="box-shadow: 0px 2px 15px rgba(221, 221, 221, 0.15);">
                        <table class="table table-hover table-striped" id="visitor_today_table datatable">
                            <div class="container">
                                <div class="row d-flex flex-row-reverse mb-3">
                                    <!-- Button trigger modal -->
                                    <button type="button " class="btn  btn-success sidebar-text" data-toggle="modal" data-target="#exampleModalCenter" style="border-radius: 5em; box-shadow: 2px 4px 6px rgba(173, 225, 205, 0.53);">
                                        <x-feathericon-plus style="color: #FFFFFF;" />
                                        Tambah Admin
                                    </button>
                                    <table id="datatable" class="table table-hover table-striped" id="visitor_today_table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col d-none">ID</th>
                                                <th scope="col">NAMA</th>
                                                <th scope="col">ADMIN ID</th>
                                                <th scope="col">PASSWORD</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th scope="col d-none">ID</th>
                                                <th scope="col">NAMA</th>
                                                <th scope="col">ADMIN ID</th>
                                                <th scope="col">PASSWORD</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($adms as $admin)
                                            <tr>
                                                <th scope="d-none">{{ $admin->id }}</th>
                                                <td>{{ $admin->fullname }}</td>
                                                <td>{{ $admin->adminId }}</td>
                                                <td>{{ $admin->password }}</td>
                                                <td>
                                                    <a href="#" class="btn  edit">
                                                        <x-feathericon-edit class="sidebar-icon" style="color: #2765F0;" />
                                                    </a>
                                                    <a href="" class="btn delete">
                                                        <x-feathericon-trash-2 class="sidebar-icon" style="color: #F68059;" />
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        var table = $('#datatable').DataTable();

        // <!-- Edit -->
        table.on('click', '.edit', function() {

            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent')
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#fullname').val(data[1]);
            $('#adminId').val(data[2]);
            $('#password').val(data[3]);

            $('#editForm').attr('action', '/admin/' + data[0]);
            $('#editModal').modal('show');
        });

        // Delete
        table.on('click', '.delete', function() {

            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent')
            }

            var data = table.row($tr).data();
            console.log(data);

            // $('#id').val(data[0]);

            $('#deleteForm').attr('action', '/admin/' + data[0]);
            $('#deleteModal').modal('show');
        });

    });
</script>
@endsection