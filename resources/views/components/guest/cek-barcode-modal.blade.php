<div id="checkBarcode" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto mx-4 overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Find Your Barcode
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                {{-- @include('components.guest.barcode-container') --}}
                <div class="mb-5 hidden" id="containerBarcode">
                    <div class="flex w-full justify-end">
                        <button type="button"
                            id="barcodeDownload"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="fa-solid fa-download"></i>
                        </button>
                    </div>
                    <center>
                        <img class="h-auto max-w-full" id="barcodeResult" src="#"
                            alt="image description">
                    </center>
                </div>
                <form class="p-4 md:p-5" name="check" id="check" method="POST" action="{{ url('cekRegister') }}">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2 sm:col-span-2">
                            <label for="nik"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                Induk Kependudukan</label>
                            <input type="text" name="nik" id="nik"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan NIK" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-2">
                            <label for="no_hp"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                                Telfon</label>
                            <input type="text" name="no_hp" id="no_hp"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan Nomor Handphone" required="">
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Check
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
