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
    <div class="h-full flex flex-col justify-between overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <div class="px-3 py-4">
            <div class="h-20 flex items-center justify-center">
                Logo Here
            </div>
            <ul class="space-y-2 font-medium">
                @php
                    $data = [
                        (object) [
                            'title' => 'Dashboard',
                            'path' => '/dashboard',
                            'icon' =>
                                'M1000 500c0 276-224 500-500 500S0 776 0 500 224 0 500 0s500 224 500 500zm-125-2c0-105-65-185-176-185-88 0-147 60-199 121-54-64-109-121-200-121-110 0-175 84-175 187 0 108 71 188 179 188 91 0 140-57 196-116 52 60 115 116 198 116 108 0 177-86 177-190zm-437 4c-33 39-87 83-135 83-51 0-81-34-81-83 0-45 30-87 78-87 52 0 105 52 138 87zm341-2c0 47-28 85-79 85-59 0-104-44-137-83 32-35 80-88 134-88 51 1 82 40 82 86z',
                        ],
                        (object) [
                            'title' => 'Guest',
                            'path' => '/dashboard',
                            'icon' =>
                                'M1000 500c0 276-224 500-500 500S0 776 0 500 224 0 500 0s500 224 500 500zm-125-2c0-105-65-185-176-185-88 0-147 60-199 121-54-64-109-121-200-121-110 0-175 84-175 187 0 108 71 188 179 188 91 0 140-57 196-116 52 60 115 116 198 116 108 0 177-86 177-190zm-437 4c-33 39-87 83-135 83-51 0-81-34-81-83 0-45 30-87 78-87 52 0 105 52 138 87zm341-2c0 47-28 85-79 85-59 0-104-44-137-83 32-35 80-88 134-88 51 1 82 40 82 86z',
                        ],
                        (object) [
                            'title' => 'Report',
                            'path' => '/dashboard',
                            'icon' =>
                                'M1000 500c0 276-224 500-500 500S0 776 0 500 224 0 500 0s500 224 500 500zm-125-2c0-105-65-185-176-185-88 0-147 60-199 121-54-64-109-121-200-121-110 0-175 84-175 187 0 108 71 188 179 188 91 0 140-57 196-116 52 60 115 116 198 116 108 0 177-86 177-190zm-437 4c-33 39-87 83-135 83-51 0-81-34-81-83 0-45 30-87 78-87 52 0 105 52 138 87zm341-2c0 47-28 85-79 85-59 0-104-44-137-83 32-35 80-88 134-88 51 1 82 40 82 86z',
                        ],
                    ];
                @endphp
                @foreach ($data as $item)
                    <li>
                        <a href="{{ $item->path }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000">
                                <path d="{{ $item->icon }}"></path>
                            </svg>
                            <span class="ms-3">{{ $item->title }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="bg-gray-200 h-16 flex items-center px-4">
            <div class="flex justify-between w-full items-center">
                {{-- <p class="text-sm">Admin</p> --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
                <button type="button" class="text-white text-xs bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg px-1.5 py-1.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Dark</button>
            </div>
        </div>
    </div>
    <div class="">
        Hello
    </div>
</aside>
