<div class="mb-5 hidden" id="containerBarcode">
    <div class="flex w-full justify-end">
        <button type="button"
            id="barcodeDownload"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Download
            <svg class="w-4 h-4 mx-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
            <span class="sr-only">Icon description</span>
        </button>
    </div>
    <center>
        <img class="h-auto max-w-full" id="barcodeResult" src="{{ asset('storage/img/qr-code/img-1.png') }}"
            alt="image description">
    </center>
</div>
