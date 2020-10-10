<html lang="en">

<head>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- load jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/component.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
</head>

<body class="text-center">
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
    <div class="container print-container mt-5">
        <div class="row">
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
</body>

</html>