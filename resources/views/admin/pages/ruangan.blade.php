@extends('admin.layouts.index')

@section('title', $title)
@section('content')
    <div class="flex flex-col gap-4">
        <div class="w-full flex justify-between mt-7">
            <div class="flex gap-3 items-center">
                <div class="bg-[#FA6601] rounded flex items-center justify-center">
                    <a data-modal-target="tambah" data-modal-toggle="tambah" type="button" class="flex gap-4 p-2 text-white font-bold cursor-pointer">
                        <svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.35156 10.6295H19.9094M10.6305 1.35059V19.9084" stroke="white" stroke-width="2.65112" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Tambah ruangan
                    </a>
                </div>
            </div>
            <div>
                <form action="" class="flex gap-3">
                    <input type="text" name="search" id="search" placeholder="nama/status" value="{{ request()->query('search') }}" class="w-56 border border-gray-400 rounded-lg px-3 py-2 text-xs text-gray-500">
                    <button type="submit" class="bg-[#FA6601] text-white text-xs rounded-lg py-1 px-10">Cari</button>
                </form>
            </div>
        </div>

        <div class="w-full border border-gray-500 py-5 px-4 rounded-xl">
            <table class="w-full text-sm text-left rtl:text-right  dark:text-gray-400">
                <thead class="text-xs text-center text-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 pb-10">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3 pb-10">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3 pb-10">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 pb-10">
                            Total Barang
                        </th>
                        <th scope="col" class="px-6 py-3 pb-10">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $data)
                        <tr class="bg-white border-b text-center border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-2 py-4">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->nama }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->status }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->barangs->count() }}
                            </td>
                            <td class="px-2 py-4 text-center">
                                <a href="/superadmin/perusahaan/detail/{{ $data->id }}"
                                    class="font-medium bg-[#FA6601] text-white text-xs rounded-lg py-1 px-2 hover:underline">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- modal tambah ruangan --}}
    <div id="tambah" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-fit h-full p-4 md:h-auto">
            <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                    haii
                </div>
            </div>
        </div>
    </div>
@endsection
