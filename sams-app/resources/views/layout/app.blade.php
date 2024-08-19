<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- Bootstrap --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js" defer></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.js" defer></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js" defer></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.bootstrap5.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" defer></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.html5.min.js" defer></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.print.min.js" defer></script>


    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.1/css/buttons.bootstrap5.css">
    <link rel="stylesheet" href="{{ asset('/css/argon/argon.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/argon/custom.css') }}">
    <title>@yield('title')</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

    <link rel="stylesheet" href="{{ asset('css/sams.css') }}">


    <style>
        .dt-buttons .buttons-copy,
        .dt-buttons .buttons-excel,
        .dt-buttons .buttons-pdf {
            font-size: 12px;
            /* Adjust the font size as needed */
            background-color: #2c3e50;
            border: none;
            color: white;
        }

        div.dt-container div.dt-paging{
            margin-bottom: 20px;
        }

    </style>

    @yield('style')
</head>

<body>
    @yield('content')
    {{-- <script src={{asset('js/bootstrap.min.js')}}></script> --}}


    @stack('script')


</body>

</html>
