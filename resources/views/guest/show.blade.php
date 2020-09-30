@extends ('layouts.app')

@section('id')
{{ $guest->fullname }}
@endsection
@section('content')
<style>
    .data {
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        color: #B0B0B0;
    }

    .id {
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        color: #514B63;
    }
</style>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/component.css">
<link rel="stylesheet" href="css/app.css">
<div class="cover-container d-flex justify-content-start mx-auto">
    <div class="" style="flex: 2;">
        @include('component.sidebar')
    </div>
    <div class="" style="flex: 10; background: #FAFAFA">
        <div class="d-flex flex-column">
            @include('component.header', ['header_title' => 'Riwayat > '])
            <div class="d-flex justify-content-between ml-4 mt-3">
                <div class="mr-3" style="flex: 8;border-radius: 1em;"></div>
                <div class="container-fluid" style="background: #FFFFFF;">
                    <div class="row">
                        <div class="d-inline-flex">
                            <a href="{{url("guest")}}">
                                <button class="btn">
                                    <x-feathericon-arrow-left-circle class="sidebar-icon" /></button>
                            </a>
                            <div class="d-flex align-items-center">Kembali</div>
                        </div>
                    </div>
                    <div class="row" style="background: #FFFFFF;">
                        <div class="header-guest">DATA KUNJUNGAN</div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="data" style="margin-top: 1em;">Nama Lengkap</div>
                                    <div class="id">{{ $guest->fullname }}</div>
                                    <div class="data" style="margin-top: 1em;">Perusahaan</div>
                                    <div class="id">{{ $guest->company }}</div>
                                    <div class="data" style="margin-top: 1em;">Nomor Handphone</div>
                                    <div class="id">{{ $guest->phone }}</div>
                                    <div class="data" style="margin-top: 1em;">Email</div>
                                    <div class="id mb-5">{{ $guest->email }} </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="data" style="margin-top: 1em;">Tujuan</div>
                                    <div class="id">Santo</div>
                                    <div class="data" style="margin-top: 1em;">Keperluan</div>
                                    <div class="id">{{ $guest->nesessity }}</div>
                                    <div class="data" style="margin-top: 1em;">Tipe</div>
                                    <div class="id">{{ $guest->type }}</div>
                                    <div class="data" style="margin-top: 1em;">waktu</div>
                                    <div class="id mb-5">{{ $guest->id }}</div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">Foto Pengunjung</div>
                            <img class="chat-list-image" id="chat_guest_image" src="{{ $guest->imageUrl }}" alt="" style="width: 70%; height:70%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection