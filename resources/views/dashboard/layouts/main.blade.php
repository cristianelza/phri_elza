<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Phri Pontianak</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- bootstrap icons --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- link untuk datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">

    {{-- my style css --}}
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/sign-in.css">
    <link rel="stylesheet" href="/css/sidebars.css">
    {{-- <link rel="stylesheet" href="/css/navbars.css"> --}}
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/icons.css">
    <link rel="stylesheet" href="/css/icons.min.css">
    <link rel="stylesheet" href="/css/icons.min.css.map">

    

</head>

<style>
    html,
    body {
        margin: 0;
        height: 100vh !important;
    }

    #dt-search-0 {
        width: 50%;
    }

    * {
        box-sizing: border-box;
    }

    body {
        background-color: #f1f1f1;

    }

    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        font-family: Raleway;
        padding: 40px;
        width: 70%;
        min-width: 300px;
    }

    h1 {
        text-align: center;
    }

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    button {
        background-color: #04AA6D;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #04AA6D;
    }

    div.scrollmenu {
        overflow: auto;
        white-space: nowrap;
    }

    div.scrollmenu a {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px;
        text-decoration: none;
    }

    * {
        box-sizing: border-box;
    }

    input[type=text],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    input[type=submit] {
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row::after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }
    
</style>

<body>

    @include('dashboard_pusat.layouts.header')

    <div class="container-fluid h-100" style="padding-left: 0.75rem">
        <div class="row h-100">

            @include('dashboard_pusat.layouts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('container')

            </main>
        </div>
    </div>

    <div class="modal fade pengaduanModal" id="exampleModalLong" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">PENGADUAN BARU!!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <h3>Pengaduan baru dari <span id="nama"></span></h3>
                        <img class="logo" src="{{ asset('img/phri.jpg') }}" alt="">
                        <h1 class="jenis text-danger" style="font-size: 4rem;">PERAMPOKAN</h1>
                        <h1 class="alamat">Alamat : </h1>
                        <h5>Harap segera ditindaklanjuti</h5>
                        <p class="deskripsi"></p>
                        <button class="btn btn-danger menunggu">Menunggu</button>
                        <button class="btn btn-warning proses">Proses</button>
                        <input type="hidden" id="hidden_id">
                        <input type="hidden" id="laporan_id">
                    </center>

                </div>
                {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    {{-- <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.dataTables.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.dataTables.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

    {{-- table Js --}}
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    @yield('script')
    @yield('scripts')
    @if (Auth::check() && Auth::user()->role_id == '3')
        <script>
            $(document).ready(function() {
                // $('.pengaduanModal').modal('show');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
            window.onload = function() {
                var context = new AudioContext();
                Swal.fire({
                    title: 'Perhatian',
                    text: 'Alarm akan berbunyi jika ada pengaduan baru',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Oke',
                    cancelButtonText: 'Tutup'
                }).then((result) => {
                    if (result.isConfirmed) {
                        context.resume().then(() => {
                            console.log('Playback resumed successfully');
                        });
                    }
                })
            }

            function play() {
                var audio = new Audio('{{ asset('audio/alarm.mp3') }}');
                audio.play();
            }
            var pusher_key = "{{ env('PUSHER_APP_KEY') }}"
            var pusher = new Pusher(pusher_key, {
                cluster: 'ap1',
                encrypted: true
            });
            var channel = pusher.subscribe('pengaduan');
            channel.bind("App\\Events\\Pengaduan", function(data) {
                play();
                $('.pengaduanModal').modal('show');
                $('#nama').text(data.pengirim);
                $('.jenis').text(data.kelompok);
                $('.alamat').text('Alamat : ' + data.alamat);
                $('#hidden_id').val(data.pengirim_id);
                $('#laporan_id').val(data.laporan_id);
                $('.deskripsi').text(data.deskripsi);
                $('.logo').attr('src', `{{ asset('${data.logo}') }}`);
            })
            $(document).on('click', '.menunggu', function(e) {
                e.preventDefault();
                var id = $('#hidden_id').val();
                $.ajax({
                    url: '/dashboard/' + id + '/menunggu',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(res) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Pengaduan berhasil diubah menjadi menunggu!',
                            icon: 'success'
                        });
                        $('.pengaduanModal').modal('hide');
                    }
                })
            })
            $(document).on('click', '.proses', function(e) {
                $('.pengaduanModal').modal('hide');
                let laporan_id = $('#laporan_id').val();
                $('#id').val(laporan_id);

                var now = new Date();
                now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                $('#terima_pengaduan').val(now.toISOString().slice(0, 16));
                $('#terima').attr('data-action', '/dashboard/terima/' + laporan_id);
                $('#pengaduan_terima').modal('show');
            })
        </script>
    @endif
</body>


</html>
