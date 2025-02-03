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
                        Tambah barang
                    </a>
                </div>
            </div>
            @if ($errors->any())
                <div class="mt-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                    {{ $errors->first() }}
                </div>
            @endif
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
                            Penanggung Jawab
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
                                {{ $data->user->name }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->statusBarangs->status }}
                            </td>
                            <td class="px-2 py-4 text-center">
                                <a href="/admin/barang/{{ $data->id }}"
                                    class="font-medium bg-[#FA6601] text-white text-xs rounded-lg py-1 px-2 hover:underline">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- modal tambah ruangan --}}

    <div id="tambah" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-fit h-full p-7 md:h-auto">
                <form action="{{ route('admin.barangcreate') }}" method="POST">
                    @csrf
                    <div class="bg-white rounded-lg shadow dark:bg-gray-700 px-16">
                        <div class="p-5 w-full flex flex-col items-center">
                            <div class="mb-2 flex flex-col w-full">
                                <label class="mb-1 font-medium text-xs">Nama <span style="color: red">*</span></label>
                                <input type="text" name="nama" id="nama" placeholder="Nama"
                                    
                                    class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2" required>

                            </div>
                            <select name="jurusan_id" id=""
                                class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2">
                                @foreach ($jurusan as $item)
                                    <option value="{{ $item->id }}"
                                        >{{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <select name="user_id" id=""
                                class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2">
                                @foreach ($akun as $item)
                                    <option value="{{ $item->id }}"
                                        >{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            <select name="lokasi_id" id=""
                                class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2">
                                @foreach ($lokasi as $item)
                                    <option value="{{ $item->id }}"
                                        >{{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="mb-2 flex flex-col w-full">
                                <label class="mb-1 font-medium text-xs">Kategori <span style="color: red">*</span></label>
                            
                                <!-- Input text dengan 'list' mengarah ke id 'kategori_list' -->
                                <input type="text" name="kategori" id="kategori" placeholder="kategori"
                                       list="kategori_list"
                                       class="w-full border-2 border-gray-400 rounded-md py-2 text-xs px-3 mb-2"
                                       required>
                            
                                <!-- Datalist berisi opsi kategori -->
                                <datalist id="kategori_list">
                                    @foreach ($kategori as $cat)
                                        <option value="{{ $cat }}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                            
                            <div class="mb-2 flex flex-col w-full">
                                <label class="mb-1 font-medium text-xs">Sumber Dana <span
                                        style="color: red">*</span></label>
                                <input type="text" name="sumber_dana" id="sumber_dana" placeholder="sumber_dana" list="sumber_list"
                                    class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2" required>

                                    <datalist id="sumber_list">
                                        @foreach ($sumberDana as $cat)
                                            <option value="{{ $cat }}"></option>
                                        @endforeach
                                    </datalist>

                            </div>
                            <div class="mb-2 flex flex-col w-full">
                                <label class="mb-1 font-medium text-xs">Nilai <span style="color: red">*</span></label>
                                <input type="number" name="nilai" id="nilai" placeholder="nilai"
                                    class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2" required>

                            </div>
                            <div class="mb-2 flex flex-col w-full">
                                <label class="mb-1 font-medium text-xs">Tanggal Beli <span
                                        style="color: red">*</span></label>
                                <input type="date" name="tanggal_beli" id="tanggal_beli" placeholder="tanggal_beli"
                                    class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2" required>

                            </div>
                            <div class="mb-2 flex flex-col w-full">
                                <label class="mb-1 font-medium text-xs">Spesifikasi <span
                                        style="color: red">*</span></label>
                                <textarea name="spesifikasi" id="" cols="10" rows="3"
                                    class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2" required></textarea>

                            </div>
                        </div>
                        <div class="flex items-center justify-center p-4 space-x-4">
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-md  focus:outline-none focus:ring-2 focus:ring-red-400">
                                Kirim
                            </button>
                            <button type="button" data-modal-hide="tambah"
                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700  rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
                                Batal
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
