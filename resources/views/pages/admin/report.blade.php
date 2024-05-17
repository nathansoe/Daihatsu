@extends('layout.default')

@section('title', 'Report Management')
@section('sub_title', 'Report')

@section('main')
    <div class="w-full flex justify-center mb-4">
        <p class="text-xl">User Report</p>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-3 border-1">
        <div class="my-4 flex gap-3 items-center" id="example_filter">
            <div>
                <select id="smallSelect"
                    class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="all" selected>All</option>
                    <option value="0">Tidak Hadir</option>
                    <option value="1">Hadir</option>
                </select>
            </div>
            <div>
                <input type="search" aria-controls="example" id="smallSearch" placeholder="Cari Pengunjung"
                    class="block p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <button type="button" id="search"
                    class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="example">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NIK
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah Hadir
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Arrive
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- Content --}}
            </tbody>
        </table>
        <div class="flex justify-end w-full my-5">
            <button type="button" id="downloadReport" data-test="hello"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Download
            </button>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.tailwindcss.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <script>
        download = 'all'

        table = $('#example').DataTable({
            "lengthChange": false,
            "searching": false,
            "ajax": {
                url: "{{ url('report') }}" + "/" + download,
                dataSrc: ""
            },
            "columns": [{
                    "data": "nama"
                },
                {
                    "data": "nik"
                },
                {
                    "data": "no_hp"
                },
                {
                    "data": "email"
                },
                {
                    "data": "jenis"
                },
                {
                    "data": "jumlah"
                },
                {
                    "data": "tanggal_daftar"
                },
                {
                    "data": "kehadiran"
                },
            ],
        });

        $('#downloadReport').on('click', function(event) {
            $.ajax({
                type: 'GET',
                url: "{{ url('export-excel') }}" + "?status=all",
                xhrFields: {
                    responseType: 'blob'
                },
                success: function(response, status, xhr) {
                    if (xhr.status === 200) {
                        var filename = "";
                        var disposition = xhr.getResponseHeader('Content-Disposition');
                        if (disposition && disposition.indexOf('attachment') !== -1) {
                            var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                            var matches = filenameRegex.exec(disposition);
                            if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g,
                                '');
                        }
                        var blob = new Blob([response], {
                            type: xhr.getResponseHeader('Content-Type')
                        });
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = filename;
                        link.click();
                        window.URL.revokeObjectURL(link.href);
                    } else {
                        console.log(xhr.status)
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error)
                }
            });
        })

        $(document).ready(function() {
            callTable()
        })

        function callTable(status) {
            var url = "{{ url('report') }}" + "/" + status;
            table.clear().draw();
            table.ajax.url(url).load();
        }

        $('#search').on('click', function() {
            var input = $('#smallSearch').val()
            var status = $('#smallSelect').val()
            download = status
            console.log(download)
            callTable(status)
        })
    </script>
@endsection
