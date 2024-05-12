@extends('layout.default')

@section('title', 'Dashboard')
@section('sub_title', 'Dashboard')

@section('main')
    <div class="flex flex-col justify-center items-center">
        <h1>Scan QR Codes</h1>
        <div class="section flex justify-center w-full">
            <div id="preview" class="mt-1 videoScan w-full"></div>
        </div>
        <div class="my-8">
            <button class="ml-4 bg-transparent border-2 py-2 px-8 rounded-xl" onclick="switchCamera()" style="padding-left: 9%; padding-right: 9%;">Switch</button>
            <input type="hidden" value="1" id="camera">
        </div>
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/html5-qrcode"></script>

    <script>
        window.onload = function() {
            startCamera();
        };
        var camera = document.getElementById("camera").value;
        const html5QrCode = new Html5Qrcode("preview");
        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            window.location.href = decodedText;
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
