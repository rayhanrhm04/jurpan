<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l;j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-N9SCB9L');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Juraganpanel.com' }}</title>
    <meta name="description" content="{{ $meta_description ?? '' }}">
    <meta name="keyword" content="{{ $meta_keywords ?? '' }}">
    <meta name="author" content="Juraganpanel">
    <link rel="shortcut icon" href="{{ asset('assets/landing/images/favicon.ico') }}">
    <link href="{{ asset('assets/landing/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing/css/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
    <script src="{{ asset('assets/landing/js/jquery.min.js') }}"></script>
    <style>.bg-img { background: url('{{ asset('assets/images/d.jpg') }}') center center; background-repeat: no-repeat; background-size: cover; }</style>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N9SCB9L" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom navbar-default navbar-light navbar-custom-dark bg-trans sticky">
        <div class="container">
            <a class="navbar-brand logo" href="{{ url('/') }}">
                <span class="logo logo-white" style="color: #fff;">{{ config('app.name') }}</span>
                <span class="logo logo-dark" style="color: #000;">{{ config('app.name') }}</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="nav navbar-nav ml-auto navbar-center">
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link scroll">Halaman Utama</a></li>
                    <li class="nav-item"><a href="{{ url('/juraganfess') }}" class="nav-link scroll">Tools Twitter</a></li>
                    <li class="nav-item"><a href="{{ url('/sobatcash') }}" class="nav-link scroll">Web Topup Game</a></li>
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link scroll">Masuk</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link scroll">Daftar</a></li>
                    <li class="nav-item"><a href="{{ url('/page/services') }}" class="nav-link scroll">Layanan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-dark footer-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <h5>Sitemap</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('login') }}">Masuk</a></li>
                        <li><a href="{{ route('register') }}">Daftar</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-one-alt">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="m-b-0 font-13 copyright">Copyright © {{ date('Y') }} {{ config('app.name') }}</p>
                    </div>
                    <div class="col-sm-6">
                        <ul class="list-inline footer-social-one m-b-0 font-13 float-right">Page Load: {{ number_format(microtime(true) - LARAVEL_START, 4) }}s</ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/landing/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/landing/js/typed.js') }}"></script>
    <script src="{{ asset('assets/landing/js/jquery.app.js') }}"></script>
    <script>
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll >= 50) {
                $(".sticky").addClass("is-sticky");
            } else {
                $(".sticky").removeClass("is-sticky");
            }
        });
        $(document).ready(function() {
            $(".typed").each(function() {
                var $this = $(this);
                $this.typed({
                    strings: $this.attr('data-elements').split(','),
                    typeSpeed: 100,
                    backDelay: 1000
                });
            });
        });
    </script>
</body>

</html>
