@extends('layout.user')

@section('title', 'Guest Register')

@section('main')
    {{-- Modal --}}
    @include('components.guest.register-modal')
    @include('components.guest.cek-barcode-modal')
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
                        <div class="w-full flex justify-center md:justify-start gap-4">
                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="text-white w-full md:w-auto bg-[#FBB41D] px-3 py-2 rounded-lg text-semibold">Daftar
                                Sekarang</button>
                            <button data-modal-target="checkBarcode" data-modal-toggle="checkBarcode"
                                class="text-white w-full md:w-auto bg-[#FBB41D] px-3 py-2 rounded-lg text-semibold">Cek Barcode</button>
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
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#register').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    downloadQr(response.nik)
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

        $('#checkBarcode').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    downloadQr(response.nik)
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

        function downloadQr(nik) {
            window.location.href = '{{ url('/download-qr/') }}/' + nik;
        }
    </script>
@endsection
