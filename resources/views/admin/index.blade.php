@extends('admin.layouts.index')

@section('title', $title)
@section('content')
    <div class="flex gap-4 w-full flex-wrap">
        <a href="/superadmin/account"
            class="block w-60 shadow-lg p-6 bg-white rounded-xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 pl-10">
            <h5 class="mb-2 text-base font-medium tracking-tight text-gray-900 dark:text-white">Total Ruangan </h5>
            <p class="font-bold text-3xl text-gray-700 dark:text-gray-400 mb-2">
                {{ $lokasi   }}

            </p>
            <p class="font-normal text-xs text-[#4E7E74] dark:text-gray-400 flex items-center gap-2"><span>Lihat
                    Detail</span> <svg width="5" height="7" viewBox="0 0 5 7" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1.19116L4 3.69116L1 6.19116" stroke="#4E7E74" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </p>
        </a>
        <a href="/superadmin/account"
            class="block w-60 shadow-lg p-6 bg-white rounded-xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 pl-10">
            <h5 class="mb-2 text-base font-medium tracking-tight text-gray-900 dark:text-white">Total Barang </h5>
            <p class="font-bold text-3xl text-gray-700 dark:text-gray-400 mb-2">
                {{ $barang }}

            </p>
            <p class="font-normal text-xs text-[#4E7E74] dark:text-gray-400 flex items-center gap-2"><span>Lihat
                    Detail</span> <svg width="5" height="7" viewBox="0 0 5 7" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1.19116L4 3.69116L1 6.19116" stroke="#4E7E74" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </p>
        </a>
        <a href="/superadmin/account"
            class="block w-60 shadow-lg p-6 bg-white rounded-xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 pl-10">
            <h5 class="mb-2 text-base font-medium tracking-tight text-gray-900 dark:text-white">Total Jurusan </h5>
            <p class="font-bold text-3xl text-gray-700 dark:text-gray-400 mb-2">
                {{ $jurusan }}

            </p>
            <p class="font-normal text-xs text-[#4E7E74] dark:text-gray-400 flex items-center gap-2"><span>Lihat
                    Detail</span> <svg width="5" height="7" viewBox="0 0 5 7" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1.19116L4 3.69116L1 6.19116" stroke="#4E7E74" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </p>
        </a>
        <a href="/superadmin/account"
            class="block w-60 shadow-lg p-6 bg-white rounded-xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 pl-10">
            <h5 class="mb-2 text-base font-medium tracking-tight text-gray-900 dark:text-white">Admin </h5>
            <p class="font-bold text-3xl text-gray-700 dark:text-gray-400 mb-2">
                {{ $admin }}

            </p>
            <p class="font-normal text-xs text-[#4E7E74] dark:text-gray-400 flex items-center gap-2"><span>Lihat
                    Detail</span> <svg width="5" height="7" viewBox="0 0 5 7" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1.19116L4 3.69116L1 6.19116" stroke="#4E7E74" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </p>
        </a>
        <a href="/superadmin/account"
            class="block w-60 shadow-lg p-6 bg-white rounded-xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 pl-10">
            <h5 class="mb-2 text-base font-medium tracking-tight text-gray-900 dark:text-white">Petugas </h5>
            <p class="font-bold text-3xl text-gray-700 dark:text-gray-400 mb-2">
                {{ $petugas }}

            </p>
            <p class="font-normal text-xs text-[#4E7E74] dark:text-gray-400 flex items-center gap-2"><span>Lihat
                    Detail</span> <svg width="5" height="7" viewBox="0 0 5 7" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1.19116L4 3.69116L1 6.19116" stroke="#4E7E74" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </p>
        </a>
    </div>
    <div class="font-semibold mt-10">
        Update Terakhir
    </div>
    <div class="flex gap-3 ">
        <div class="w-full border border-gray-500 py-5 px-4 rounded-xl">
            <table class="w-full text-sm text-left rtl:text-right  dark:text-gray-400">
                <thead class="text-xs text-center text-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 pb-10">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3 pb-10">
                            Petugas
                        </th>
                        <th scope="col" class="px-6 py-3 pb-10">
                            Total Barang
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Dlokasi as $data)
                        <tr class="bg-white border-b text-center border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-2 py-4">
                                {{ $data->nama }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->user->name }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->barangs->count() }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="w-full border border-gray-500 py-5 px-4 rounded-xl">
            <table class="w-full text-sm text-left rtl:text-right  dark:text-gray-400">
                <thead class="text-xs text-center text-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 pb-10">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3 pb-10">
                            Ruang
                        </th>
                        <th scope="col" class="px-6 py-3 pb-10">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Dbarang as $data)
                        <tr class="bg-white border-b text-center border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-2 py-4">
                                {{ $data->nama }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->lokasi->nama }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->statusBarangs->status }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection
