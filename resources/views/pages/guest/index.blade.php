@extends('layout.user')

@section('title', 'Guest Register')

@section('main')
    {{-- Modal --}}
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Register
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" name="register" id="register" method="POST" action="{{url('register')}}">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                            <input type="text" name="nama" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan Nama Lengkap Sesuai KTP" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan Email" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="nik"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Induk Kependudukan</label>
                            <input type="text" name="nik" id="nik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan NIK" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="no_hp"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Telfon</label>
                            <input type="text" name="no_hp" id="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan Nomor Handphone" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="jenis_peserta"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Peserta</label>
                            <input type="text" name="jenis_peserta" id="jenis_peserta" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan Jenis Peserta" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="jumlah_hadir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Hadir</label>
                            <input type="text" name="jumlah_hadir" id="jumlah_hadir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan Jumlah Hadir" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <textarea id="domisili" name="domisili" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Alamat Sekarang"></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Register
                    </button>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal --}}
    <section class="rounded-xl min-h-screen">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 flex flex-col gap-4">
            <div class="bg-[#2664BC] rounded-xl p-8 flex flex-wrap justify-center items-center gap-5">
                <p class="text-3xl font-[600] text-white block md:hidden text-center">
                    Yuk, seru-seruan bareng bersama Sahabat Daihatsu di Bekasi!
                </p>
                <img class="h-full max-w-full"
                    src="https://www.kompas.com/otomotif/daihatsukumpulsahabatbekasi/images/logo-samping.png"
                    alt="image description">
                <div class="flex flex-col gap-6">
                    <p class="text-3xl font-[600] text-white hidden md:block">
                        Yuk, seru-seruan bareng bersama Sahabat Daihatsu di Bekasi!
                    </p>
                    <p class="text-xl text-white hidden md:block">
                        Minggu, 28 April 2024 <span class="text-[#FBB41D] font-bold">|</span> Pukul: 07.00 - selesai
                    </p>
                    <p class="text-xl text-center font-semibold text-white block md:hidden">
                        Minggu, 28 April 2024
                        <br>
                        <span class="text-sm font-normal">Pukul: 07.00 - selesai</span>
                    </p>
                    <p class="text-medium text-white text-center md:text-start font-semibold md:font-normal">
                        Area Bundaran Tarian Langit Harapan Indah, Bekasi
                    </p>
                    <div>
                        <div class="w-full flex justify-center md:justify-start">
                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="text-white w-full md:w-auto bg-[#FBB41D] px-3 py-2 rounded-lg text-semibold">Daftar
                                Sekarang</button>
                        </div>
                        <p class="mt-2 text-xs text-white text-center md:text-start"><span
                                class="text-[#FBB41D]">*</span>Syarat dan ketentuan berlaku</p>
                    </div>
                </div>
            </div>

            <div class="bg-[#2664BC] rounded-3xl p-3">
                <img class="h-full w-full hidden md:block"
                    src="https://www.kompas.com/otomotif/daihatsukumpulsahabatbekasi/images/activity-1-d.png?v=3"
                    alt="image description">
                <img class="h-full w-full block md:hidden"
                    src="https://www.kompas.com/otomotif/daihatsukumpulsahabatbekasi/images/activity-1-m.png?v=3"
                    alt="image description">
            </div>

            <div class="flex flex-wrap md:flex-auto w-full">
                <div class="w-3/3 md:w-1/3 p-2">
                    <div class="flex flex-col gap-4 p-3 rounded-xl bg-red-300">
                        <p class="text-normal md:text-xl text-white font-semibold">Sahabat Sehat</p>
                        <p class="text-sm over">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, iste quis
                            itaque explicabo nam
                            earum quod velit! Pariatur eum quod</p>
                    </div>
                </div>
                <div class="w-1/2 md:w-1/3 p-2">
                    <div class="flex flex-col gap-4 p-3 rounded-xl bg-red-300">
                        <p class="text-normal md:text-xl text-white font-semibold">Sahabat Sehat</p>
                        <p class="text-sm over">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, iste quis
                            itaque explicabo nam
                            earum quod velit! Pariatur eum quod</p>
                    </div>
                </div>
                <div class="w-1/2 md:w-1/3 p-2">
                    <div class="flex flex-col gap-4 p-3 rounded-xl bg-red-300">
                        <p class="text-normal md:text-xl text-white font-semibold">Sahabat Sehat</p>
                        <p class="text-sm over">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, iste quis
                            itaque explicabo nam
                            earum quod velit! Pariatur eum quod</p>
                    </div>
                </div>
                <div class="w-full p-2">
                    <div class="flex flex-col gap-4 p-3 rounded-xl bg-red-300">
                        <p class="text-normal md:text-xl text-white font-semibold">Sahabat Sehat</p>
                        <p class="text-sm over">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, iste quis
                            itaque explicabo nam
                            earum quod velit! Pariatur eum quod</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
