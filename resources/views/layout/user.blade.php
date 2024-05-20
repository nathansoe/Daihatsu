<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kumpul Sahabat | Daihatsu')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2121564b59.js" crossorigin="anonymous"></script>
</head>

<body>
    <div>
        <x-guest.header />
        <main class="px-4 lg:px-6 py-2.5 min-h-screen bg-gray-100">
            <div class="container mx-auto">
                @yield('main')
            </div>
        </main>
    </div>
    <footer class="bg-gray-800 shadow dark:bg-gray-900">
        <div class="w-full p-4 md:py-8">
            <div class="flex w-full flex-col justify-center items-center gap-4 mt-4">
                <p class="text-xs text-white">Presented By:</p>
                <div>
                    <img src="https://www.kompas.com/otomotif/daihatsukumpulsahabatbekasi/images/logo-daihatsu.png"
                        class="h-6" alt="Daihatsu" />
                </div>
                <span class="block text-sm text-white sm:text-center">© 2024 <a href="https://flowbite.com/"
                        class="hover:underline">Kumpul Sahabat Bandung</a>. All Rights Reserved.</span>
            </div>
        </div>
    </footer>


</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@yield('script')
<script>
    function autoScroll(data) {
        console.log(data)
        const targetSection = $('#'+data+'');
        $('html, body').animate({
            scrollTop: targetSection.offset().top
        }, 1000);
    }
</script>

</html>
