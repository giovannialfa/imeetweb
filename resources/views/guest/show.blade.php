@extends ('layouts.app')

@section('id')
{{ $guest->fullname }}
@endsection
@section('content')
<style>
    .data {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-style: normal;
        font-weight: normal;
        color: #B0B0B0;
    }

    .id {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-style: normal;
        font-weight: normal;
        color: #514B63;
    }

    .kembali {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-style: normal;
        font-weight: 600;
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
            <div class="d-inline-flex ml-3 mt-2">
                <a href="{{url("guest")}}">
                    <button class="btn">
                        <x-feathericon-arrow-left  />
                    </button>
                </a>
                <div class="d-flex align-items-center kembali">Kembali</div>
            </div>
            <div class="d-flex justify-content-between ml-4 mt-3">
                <div class="mr-3" style="flex: 7;border-radius: 1em;">
                    <div class="d-flex flex-column white-bg p-3">
                        <div class="title-content mb-3">Data Kunjungan</div>
                        <div class="d-flex flex-row bd-highlight mb-2">
                            <div class="p-2 bd-highlight" style="margin-right: 40%;">
                                <div class="data" style="margin-top: 1em;">Nama Lengkap</div>
                                <div class="id">{{ $guest->fullname }}</div>
                                <div class="data" style="margin-top: 1em;">Perusahaan</div>
                                <div class="id">{{ $guest->company }}</div>
                                <div class="data" style="margin-top: 1em;">Nomor Handphone</div>
                                <div class="id">{{ $guest->phone }}</div>
                                <div class="data" style="margin-top: 1em;">Email</div>
                                <div class="id">{{ $guest->email }} </div>
                                <div class="data" style="margin-top: 1em;">Tujuan</div>
                                <div class="id">Santo</div>
                                <div class="data" style="margin-top: 1em;">Keperluan</div>
                                <div class="id">{{ $guest->nesessity }}</div>
                            </div>
                            <div class="p-2 bd-highlight ">
                                <div class="data" style="margin-top: 1em;">Tipe</div>
                                <div class="id">{{ $guest->type }}</div>
                                <div class="data" style="margin-top: 1em;">waktu</div>
                                <div class="id mb-5">{{ $guest->id }}</div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="" style="flex:3;">
                    <div class="d-flex flex-column white-bg p-3">
                        <div class="title-content mb-3">Foto Kunjungan</div>
                        <img class="chat-list-image" id="chat_guest_image" src="{{ $guest->imageUrl }}" alt="" style="width: 100%; height: 100%;">
                    </div>
                </div>
                <!-- <div class="container-fluid" style="background: #FFFFFF;">
                    <div class="row" style="background-color: #FAFAFA">
                        <div class="d-inline-flex">
                            <a href="{{url("guest")}}">
                                <button class="btn">
                                    <x-feathericon-arrow-left-circle class="sidebar-icon" />
                                </button>
                            </a>
                            <div class="d-flex align-items-center kembali">Kembali</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="header-guest">DATA KUNJUNGAN</div>
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
                        <div class="col-md-1" style="color: #514B63; width:100%; height:100%;">

                        </div>
                        <div class="col-md-5">
                            <div class="mb-4 id">Foto Pengunjung</div>
                            <img class="chat-list-image" id="chat_guest_image" src="{{ $guest->imageUrl }}" alt="" style="width: 70%; height:70%;">
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection