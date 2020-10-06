@extends('layouts.app')

@section('content')
<style>
    .page-link{
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
</style>
<div class="cover-container d-flex justify-content-start mx-auto">
    <div class="" style="flex: 2;">
        @include('component.sidebar')
    </div>
    <div class="" style="flex: 10;">
        <div class="d-flex flex-column">
            @include('component.header', ['header_title' => 'Riwayat'])
            <div class="d-flex justify-content-between ml-4 mt-3">
                <div class="mr-3" style="flex: 8;border-radius: 1em;">
                    <div class="d-flex flex-column white-bg p-3">
                        <table class="table table-hover table-striped" id="visitor_today_table" >
                            <thead>
                                <tr style="width: 100%;">
                                    <th scope="col">NO</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">TIPE</th>
                                    <th scope="col">PERUSAHAAN</th>
                                    <th scope="col">TUJUAN</th>
                                    <th scope="col">LIHAT</th>
                                    <th scope="col">HAPUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($guests as $guest)
                                <tr>
                                    <th scope="row">{{$guest->id}}</th>
                                    <td>{{$guest->id}}</td>
                                    <td>{{$guest->fullname}}</td>
                                    <td>{{$guest->type}}</td>
                                    <td>{{$guest->email}}</td>
                                    <td><img class="chat-list-image" id="chat_guest_image" src="{{ $guest->imageUrl }}" alt="" style="width: 2em;"> {{$guest->nesessity}}</td>
                                    <td>
                                        <!-- <a href="{{url("guest/{$guest->id}")}}"> -->
                                        <!-- <button class="btn"> -->
                                        <!-- <x-feathericon-arrow-right-circle class="sidebar-icon" style="color: #75B79E;" /> -->
                                        <img src="{{ asset('asset/icon/right_icon.png') }}" alt="" style="outline: none; cursor: pointer;" onclick="showPage('{{$guest->id}}');" />
                                        <!-- </button> -->
                                        <!-- </a> -->
                                    </td>
                                    <td>
                                        <form action="{{ url("guests/$guest->id") }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn" style="outline: black; padding:0;">
                                                <img src="{{ asset('asset/icon/trash-2.png') }}" alt="" style="cursor: pointer;">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>TANGGAL</th>
                                    <th>NAMA</th>
                                    <th>TIPE</th>
                                    <th>PERUSAHAAN</th>
                                    <th>TUJUAN</th>
                                    <th>LIHAT</th>
                                    <th>HAPUS</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- <div class="" style="flex: 3;">
                    <div class="d-flex flex-column white-bg p-3">
                        <span class="title-content">Kunjungan Hari Ini</span>
                        <div class="donut" style="--first: .01; --second: .01; --third: .01; ">
                            <div class="donut__slice donut__slice__first"></div>
                            <div class="donut__slice donut__slice__second"></div>
                            <div class="donut__slice donut__slice__third"></div>
                            <div class="donut__label">
                                <div class="donut__label__heading">
                                    CSSScript.Com
                                </div>
                                <div class="donut__label__sub">
                                    Donut Chart
                                </div>
                            </div>
                        </div>
                        <div style="float: left; position: relative;">
                            <div style="width: 100%; height: 40px; position: absolute; top: 50%; left: 0; margin-top: -20px; line-height:19px; text-align: center; z-index: 999999999999999">
                                99%<Br />
                                Total
                            </div>
                            <canvas id="chDonut1" width="400"/>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function() {
        $('#visitor_today_table').DataTable();
        $('.dataTables_length').addClass('bs-select');


    });
</script>
<script>
    function showPage(id) {
        window.location.href = `/guest/${id}`;
    }
</script>
@endsection
<!-- {{--<main>
        <div class="row">
            <div class="col-md-2 pr-0">
            </div>
            <div class="col-md-7">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-6" id="page-content-wrapper">
                            <h1 class="mt-4" style="color: #75B79E;">Dashboard</h1>
                            <div class="container-fluid" style="font-family: Open Sans;font-style: normal;font-weight: bold;">
                                <h3 class="mt-5">Daftar Kunjungan</h3>
                                <table class="table">
                                    <thead>
                                        <tr style="color: #B0B0B0;">
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Tipe</th>
                                            <th scope="col">Tujuan</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody style="background: #F8FFF8;">
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                            <td>@mdo</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="background-color: white;">
                Chart
            </div>
        </div>
    </main>--}} -->