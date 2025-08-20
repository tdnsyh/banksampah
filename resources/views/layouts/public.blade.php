<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Default') - Banksampah</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    @stack('style')
</head>

<body>

    <div class="kontn">
        <div class="usu">
            @yield('content')
        </div>
        <div class="p-6 text-center container">
            <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
                    class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a
                    href="https://themewagon.com">ThemeWagon</a></p>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    @stack('script')
</body>

</html>
