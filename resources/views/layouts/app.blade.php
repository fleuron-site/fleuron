

<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <meta name="description" content="" />

        <meta name="author" content="" />

        @if(request()->url() == route('login'))

            <title>{{ __('Connexion') }}</title>

        @elseif(request()->url() == route('register'))

            <title>{{ __('Inscription') }}</title>

        @else

            <title>{{ __('Accueil')}}</title>

        @endif

        <link href="{{ asset('css/V2/styles.css') }}" rel="stylesheet" />

        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}" />

        <link href="{{ asset('css/V2/admin.css') }}" rel="stylesheet" />

        

        <style>

            .cke_notification_warning{

            display: none!important;

        }

        </style>

        

        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link href="https://cdn-cadremploi.carriere.fcms.io/assets/dist/detailOffre-5ba92daf.css" rel="stylesheet" />

    

    

        <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>

    </head>

    <body class="nav-fixed">

        @include('layouts.header')

        

        <div id="layoutSidenav">

            @include('layouts.navigation')

            <div id="layoutSidenav_content">

                <main>

                    @yield('content')

                </main>

                @include('layouts.V2.footer')

            </div>

        </div>

        

        @include('layouts.V2.scripts')        

        <script src="assets/demo/chart-bar-demo.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>

        <script src="js/datatables/datatables-simple-demo.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>

        <script src="js/litepicker.js"></script>



        <script src="https://assets.startbootstrap.com/js/sb-customizer.js"></script>

</body>

</html>

