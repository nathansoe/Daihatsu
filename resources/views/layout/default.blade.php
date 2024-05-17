<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Daihatsu')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2121564b59.js" crossorigin="anonymous"></script>
    <style>
        #example_filter {
            margin: 20px;
            border: 15px;
            padding: 3px;
            font-size: 0.8rem
        }

        #example_paginate {
            margin: 8px;
            font-size: 0.8rem
        }

        #example_info {
            margin: 8px;
            font-size: 0.8rem
        }
    </style>
</head>

<body>
    <x-sidebar />
    <div class="sm:ml-64 min-h-screen">
        <div class="w-full px-5 flex items-center h-16 bg-gray-50 border-b-2 border-gray-200">
            <p>@yield('sub_title', 'N/A')</p>
        </div>
        <div class="m-4 p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700">
            @yield('main')
        </div>
    </div>
</body>

@yield('script')

</html>
