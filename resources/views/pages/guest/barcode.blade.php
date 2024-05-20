<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Print Component</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="w-full h-full flex justify-center">
        <div id="registerPrintBarcode" style="position: relative">
            <img class="h-[500px] max-w-full" src="{{ asset('img/barcode_parent.png') }}" alt="barcode">
            <img src="#" id="barcodeResultRegister"
                style="position: absolute; top:37%; left: 28%" class="h-[130px] max-w-full" alt="result">
        </div>
    </div>
    <div class="w-full flex justify-center my-4">
        <button onclick="window.print()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Print / Save</button>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var nik = '{{ $nik }}'
        var phone = '{{ $phone }}'
        const csrfToken = "{{ csrf_token() }}"

        $.ajax({
            type: 'POST',
            url: '{{ url('cekRegister') }}',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                'nik': nik,
                'no_hp': phone
            },
            success: function(response) {
                console.log(response)
                $('#barcodeResultRegister').attr('src', response.data.link_qrcode);
            },
            error: function(xhr, status, error) {
                console.log(error)
            }
        });
    })
</script>

</html>
