@php
    $data = [
        (object) [
            'time' => '07:15 - 09:00',
            'act' => 'Zumba',
            'area' => 'Festival Area',
        ],
        (object) [
            'time' => '07:15 - 09:00',
            'act' => 'Rolling Thunder',
            'area' => 'Others',
        ],
        (object) [
            'time' => '09:00 - 09:45',
            'act' => 'Press Conference',
            'area' => 'Presscon Area',
        ],
        (object) [
            'time' => '09:45 - 10:10',
            'act' => 'Opening',
            'area' => 'Festival Area',
        ],
        (object) [
            'time' => '10:10 - 10:20',
            'act' => 'Games & Doorprize',
            'area' => 'Festival Area',
        ],
        (object) [
            'time' => '10:20 - 11:20',
            'act' => 'Talkshow #1',
            'area' => 'Presscon Area',
        ],
        (object) [
            'time' => '11:00 - 17:00',
            'act' => 'Test Drive & Car Review Challenge',
            'area' => 'Test Drive Area',
        ],
        (object) [
            'time' => '11.20 - 11.30',
            'act' => 'Doorprize',
            'area' => 'Festival Area',
        ],
        (object) [
            'time' => '11.30 - 13.30',
            'act' => 'Break',
            'area' => '-',
        ],
        (object) [
            'time' => '13.30 - 14.10',
            'act' => 'Band Competition',
            'area' => 'Festival Area',
        ],
        (object) [
            'time' => '13.30 - 15.30',
            'act' => 'Muat Banyak Challenge',
            'area' => 'UMKN Area',
        ],
        (object) [
            'time' => '13.30 - 15.30',
            'act' => 'Ganti Ban Challenge',
            'area' => 'Booth Area',
        ],
        (object) [
            'time' => '14:10 - 14:25',
            'act' => 'Doorprize',
            'area' => 'Festival Area',
        ],
        (object) [
            'time' => '14:25 - 15:25',
            'act' => 'Coswalk',
            'area' => 'Festival Area',
        ],
        (object) [
            'time' => '15:25 - 16:55',
            'act' => 'Cultural Performance - Ramawijaya',
            'area' => 'Festival Area',
        ],
        (object) [
            'time' => '15:30 - 16:30',
            'act' => 'Talkshow #2',
            'area' => 'Presscon Area',
        ],
        (object) [
            'time' => '16:55 - 18:25',
            'act' => 'Break',
            'area' => '-',
        ],
        (object) [
            'time' => '18:25 - 18:40',
            'act' => 'Doorprize',
            'area' => 'Festival Area',
        ],
        (object) [
            'time' => '18.40 - 19.00',
            'act' => 'Pengumuman Pemenang',
            'area' => 'Festival Area',
        ],
        (object) [
            'time' => '19:00 - 19:50',
            'act' => 'DJ Performance - Muda Mudi Berkaraoke',
            'area' => 'Festival Area',
        ],
        (object) [
            'time' => '19:50 - 20:55',
            'act' => 'KOTAK',
            'area' => 'Festival Area',
        ],
    ];
@endphp
<div class="relative overflow-x-auto shadow-md sm:rounded-lg my-4" id="rundown">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-lg text-white uppercase bg-[#2664BC]">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Jam
                </th>
                <th scope="col" class="px-6 py-3">
                    Aktivitas
                </th>
                <th scope="col" class="px-6 py-3">
                    Area
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr class="odd:bg-white text-medium md:text-lg odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->time}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->act}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->area}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
