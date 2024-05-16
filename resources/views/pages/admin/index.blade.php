@extends('layout.default')

@section('title', 'Dashboard')
@section('sub_title', 'Dashboard')

@section('main')
<p>TEST</p>
    <div id="scanner-container"></div>
@endsection

@section('script')
    <script>
        const scanner = new Scanner({
            video: document.getElementById('scanner-container'),

            onScan: content => {
                document.getElementById('scanned-content').innerText = content;
            }
        });

        // Start the scanner
        scanner.start();
    </script>
@endsection
