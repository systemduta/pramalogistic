<!DOCTYPE html>
<html lang="zxx">
<!--<![endif]-->
<!-- Begin Head -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=3.0">
    <title>Prama Logistic</title>
    <!-- Favicons -->
    <link href="{{ url('assets/img/segitiga.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="{{ url('assets/css/font.css') }}" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/floating-wpp.css') }}" rel="stylesheet">

    <script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>
    @stack('add_header')
</head>

<body>
    <!-- Preloader Box -->
    <!-- Main Wraapper -->
    <div class="main_wrapper">
        <!-- Header Start -->
        <header id="header" class="fixed-top">
            @include('temp.header')
        </header>
        @yield('content')
        <footer>
            @include('temp.footer')
        </footer>
    </div>

    <!-- GO To Top -->
    <div id="preloader"></div>
    <div class="floating-wpp"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</body>
<!-- Vendor JS Files -->

<script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ url('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ url('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ url('assets/vendor/counterup/counterup.min.js') }}"></script>
<script src="{{ url('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ url('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ url('assets/vendor/venobox/venobox.min.js') }}"></script>
<script src="{{ url('assets/vendor/aos/aos.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ url('assets/js/main.js') }}"></script>
<script src="{{ url('assets/js/floating-wpp.js') }}"></script>
<script src="{{ url('assets/js/pesan.js') }}"></script>
@stack('add_footer')
<script>
    $('.floating-wpp').floatingWhatsApp({

        // phone number
        phone: '+6282228686427',

        // message to send
        message: '',

        // icon size
        size: '40px',

        // background color
        backgroundColor: '#25D366',

        // or right
        position: 'right',

        // message in popup
        popupMessage: 'Ada yang Bisa Kami Bantu ?',

        // show a chat popup on hover
        showPopup: true,

        // show on IE
        showOnIE: true,

        // in milliseconds
        autoOpenTimer: 0,

        // header color
        headerColor: '#128C7E',

        // header title
        headerTitle: 'Chat Dengan Kami di WhatsApp!',

        // z-index property
        zIndex: 0,

       });

</script>

</html>
