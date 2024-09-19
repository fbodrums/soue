<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador Nota Fiscal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-color: #f5f7fa;
        }

        .header {
            background-color: #002242;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header img {
            height: 50px;
        }

        .container {
            margin-top: 20px;
        }

        .btn-custom {
            background-color: #002242;
            color: white;
        }

        .total-box {
            background-color: #002242;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .divider {
            width: 100%;
            height: 1.5pt;
            background-color: #718096;
        }

        .btn-size {
            min-width: 150px;
            font-family: "Open Sans", sans-serif;
            font-weight: 600;
        }

        .btn-cancelar {
            background: white;
            color: #001838;
        }

        .total-geral {
            color: #718096;
            font-family: "Inter", sans-serif;
            font-weight: 700;
            font-size: 32px;
        }

        .label-fields {
            color: #718096;
            font-family: "Inter", sans-serif;
            white-space: nowrap;
            font-weight: 400;
            min-width: 170px;
            font-size: 20px;
        }


        ::-webkit-input-placeholder,
        ::placeholder {
            color: #A4AEBB !important;
            font-family: "Inter", sans-serif !important;
            font-weight: 300 !important;
            min-width: 137px !important;
            font-size: 16px !important;
        }

        table th {
            color: #718096;
            font-family: "Inter", sans-serif;
            font-weight: 400;
            font-size: 20px;
            white-space: nowrap;
        }

        .btn-link {
            font-family: "Inter", sans-serif;
            font-size: 16px;
            font-weight: 500;
            color: #718096;

        }

        .inter-light {
            font-weight: 100;
        }

        .container-fluid {
            padding-left: 60px;
            padding-right: 60px;
        }

        .main-title {
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-size: 44px;
            font-weight: 600;
            color: #001838;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="header">
        <img src="{{ asset('assets/logo.png') }}" alt="Logo">
    </div>
    @yield('content')


</body>

</html>
