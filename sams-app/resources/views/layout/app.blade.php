<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('images/rfid.png')}}" type="image/x-icon">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Jquery --}}
    <script src="{{ asset('js/vendor/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}" defer></script>
    {{-- Datatable --}}
    <script src="{{asset('js/vendor/datatables.net/js/dataTables.js')}}" defer></script>
    <script src="{{asset('js/vendor/datatables.net-bs5/js/dataTables.bootstrap5.js')}}" defer></script>
    <script src="{{asset('js/vendor/datatables.net-buttons/js/dataTables.buttons.js')}}" defer></script>
    <script src="{{asset('js/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.js')}}" defer></script>
    <script src="{{asset('js/vendor/jszip/dist/jszip.min.js')}}" defer></script>
    <script src="{{asset('js/vendor/pdfmake/build/pdfmake.min.js')}}" defer></script>
    <script src="{{asset('js/vendor/pdfmake/build/vfs_fonts.js')}}" defer></script>
    <script src="{{asset('js/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}" defer></script>
    <script src="{{asset('js/vendor/datatables.net-buttons/js/buttons.print.min.js')}}" defer></script>
    {{-- <script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.js" defer></script> --}}
    {{-- <script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js" defer></script> --}}
    {{-- <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.bootstrap5.js" defer></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" defer></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" defer></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" defer></script> --}}
    {{-- <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.html5.min.js" defer></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.print.min.js" defer></script> --}}
    {{-- Bootstrap --}}

    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.1/css/buttons.bootstrap5.css">
    {{-- argon css --}}
    <link rel="stylesheet" href="{{ asset('/css/argon/argon.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/argon/custom.css') }}">
    <title>@yield('title')</title>
    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/sams.css') }}">
    {{-- Sweetalert --}}
    <script src="{{ asset('sweetalert/dist/sweetalert.min.js') }}" defer></script>
    
    @yield('style')
</head>

<body>
    @yield('content')

    <script src="{{ asset('js/customs/deleteSweetAlert.js') }}"></script>
    <script src="{{ asset('js/customs/updateModal.js') }}"></script>
    <script src="{{ asset('js/customs/createModal.js') }}"></script>
    <script src="{{ asset('js/customs/customDataTable.js') }}"></script>
    <script src="{{ asset('js/customs/currentDate.js') }}"></script>
    <script src="{{ asset('js/customs/successSweetAlert.js') }}"></script>
    @stack('script')


</body>

</html>
