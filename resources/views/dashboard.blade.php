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

    .test-button {
        width: 63px;
        height: 24px;
        border-radius: 15px;
        color: white;
        font-weight: 600;
        background-color: #6A8CAF;
        border: 0;
        font-size: 12px;
    }

    .test-text {
        color: #F68059;
        font-size: 12px;
    }
</style>
<style>
    .print-container {
        width: 560px;
        height: 280px;
        background: #FFFFFF;
        box-shadow: 0px 4px 20px rgba(148, 148, 148, 0.25);
        border-radius: 12px;
    }

    .nama {
        width: 149px;
        height: 33px;

        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-style: normal;
        font-weight: 600;
        font-size: 24px;
        line-height: 33px;
        margin-top: 10px;
        /* identical to box height */


        /* Black primary */

        color: #514B63;
    }

    .foto {
        width: 100px;
        height: 100px;

        background: url(.png), #C4C4C4;
        border-radius: 8px;
        margin-top: 28px;
        margin-left: 28px;
    }

    .nomor {
        width: 100%;
        height: 19px;

        margin-top: 8px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        /* identical to box height */


        /* Abu primary */

        color: #B0B0B0;
    }

    .email-print {
        width: 100%;
        height: 19px;

        margin-top: 8px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 19px;
        /* identical to box height */


        /* Abu primary */

        color: #B0B0B0;
    }

    .data {
        width: 100%;
        height: 16px;

        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-style: normal;
        font-weight: 600;
        font-size: 12px;
        line-height: 16px;

        /* Abu primary */

        color: #B0B0B0;
    }

    .isi {
        width: 100%;
        height: 22px;

        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 22px;
        /* identical to box height */

        display: flex;
        align-items: center;

        /* Black primary */

        color: #514B63;
    }

    .foto-visit {
        width: 38px;
        height: 38px;
        border-radius: 4px;
        background: url(.png), #C4C4C4;
    }
</style>
<div class="container print-container mt-5 d-none">
    <div class="row" id="print_page">
        <div class="col-md-6">
            <!-- <img class="chat-list-image" id="chat_guest_image"  alt="" style="width: 100%; height: 100%;"> -->
            <div class="foto">
                <img src="{{ asset('asset/icon/tes_foto.png') }}" alt="">
            </div>

            <div class="nama d-flex justify-content-start">Nabilla Izzati </div>
            <div class="nomor d-flex justify-content-start">081154653985</div>
            <div class="nomor d-flex justify-content-start">Incredible inc</div>
            <div class="email-print d-flex justify-content-start">Nabillaizzati33@gmail.com</div>
        </div>
        <div class="col-md-6">
            <div class="data d-flex justify-content-start" style="margin-top: 28px;">
                Tipe Pengunjung
            </div>
            <div class="isi d-flex justify-content-start" style="margin-top: 8px;">
                Visitor
            </div>
            <div class="data d-flex justify-content-start" style="margin-top: 24px;">
                Gedung
            </div>
            <div class="isi d-flex justify-content-start" style="margin-top: 8px;">
                Graha Kemenpora
            </div>
            <div class="data d-flex justify-content-start" style="margin-top: 24px;">
                Mengunjungi
            </div>
            <div class="row " style="margin-top: 12px;">
                <div class="col-md-2">
                    <div class="foto-visit">
                        <img src="{{ asset('asset/icon/visit.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="isi d-flex justify-content-start">
                        Santo Pantek
                    </div>
                    <div class="data d-flex justify-content-start" style="margin-top: 3px;">
                        Deputi 1
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cover-container d-flex justify-content-start mx-auto">
    <div class="" style="flex: 2;">
        @include('component.sidebar')
    </div>
    <div class="" style="flex: 10;">
        <div class="d-flex flex-column">
            @include('component.header', ['header_title' => 'Dashboard'])
            <div class="d-flex justify-content-between ml-4 mt-3">
                <div class="mr-3" style="flex: 8;border-radius: 1em;">
                    <div class="d-flex flex-column white-bg p-3" style="box-shadow: 0px 2px 15px rgba(221, 221, 221, 0.15);">
                        <div class="title-content mb-3">Daftar Kunjungan</div>
                        <table class="table table-hover table-striped" id="visitor_today_table" style>
                            <thead class="titletable">
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">TIPE</th>
                                    <th scope="col">TUJUAN</th>
                                    <th scope="col">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($guests as $guest)
                                <tr>
                                    <th scope="row">{{$guest->id}}</th>
                                    <td>{{$guest->fullname}}</td>
                                    <td>{{$guest->type}}</td>
                                    <td>{{$guest->email}}</td>
                                    <td>
                                        @if($guest->status =='pending')

                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}

                                        <div class="row pending" id="cetak">
                                            <div class="col-md-6 acc" style="color: #6A8CAF;" onclick="accept(this);">
                                                <x-feathericon-check-circle class="sidebar-icon" />
                                            </div>
                                            <div class="col-md-6" onclick="reject(this)">
                                                <x-feathericon-x-circle class="sidebar-icon" style="color: #F68059;" />
                                            </div>
                                        </div>

                                        <button class="test-button printPage d-none" href="http://127.0.0.1:8000/print">Cetak</button>
                                        <div class='test-text d-none'>
                                            Ditolak
                                        </div>
                                        @elseif($guest->status =='accepted')
                                        <button class='test-button print-page d-none' href="http://127.0.0.1:8000/print">
                                            Cetak
                                        </button>
                                        @elseif($guest->status =='rejected')
                                        <div class='test-text'>
                                            Ditolak
                                        </div>
                                        @elseif($guest->status =='')
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>TIPE</th>
                                    <th>TUJUAN</th>
                                    <th>STATUS</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="" style="flex: 2;">
                    <div class="d-flex flex-column white-bg p-3" style="box-shadow: 0px 2px 15px rgba(221, 221, 221, 0.15);">
                        <span class="title-content">Kunjungan Hari Ini</span>
                        <!-- <div class="donut" style="--first: .01; --second: .01; --third: .01; ">
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
                        </div> -->
                        <div style="float: left; position: relative;">
                            <div style="width: 100%; height: 40px; position: absolute; top: 50%; left: 0; margin-top: -20px; line-height:19px; text-align: center; z-index: 999999999999999">
                                99%<Br />
                                Total
                            </div>
                            <canvas id="chDonut1" width="400" />
                        </div>
                    </div>
                </div>
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
                // console.log(data);
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

<script type="text/javascript">
    // $(document).ready(function() {

    //     var pend = $('#cetak');

    //     pend.on('click', '.acc', function() {

    //         $tr = $(this).closest('tr');
    //         if ($($tr).hasClass('child')) {
    //             $tr = $tr.prev('.parent')
    //         }

    //         var change = pend.row($tr).change();
    //         console.log(change);

    //     });
    // })

    //print
    $('button.printPage').click(function() {
        // window.print();
        // return false;
        var prtContent = document.getElementById("print_page");
        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();

        button.classList.remove('d-none')
    });


    function accept(event) {
        var cetak = event.parentElement.classList.add('d-none')
        var button = event.parentElement.parentElement.querySelector(".test-button")
        button.classList.remove('d-none')


    }

    function reject(event) {
        // document.getElementById("cetak").innerHTML = "rejected";
        var cetak = event.parentElement.classList.add('d-none')
        var text = event.parentElement.parentElement.querySelector(".test-text")
        text.classList.remove('d-none')
    }


    // document.getElementById("cetak").addEventListener("click",aggreCheck);

    // function aggreCheck(){
    //     document.getElementById("cetak").innerHTML = "CETAK";
    // }
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