<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Phri Pontianak | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- bootstrap icons --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


    <script src="https://kit.fontawesome.com/afcbaa4d62.js" crossorigin="anonymous"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">

    {{-- my style css --}}
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/sidebars.css">

    {{-- link untuk datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

    <style>
        .header {
            color: #de3226 !important;
            width: 100%;
        }

        .header h5 {
            color: #de3226 !important;
            font-size: 24px;
            margin-bottom: 5px;
        }

        #prosesModal .header {
            color: #28bf02 !important;
            width: 100%;
        }

        #prosesModal .header h5 {
            color: #28bf02 !important;
            font-size: 24px;
            margin-bottom: 5px;
        }

        #dt-search-0 {
            width: 50%;
        }

        #dt-search-1 {
            width: 50%;
        }

        .responsive {
            width: 100%;
            height: auto;
        }

        @media (max-width: 576px) {
            .carousel-item {
                background-color: transparent;
                /* Remove background color */
            }
        }

        /* General styling for all screens */
        .responsive-max-300px-container {
            height: 250px;
            width: 100%;
            /* Ensures it takes the full width of its parent container */
            /* padding: 20px; */
            /* Optional: Adds some padding for content */
            box-sizing: border-box;
            /* Ensures padding is included in element's width/height */
            background-color: #f0f0f0;
            /* Example background color */
        }

        /* Responsive styling for larger screens (optional) */
        @media (min-width: 768px) {
            .responsive-max-300px-container  {
                /* min-height: 400px; */
                /* You can increase the min-height for larger screens */
            }
        }

        /* Responsive styling for extra large screens */
        @media (min-width: 1200px) {
            .responsive-max-300px-container  {
                /* min-height: 500px; */
                /* Further adjust for very large screens */
            }
        }
    </style>
    @yield('css')
</head>

<body class="d-flex flex-column  vh-100">

    @if (!request()->is('login') && !request()->is('register') && !request()->is('pendaftaran'))
        @include('partials.topbar')
    @endif
    @include('partials.navbar')

    <div class="container main-content mt-4">
        @yield('container')
    </div>

    @if (!request()->is('login') && !request()->is('register') && !request()->is('pendaftaran'))
        @include('partials.footer')
    @endif

    {{-- modal mmenunggu --}}
    <div class="modal fade" id="menungguModal" tabindex="-1" role="dialog" aria-labelledby="menungguModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="d-flex justify-content-center align-item-center">
                    <div class="header">
                        <center>
                            <i class="fa-solid fa-hourglass-half p-3 pb-0" style="font-size: 8rem"></i>
                            <h5>Silahkan menunggu terlebih dahulu</h5>
                        </center>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="tutup('menunggu')">Baik</button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal Proses data --}}
    <div class="modal fade" id="prosesModal" tabindex="-1" role="dialog" aria-labelledby="prosesModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="d-flex justify-content-center align-item-center">
                    <div class="header">
                        <center>
                            <i class="fa-solid fa-circle-check p-3 pb-0" style="font-size: 8rem"></i>
                            <h5>Pengaduan sedang di proses</h5>
                        </center>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="tutup('proses')">Baik</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
</body>

@if (Auth::check() && Auth::user()->role_id == '2')
    <script>
        function tutup(modal) {
            $('#' + modal + 'Modal').modal('hide');
        }
        var user_id = "{{ Auth::user()->id }}"
        var pusher_key = "{{ env('PUSHER_APP_KEY') }}"
        var pusher = new Pusher(pusher_key, {
            cluster: 'ap1',
            encrypted: true
        });
        var channel = pusher.subscribe('pengaduan');
        channel.bind("App\\Events\\Feedback", function(data) {
            if (data.pengirim_id == user_id) {
                data.feedback == "pending" ? $('#menungguModal').modal('show') : $('#prosesModal').modal('show');
            }
        })
    </script>
@endif
@yield('script')

</html>
