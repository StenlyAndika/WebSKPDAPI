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
    <link rel="stylesheet" href="/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/datatables/datatables.css">
    <link rel="stylesheet" href="/vendor/datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    
    <!-- Custom Style -->
    <link rel="stylesheet" href="/css/template-style.css">

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>
<body>

    @include('partials.adminnav')
    
    <div class="main-content">

        @yield('container')

    </div>

    <!-- Vendor JS Files -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="/vendor/datatables/datatables.min.js"></script>
    <script src="/vendor/datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/d6482bd15d.js" crossorigin="anonymous"></script>
    <script src="/vendor/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <script src="/js/template-script.js"></script>

    @include('sweetalert::alert')

    <script>
        $(document).ready(function() {
            document.addEventListener('trix-file-accept', function(e) {
                e.preventDefault();
            })

            $("#tgl").datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true,
                language : 'id'
            });
            
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