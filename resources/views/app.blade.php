<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>

       <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
       <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

  
    <title>Document</title>
    @stack('styles')
    @vite(['resources/js/app.js','resources/css/app.css'])
    @yield('page-css')
</head>
<body>
    <div class="flex flex-col h-screen">
        <!-- Navbar -->
        @include('navbar')

        <!-- Main Content -->
        <div class="flex flex-1 overflow-hidden">
            <!-- Sidebar -->
            <div class="w-64 bg-gray-800 text-white">
                @include('sidebar')
            </div>

            <!-- Page Content -->
            <div class="flex-1 bg-gray-100 p-6 overflow-y-auto">
                @yield('content')
            </div>
        </div>
    </div>

    @yield('page-js')
    @stack('scripts')
</body>
</html>