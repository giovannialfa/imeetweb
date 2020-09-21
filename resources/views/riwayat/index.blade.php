@extends('riwayat.riwayat')

@section('history')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="sidebar-wrapper" style="background-color: #F8F9FA;">
            <div class="sidebar-heading mb-5">LOGO </div>
            <div class="list-group">
                <div class="list-group">
                    <a href="http://127.0.0.1:8000/dashboard"><button class="button btn mt-5"><i class="fa fa-home"></i> Beranda</button></a>
                    <a href="http://127.0.0.1:8000/riwayat"><button class="button btn mt-5"><i class="fa fa-history"></i> Riwayat</button></a>
                    <a href="http://127.0.0.1:8000/home"><button class="button btn mt-5"><i class="fa fa-comment"></i> Chat</button></a>
                </div>
                <div class="list-group">
                    <button class="button btnexit" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-close ">
                            <span> Log out</span></i>
                        <a href="{{ route('logout') }}">
                        </a>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <h1 class="mt-4" style="color: #75B79E;">RIWAYAT</h1>
            <div class="row">
                <form action="{{ url("/riwayat")}}" class="form-inline" method="GET">
                    <div class="form-group mx-sm-3 mb-2">
                        <input value="{{Request::get('keyword')}}" name="keyword" type="text" class="form-control" placeholder="Cari Kunjungan">
                    </div>
                    <button type="submit" class="btn mb-2"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <table class="table table-stiped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>TANGGAL</th>
                        <th>NAMA</th>
                        <th>TIPE</th>
                        <th>PERUSAHAAN</th>
                        <th>TUJUAN</th>
                        <th colspan="2">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($riwayats as $riwayat)
                    <tr>
                        <td>{{$riwayat->id}}</td>
                        <td>{{$riwayat->Tanggal}}</td>
                        <td>{{$riwayat->Nama}}</td>
                        <td>{{$riwayat->Tipe}}</td>
                        <td>{{$riwayat->Perusahaan}}</td>
                        <td>{{$riwayat->Tujuan}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{url("riwayat/{$riwayat->id}/edit") }}">EDIT</a>
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{url("riwayat/{$riwayat->id}/show")}}">show </a>
                        </td>
                        <td>
                            <form action="{{ url("riwayat/{$riwayat->id}")}}" method="post">

                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection