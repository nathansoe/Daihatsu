<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full flex flex-col justify-between overflow-y-auto bg-[#1C456B] dark:bg-gray-800">
        <div class="px-3 py-4">
            <div class="h-20 flex flex-col gap-2 items-center justify-center">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-10 me-3 sm:h-7" alt="Flowbite Logo" />
                <p class="text-lg font-semibold text-white">Daihatsu</p>
            </div>
            <ul class="space-y-4 my-4 font-medium">
                @php
                    $data = [
                        (object) [
                            'title' => 'Scanner',
                            'path' => '/dashboard',
                            'icon' => 'fa-solid fa-qrcode',
                        ],
                        (object) [
                            'title' => 'Report',
                            'path' => '/report',
                            'icon' => 'fa-solid fa-sheet-plastic',
                        ],
                    ];
                @endphp
                @foreach ($data as $item)
                    <li>
                        <a href="{{ $item->path }}"
                            class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-300 hover:text-black dark:hover:bg-gray-700 group">
                            <span class="mr-3"><i class="{{ $item->icon }}"></i></span>{{ $item->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="bg-gray-200 bg-opacity-30 h-16 flex items-center px-4">
            <div class="flex justify-between w-full items-center">
                <div class="flex flex-col gap-2">
                    <p class="text-sm text-white">Admin</p>
                    <p class="text-xs text-white">admin@gmail.com</p>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-white border border-white hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="sr-only">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</aside>
