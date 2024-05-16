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
    <div class="py-3">
        <x-guest.header/>
        <main class="px-4 lg:px-6 py-2.5 min-h-screen bg-gray-100">
            <div class="container mx-auto">
                @yield('main')
            </div>
        </main>
    </div>
</body>

@yield('script')
</html>
