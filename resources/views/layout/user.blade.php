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
            <div class="sm:flex sm:items-center sm:justify-between items-center">
                <a href="https://www.kompas.com/otomotif/daihatsukumpulsahabatbekasi/images/logo-daihatsu.png"
                    class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="https://www.kompas.com/otomotif/daihatsukumpulsahabatbekasi/images/logo-daihatsu.png"
                        class="h-8" alt="Daihatsu" />
                </a>

                <div class="flex flex-col gap-1">
                    <p class="text-xs text-white">Supported By:</p>
                    <ul class="flex flex-wrap gap-2 items-center mb-6 text-sm font-medium text-white sm:mb-0">
                        <li>
                            <img src="https://www.kompas.com/otomotif/daihatsukumpulsahabatbekasi/images/logo-astra-pay.png"
                                class="h-6" alt="Daihatsu" />
                        </li>
                        <li>
                            <img src="https://www.kompas.com/otomotif/daihatsukumpulsahabatbekasi/images/logo-seva.png"
                                class="h-6" alt="Daihatsu" />
                        </li>
                        <li>
                            <img src="https://www.kompas.com/otomotif/daihatsukumpulsahabatbekasi/images/logo-gtradial.png"
                                class="h-6" alt="Daihatsu" />
                        </li>
                        <li>
                            <img src="https://www.kompas.com/otomotif/daihatsukumpulsahabatbekasi/images/logo-dfs.png"
                                class="h-6" alt="Daihatsu" />
                        </li>
                        <li>
                            <img src="https://www.kompas.com/otomotif/daihatsukumpulsahabatbekasi/images/logo-acc.png"
                                class="h-6" alt="Daihatsu" />
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex w-full flex-col justify-center items-center gap-4 mt-4">
                <p class="text-xs text-white">Organized By:</p>
                <div>
                    <img src="https://www.kompas.com/otomotif/daihatsukumpulsahabatbekasi/images/logo-kompas.png"
                        class="h-6" alt="Daihatsu" />
                </div>
                <span class="block text-sm text-white sm:text-center">© 2023 <a href="https://flowbite.com/"
                        class="hover:underline">Flowbite™</a>. All Rights Reserved.</span>
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
