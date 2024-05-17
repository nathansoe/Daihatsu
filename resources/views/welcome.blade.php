@extends('layout.default')

@section('title', 'Dashboard')
@section('sub_title', 'Dashboard')

@section('main')
    <button data-modal-target="verify" class="hidden" data-modal-toggle="verify" class="btn">Open Modal</button>
    {{-- Modal --}}
    <div id="verify" data-modal-hide="verify" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Data verification
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-xl">Nomor Induk Kependudukan</p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400" id="nikPrev"></p>
                    <p class="text-xl mt-4">Nomor Telefon</p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400" id="noPrev"></p>
                </div>
                <!-- Modal footer -->
                <div class="flex w-full justify-center py-5">
                    <button type="button" id="verifyButton"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Verifikasi
                        <svg class="w-4 h-4 mx-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                        <span class="sr-only">Icon description</span>
                    </button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        window.onload = function() {
            startCamera();
            console.log('run')
            document.querySelector('[data-modal-toggle="verify"]').click();
            console.log('run')
        };
        var id = 0
        const csrfToken = "{{ csrf_token() }}"
        var camera = document.getElementById("camera").value;
        const html5QrCode = new Html5Qrcode("preview");
        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            console.log(decodedText)
            console.log(csrfToken)
            $.ajax({
                type: 'POST',
                url: "{{ url('dataKehadiran') }}/" + decodedText,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    console.log(response)
                    id = response.data.nik
                    $('#nikPrev').html(response.data.nik)
                    $('#noPrev').html(response.data.qrcode)
                },
                error: function(xhr, status, error) {
                    console.log('Error Gan')
                }
            });
            $('#verify').show()
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

        $('#verifyButton').on('click', function(event){
            console.log(id)
            submit()
        })

        function submit() {
            $.ajax({
                type: 'POST',
                url: "{{ url('verifikasiKehadiran') }}/" + id,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    console.log(response)
                },
                error: function(xhr, status, error) {
                    console.log('Error Gan')
                }
            });
        }
    </script>
@endsection
