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
            // Specify the element where the scanner will be rendered
            video: document.getElementById('scanner-container'),

            // Callback function to handle the scanned content
            onScan: content => {
                // Display the scanned content in the specified element
                document.getElementById('scanned-content').innerText = content;
            }
        });

        // Start the scanner
        scanner.start();
    </script>
@endsection
