@extends('layouts.app')

@section('content')
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
                        <table class="table table-hover table-striped" id="visitor_today_table">
                            <thead>
                                <tr style="width: 100%;">
                                    <th scope="col">NO</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">TIPE</th>
                                    <th scope="col">PERUSAHAAN</th>
                                    <th scope="col">TUJUAN</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
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
                                        <a href="{{url("guest/{$guest->id}")}}">
                                            <button class="btn">
                                                <x-feathericon-arrow-right-circle class="sidebar-icon" style="color: #75B79E;" />
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ url("guests/{$guest->id}") }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn ">
                                                <x-feathericon-trash-2 class="sidebar-icon" style="color: #F68059;"/></button>
                                        </form></a>
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
        var colors = ['#6A8CAF', '#A7E9AF', '#F68059'];
        var donutOptions = {
            cutoutPercentage: 70,
            legend: {
                position: 'bottom',
                labels: {
                    pointStyle: 'circle',
                    usePointStyle: true,
                    fontSize: 15,
                }
            },
            responsive: true,
            maintainAspectRatio: false,

        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('countVisitor') }}",
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
            },
            success: function(data) {
                console.log(data);
                var chDonutData1 = {
                    labels: ['Guest', 'Hotel', 'Delivery'],
                    datasets: [{
                        backgroundColor: colors.slice(0, 3),
                        borderWidth: 0,
                        data: [data[0], data[1], data[2]]
                    }]
                };
                var chDonut1 = document.getElementById("chDonut1");
                if (chDonut1) {
                    new Chart(chDonut1, {
                        type: 'pie',
                        data: chDonutData1,
                        options: donutOptions,
                    });
                }
                // $('#guest_room').html(data);
            },
            error: function(data, textStatus, errorThrown) {
                console.log(data);
                console.log(textStatus);
                console.log(errorThrown);
                console.log("ERROR");
            },
        })

    });

    
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

