<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ file_url('assets/client/css/styles.css') }}" rel="stylesheet" />

    <style>
        .carousel-item {
            height: 500px;
            /* Độ cao của slide */
        }

        .carousel-item img {
            object-fit: cover;
            /* Giữ ảnh luôn đầy khung */
            height: 100%;
            width: 100%;
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.5);
            /* Nền mờ cho chữ dễ đọc */
            padding: 15px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <!-- Navigation-->
    @include('client.layouts.partilas.nav')




    <!-- Section-->

    @yield('section')

    <!-- Footer-->

    @include('client.layouts.partilas.footer')


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ file_url('assets/client/js/scripts.js') }}"></script>
</body>

</html>
