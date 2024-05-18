@extends('layout.user')

@section('main')
    {{-- Modal --}}
    @include('components.guest.register-modal')
    @include('components.guest.cek-barcode-modal')
    {{-- End Modal --}}
    <section class="rounded-xl min-h-screen">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 flex flex-col gap-4">
            <div class="bg-[#2664BC] rounded-xl p-8 flex flex-wrap justify-center items-center gap-5" id="kegiatan">
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
                        <div class="w-full flex justify-center md:justify-start gap-4">
                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="text-white w-full md:w-auto bg-[#FBB41D] px-3 py-2 rounded-lg text-semibold">Daftar
                                Sekarang</button>
                            <button data-modal-target="checkBarcode" data-modal-toggle="checkBarcode"
                                class="text-white w-full md:w-auto bg-[#FBB41D] px-3 py-2 rounded-lg text-semibold">Cek
                                Barcode</button>
                        </div>
                        <p class="mt-2 text-xs text-white text-center md:text-start"><span
                                class="text-[#FBB41D]">*</span>Syarat dan ketentuan berlaku</p>
                    </div>
                </div>
            </div>
            {{-- Section 2 --}}
            <div class="bg-[#2664BC] rounded-3xl p-3">
                <img class="h-full w-full hidden md:block"
                    src="https://www.kompas.com/otomotif/daihatsukumpulsahabatbekasi/images/activity-1-d.png?v=3"
                    alt="image description">
                <img class="h-full w-full block md:hidden"
                    src="https://www.kompas.com/otomotif/daihatsukumpulsahabatbekasi/images/activity-1-m.png?v=3"
                    alt="image description">
            </div>

            <div class="my-4">
                <div class="flex flex-wrap md:flex-auto w-full">
                    <div class="w-3/3 md:w-1/3 p-2">
                        <div class="flex flex-col gap-2 p-3 rounded-xl bg-red-400 h-full">
                            <div class="flex justify-between items-center">
                                <p class="text-normal md:text-xl text-white font-semibold">Sahabat Sehat</p>
                                <i class="fa-solid fa-dumbbell fa-2xl text-white opacity-65"></i>
                            </div>
                            <p class="text-sm md:text-lg over text-white">500 partisipan zumba siap meramaikan suasana!</p>
                        </div>
                    </div>
                    <div class="w-1/2 md:w-1/3 p-2">
                        <div class="flex flex-col gap-2 p-3 rounded-xl bg-blue-500 h-full">
                            <div class="flex justify-between items-center">
                                <p class="text-normal md:text-xl text-white font-semibold">Sahabat Bermain</p>
                                <i class="fa-solid fa-dumbbell fa-2xl text-white opacity-65"></i>
                            </div>
                            <p class="text-sm md:text-lg over text-white">Area bermain dengan si kecil</p>
                        </div>
                    </div>
                    <div class="w-1/2 md:w-1/3 p-2">
                        <div class="flex flex-col gap-4 p-3 rounded-xl bg-green-400 h-full">
                            <div class="flex justify-between items-center">
                                <p class="text-normal md:text-xl text-white font-semibold">Sahabat Berbelanja</p>
                                <i class="fa-solid fa-cart-shopping fa-2xl text-white opacity-65"></i>
                            </div>
                            <ul
                                class="text-sm md:text-lg max-w-md space-y-1 text-white list-disc list-inside dark:text-gray-400">
                                <li>
                                    Serbu Belanja di Bazaar Bagasi
                                </li>
                                <li>
                                    Aneka jajanan di arena UMKM
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-full p-2">
                        <div class="flex gap-3 bg-[#FBB41D] p-5 rounded-xl justify-between items-center">
                            <div class="flex flex-col gap-3">
                                <p class="text-normal md:text-xl text-black font-semibold">Sahabat Bertantangan</p>
                                <a href="" class="text-xs underline">selengkapnya</a>
                            </div>
                            <div>
                                <ul
                                    class="text-sm md:text-md max-w-md space-y-1 font-semibold text-black list-disc list-inside dark:text-gray-400">
                                    <li>
                                        Serbu Belanja di Bazaar Bagasi
                                    </li>
                                    <li>
                                        Aneka jajanan di arena UMKM
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul
                                    class="text-sm md:text-md max-w-md font-semibold space-y-1 text-black list-disc list-inside dark:text-gray-400">
                                    <li>
                                        Serbu Belanja di Bazaar Bagasi
                                    </li>
                                    <li>
                                        Aneka jajanan di arena UMKM
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul
                                    class="text-sm md:text-md max-w-md space-y-1 font-semibold text-black list-disc list-inside dark:text-gray-400">
                                    <li>
                                        Serbu Belanja di Bazaar Bagasi
                                    </li>
                                    <li>
                                        Aneka jajanan di arena UMKM
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <i class="fa-solid fa-medal fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Section 3 --}}

            {{-- Section 4 --}}
            <x-guest.event-table/>
            {{-- Section 4 --}}

            {{-- Section 5 --}}
            <div class="w-full my-4" id="peta">
                <img class="h-auto max-w-full rounded-lg"
                    src="https://www.kompas.com/otomotif/daihatsukumpulsahabatbekasi/images/map.png?v=2"
                    alt="image description">
            </div>
            {{-- Section 5 --}}
        </div>
    </section>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var nik_id = 1

        $('#register').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    console.log(response)
                    nik_id = response.nik
                    $('#barcodeResultRegister').attr('src', response.link_qrcode);
                    $('#containerBarcodeRegister').show();
                    Swal.fire({
                        title: 'Registrasi Berhasil',
                        text: 'Registrasi Sukses',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })
                },
                error: function(xhr, status, error) {
                    console.log('Error Gan')
                    Swal.fire({
                        title: 'Ooops!!!',
                        text: error,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            });
        });

        $('#check').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    console.log(response)
                    nik_id = response.data.nik
                    $('#barcodeResult').attr('src', response.link_qrcode);
                    $('#containerBarcode').show();
                },
                error: function(xhr, status, error) {
                    console.log('Error Gan')
                    Swal.fire({
                        title: 'Ooops!!!',
                        text: error,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            });
        });

        $('#barcodeDownload').on('click', function(event) {
            downloadQr(nik_id)
        })

        $('#barcodeDownloadRegister').on('click', function(event) {
            downloadQr(nik_id)
        })

        function downloadQr(nik) {
            window.location.href = '{{ url('/download-qr/') }}/' + nik;
        }
    </script>
@endsection
