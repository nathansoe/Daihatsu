@extends('layout.default')

@section('title', 'Dashboard')
@section('sub_title', 'Dashboard')

@section('main')
    {{-- Modal --}}
    <div id="confirmation" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto mx-4 overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Konfirmasi Data Pengunjung
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod dicta adipisci consectetur maxime ut provident qui soluta dignissimos laudantium, impedit mollitia repudiandae, expedita perferendis? Pariatur voluptas neque tempora fugit doloribus.
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                        accept</button>
                    <button data-modal-hide="default-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}
    <div class="flex flex-col justify-center items-center">
        <h1>Scan QR Codes</h1>
        <div class="section flex justify-center w-full">
            <div id="preview" class="mt-1 videoScan w-full"></div>
        </div>
        <div class="my-8">
            <button class="ml-4 bg-transparent border-2 py-2 px-8 rounded-xl" onclick="switchCamera()"
                style="padding-left: 9%; padding-right: 9%;">Switch</button>
            <input type="hidden" value="1" id="camera">
        </div>
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        window.onload = function() {
            startCamera();
        };
        var camera = document.getElementById("camera").value;
        const html5QrCode = new Html5Qrcode("preview");
        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            // $.ajax({
            //     type: 'POST',
            //     url: $(this).attr('action'),
            //     data: formData,
            //     success: function(response) {
            //         console.log(response)
            //         Swal.fire({
            //             title: 'Registrasi Berhasil',
            //             text: 'Registrasi Sukses',
            //             icon: 'success',
            //             confirmButtonText: 'Ok'
            //         })
            //     },
            //     error: function(xhr, status, error) {
            //         console.log(error)
            //         console.log('Error Gan')
            //         Swal.fire({
            //             title: 'Ooops!!!',
            //             text: error,
            //             icon: 'error',
            //             confirmButtonText: 'Ok'
            //         })
            //     }
            // });
            document.getElementById('confirmation').setAttribute("style", "display:block")
        };
        const config = {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        };
        //If you want to prefer front camera
        function startCamera() {
            if (camera == 0) {
                html5QrCode.start({
                    facingMode: "user"
                }, config, qrCodeSuccessCallback).catch((err) => {
                    window.location = 'https://www.online-qr-scanner.com/';
                });
            } else if (camera == 1) {
                html5QrCode.start({
                    facingMode: "environment"
                }, config, qrCodeSuccessCallback).catch((err) => {
                    window.location = 'https://www.online-qr-scanner.com/';
                });
            }
        }
        //Function
        function switchCamera() {
            if (camera == 1) {
                camera = 0;
            } else if (camera == 0) {
                camera = 1;
            }
            html5QrCode.stop().then((ignore) => {
                startCamera()
                console.log('Stopped')
            }).catch((err) => {
                // Stop failed, handle it.
                window.location = 'https://www.online-qr-scanner.com/';
            });
        }
    </script>
@endsection
