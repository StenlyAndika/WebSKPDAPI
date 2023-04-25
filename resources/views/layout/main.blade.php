<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Website Resmi Pemerintah Kota Sungai Penuh">
    <meta name="keywords" content="Sungaipenuhkota, Sungai Penuh, sungaipenuhkota.go.id">
    <meta name="author" content="Pemerintah Kota Sungai Penuh">

    <link rel="icon" href="/img/tablogo.webp">
    <title>{{ $title }}</title>

    <!-- Vendor CSS STYLE -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/vendor/aos/aos.css">
    <link rel="stylesheet" href="/vendor/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/vendor/animated-text/animated-text.css">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/news-ticker.css">
</head>
<body>

    @include('partials.header')
    
    <div class="row custom-container">
        @if (
            Request::is('/') || 
            Request::is('menu-pemerintahan*') ||
            Request::is('login')
            )
            @yield('container')
        @else
            @include('partials.news')
            @yield('container')
            @include('partials.widget')
        @endif
    </div>
    
    @include('partials.footer')
    
    <!-- Vendor JS Files -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="/vendor/aos/aos.js"></script>
    <script src="/vendor/owl-carousel/owl.carousel.min.js"></script>
    <script src="/vendor/marquee/jquery.marquee.min.js" type="text/javascript"></script>
    <script src="/vendor/animated-text/animated-text.js"></script>
    <script src="/js/main.js"></script>
    
    @include('sweetalert::alert')

    <script>
        $(document).ready(function() {
            $('.marquee').marquee({
                speed: 60
            });
        
            $(".news-carousel").owlCarousel({
                autoplay:true,
                autoplayTimeout:5000,
                loop:true,
                margin:10,
                lazyLoad: true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
            });

            $(".panel-carousel").owlCarousel({
                autoplay:true,
                autoplayTimeout:5000,
                loop:true,
                lazyLoad: true,
                items:1
            });

            $('.owl-dots').remove();

            $('#datatable').DataTable({
                pageLength : 20,
                lengthMenu: [[20, 40, 60, -1], [20, 40, 60, 'Todos']],
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': false,
                'autoWidth': true,
                "language":{
                    "url":"https://cdn.datatables.net/plug-ins/1.11.5/i18n/id.json",
                    "sEmptyTable":"Tidak ada data."
                }
            });
        });
    </script>
</body>
</html>