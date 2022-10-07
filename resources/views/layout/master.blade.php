<!DOCTYPE html>
<html lang="en-GB">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('meta_title')</title>
    <meta name="description" content="@yield('meta_description')" />
    <link rel="canonical" href="@yield('canonical')">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta itemprop="name" content="@yield('meta_title')">
    <meta itemprop="description" content="@yield('meta_description')">


    <meta property="og:type" content="website">

    <meta property="og:title" content="@yield('meta_title')" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@Site Title" />
    <meta name="twitter:title" content="@yield('meta_title')" />

    <meta property="og:description" content="@yield('meta_description')" />
    <meta name="twitter:description" content="@yield('meta_description')" />

    <meta property="og:url" content="@yield('canonical')" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />




    <!-- Web Application Manifest -->
    <link rel="manifest" href="/manifest.json">
    <!-- Chrome for Android theme color -->
    <meta name="theme-color" content="#bedcfb">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="M4FM">
    <link rel="icon" sizes="384x384" href="{{ asset('/img/icons/icon-384x384.png?v=2.6') }}">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="M4FM">
    <link rel="apple-touch-icon" href="{{ asset('/img/icons/apple-touch-icon.png?v=2.6') }}">

    <!-- Tile for Win8 -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('/img/icons/apple-touch-icon.png?v=2.6') }}">

    <script>
        // Initialize the service worker
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/serviceworker.js', {
                scope: '.'
            }).then(function(registration) {
                // Registration was successful
                //  console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
            }, function(err) {
                // registration failed :(
                //  console.log('Laravel PWA: ServiceWorker registration failed: ', err);
            });
        }
    </script>

    <!-- Font Awsome -->
    <script src="https://kit.fontawesome.com/bbcc34f546.js" crossorigin="anonymous"></script>
    <!-- Flat Picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        .swal2-container {
            z-index: 9999999 !important;
        }
    </style>

    @section('script_css')

    @show
</head>

<body class="@yield('bodyClass')">

    @include('layout.header')
    @include('layout.alert-messages')
    @yield('content')
    @include('layout.footer')

    <!-- Jquery -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Flat picker -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(".flat-picker").flatpickr({

        });
    </script>
    <!-- Select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select-2').select2({

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#search_input").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#developer_tb tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <!-- input mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8-beta.17/jquery.inputmask.min.js" integrity="sha512-zdfH1XdRONkxXKLQxCI2Ak3c9wNymTiPh5cU4OsUavFDATDbUzLR+SYWWz0RkhDmBDT0gNSUe4xrQXx8D89JIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(".sort-code").inputmask("99-99-99");
        $(".national-insurance-number").inputmask("AA 99 99 99 A");
    </script>

    <!-- Bootstrap custom file input -->
    <script>
        $('.custom-file-input').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>

    @yield('footer_scripts')
    @stack('scripts')
</body>

</html>