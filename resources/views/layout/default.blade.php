<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Daihatsu')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <x-sidebar/>
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
