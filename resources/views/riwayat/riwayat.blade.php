<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* .btn {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 33px;
            border: none;
            color: black;
            font-size: 16px;
            cursor: pointer;
        } */

        .btnexit {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 33px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            background-color: white;
            margin-top: 320px;
        }

        .btnexit span {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 33px;
            border: none;
            color: black;
            font-size: 16px;
            cursor: pointer;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .btnexit:hover {
            color: #CE2020;
        }

        /* Darker background on mouse-over */
        .btn:hover .btn:focus {
            background: rgba(167, 233, 175, 0.1);
        }

        .btn:focus {
            color: #75B79E;
        }
    </style>
</head>

<body>
    <div id="app">
        <main class="py-4">
            @yield('history')
        </main>
    </div>
</body>

</html>