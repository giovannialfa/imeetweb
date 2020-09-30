@extends('layouts.app')
@section('content')
<div class="cover-container d-flex justify-content-start mx-auto">
    <div class="" style="flex: 2;">
        @include('component.sidebar')
    </div>
    <div class="" style="flex: 10;">
        <div class="d-flex flex-column">
            @include('component.header', ['header_title' => 'Admin'])
            <div class="d-flex justify-content-between ml-4 mt-3">
                <div class="mr-3" style="flex: 7;border-radius: 1em;">
                    <div class="d-flex flex-column white-bg p-3">
                        <table class="table table-hover table-striped" id="visitor_today_table">
                            <div class="container">
                                <div class="row">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                        Create Admin
                                    </button>
                                    @include('admin.create')
                                </div>
                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">USERNAME</th>
                                    <th scope="col">PASSWORD</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                <tr>
                                    <th>{{$admin->id}}</th>
                                    <td>{{$admin->fullname}}</td>
                                    <td>{{$admin->password}}</td>
                                    <td>
                                        <button class="btn">
                                            <x-feathericon-edit class="" style="color: #2765F0;" />
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn ">
                                            <x-feathericon-trash-2 class="sidebar-icon" style="color: #F68059;" />
                                        </button>
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
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    function createAdmin() {
        var adminFullname = document.getElementById('adminFullname').value;
        var adminId = document.getElementById('adminId').value;
        var adminPassword = document.getElementById('adminPassword').value;
        var currentBuilding = document.getElementById('currentBuilding').value;
        console.log(adminFullname + '###' + adminId + '###' + adminPassword);
        console.log(currentBuilding);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('admin.store') }}",
            type: 'POST',
            data: {
                'adminFullname': adminFullname,
                'adminId': adminId,
                'adminPassword': adminPassword,
                'building': currentBuilding,
                '_token': CSRF_TOKEN,
            },
            success: function(data) {
                console.log(data);
                window.location.href = "{{ route('admin.index') }}";
            },
            error: function(data, textStatus, errorThrown) {
                console.log(data);
                console.log(textStatus);
                console.log(errorThrown);
                console.log("ERROR");
            },
        });
    }
</script>
<!-- tambahin js
js- tiga var
isi dari var->inputan
ajax -->
@endsection