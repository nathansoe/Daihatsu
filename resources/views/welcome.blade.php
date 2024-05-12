@extends('layout.default')

@section('title', 'Dashboard')
@section('sub_title', 'Dashboard')

@section('main')
    <div class="flex flex-col justify-center items-center">
        <h1>Scan QR Codes</h1>
        <div class="section flex justify-center w-full">
            <div id="my-qr-reader"></div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/html5-qrcode"></script>

    <script>
        function domReady(fn) {
            if (
                document.readyState === "complete" || document.readyState === "interactive"
            ) {
                setTimeout(fn, 1000);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        domReady(function() {

            function onScanSuccess(decodeText, decodeResult) {
                alert("You Qr is : " + decodeText, decodeResult);
            }

            let htmlscanner = new Html5QrcodeScanner(
                "my-qr-reader", {
                    fps: 10,
                    qrbos: 250,
                    disableFlip: false
                }
            );
            htmlscanner.render(onScanSuccess);
        });
    </script>
@endsection
