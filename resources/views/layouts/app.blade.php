<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        .blog {
            padding: 5px;
            border-bottom: 1px solid lightgrey;
        }
        small {
            color: grey;
        }
    </style>
</head>
<body>
    <header class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-auto mb-2 mb-lg-0 text-center">
                    <ul class="nav justify-content-center">
                        <li><a href="#" class="nav-link px-2 link-secondary">Beranda</a></li>
                    </ul>
                </div>
                <div class="col-12 col-lg text-center text-lg-end">
                    <button type="button" class="btn btn-outline-primary me-2">Login</button>
                </div>
            </div>
        </div>
    </header>
    <div class="container">

    @yield('content')
        
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-4 mb-0 text-body-secondary">© 2023 Company, Inc</p>

                <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
                </ul>
            </footer>
        </div>
    </body>
</html>

