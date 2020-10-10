<head>
    <title>Login Receptionist</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .button {
            background: #75B79E;
            box-shadow: 2px 4px 6px rgba(173, 225, 205, 0.53);
            border-radius: 34px;
            width: 160px;
            height: 45px;
            left: 560px;
            top: 478px;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-style: normal;
            font-weight: bold;
            font-size: 12px;
            color: #FFFFFF;
        }
    </style>
</head>


<body class="text-center" style="background: #fafbfd;">
    <div class="cover-container centervh">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="welcome align-item-center mb-5" >WELCOME!</div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row align-item-center" style="border-radius: 4px;">
                            <div class="col-md-2">
                                <svg width="40px" height="40px" viewBox="0 0 16 16" class="bi bi-person" fill="black" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                </svg>
                            </div>


                            <div class="col-md-10 align-item-center">
                                <label for="inputAdminId" class="sr-only">{{ __('AdminId Address') }}</label>
                                <input id="inputAdminId" type="text" class="form-control @error('adminId') is-invalid @enderror" placeholder="AdminId" name="adminId" value="{{ old('adminId') }}" required autocomplete="adminId" autofocus>

                                @error('adminId')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row align-item-center" style=" border-radius: 4px;">
                            <div class="col-md-2">
                                <svg width="40px" height="40px" viewBox="0 0 16 16" class="bi bi-lock" fill="black" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z" />
                                </svg>
                            </div>
                            <div class="col-md-10 align-item-center">
                                <label for="password" class="sr-only">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                            <div class="col align-self-center">
                                <button class="button" type="submit">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <!-- <div>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>