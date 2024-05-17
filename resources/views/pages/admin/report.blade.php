@extends('layout.default')

@section('title', 'Report Management')
@section('sub_title', 'Report')

@section('main')
    <div class="w-full flex justify-center mb-4">
        <p class="text-xl">User Report</p>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                @foreach ($users as $user)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->nama }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->nik }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->no_hp }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->jenis }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->jumlah }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->tanggal_daftar }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->kehadiran }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-end w-full my-5">
            <button type="button" id="verifyButton"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Download
            </button>
        </div>
    </div>
@endsection

@section('script')

@endsection