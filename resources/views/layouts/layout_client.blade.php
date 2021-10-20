<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tutoriel Laravel 8 CRUD</title>
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('css/cover.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.2/r-2.2.9/datatables.min.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap4.min.css"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.2/r-2.2.9/datatables.min.js"></script>
    <script src="{{ secure_asset('js/app.js') }}" type="text/js" defer></script>
</head>

<body>
    @yield("header")
    @yield("content")
    @yield("script")
</body>
</html>
