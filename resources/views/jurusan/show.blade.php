@extends('page.layout')
@section('title', $title)

@section('content')
    <div class=" px-7 justify-center flex flex-col items-center mt-10">
        <div class=" absolute top-28 left-10">
            <button type="button" onclick="window.history.back();">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg>
            </button>
        </div>
        <div class=" mt-12 flex gap-5 flex-wrap w-full border border-black p-10 rounded-xl shadow-lg">
            <div class="flex flex-col gap-2 w-[30%] border-r border-black">
                <div class=" text-4xl font-extrabold flex gap-5">
                    {{ $lokasi->nama }}
                    <button data-modal-target="editModal"
                        data-modal-toggle="editModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                          </svg>
                        </button>

                </div>
                <div class=" text-xl font-semibold">
                    {{ $lokasi->jurusan->nama }}
                </div>
                <div class=" text-lg font-normal">
                    Penanggung jawab :{{ $lokasi->user->name }}
                </div>
            </div>
            <div class=" w-[60%]">
                @foreach ( $lokasi->barangs as $item )
                <a href="/barang/{{ $item->id }}" class="border-b border-black mb-3 flex justify-between">
                    <div class=" font-bold">{{ $item->nama }}</div>
                    <div>{{ $item->kategori }}</div>
                    <div>{{ $item->sumber_dana }}</div>
                </a>
                @endforeach
            </div>
        </div>
        <div id="editModal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-fit h-full p-7 md:h-auto">
                <form action="{{ route('Lokasi.update', $lokasi->id) }}" method="POST">
                    @csrf
                    <div class="bg-white rounded-lg shadow dark:bg-gray-700 px-16">
                        <div class="p-5 w-full flex flex-col items-center">
                            <div class="mb-2 flex flex-col w-full">
                                <label class="mb-1 font-medium text-xs">Nama <span
                                        style="color: red">*</span></label>
                                <input type="text" name="nama" id="nama" placeholder="Nama"
                                    value="{{ $lokasi->nama }}"
                                    class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2"
                                    required>

                            </div>
                            <select name="jurusan_id" id=""
                            class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2">
                                @foreach ( $jurusan as $item )
                                <option value="{{ $item->id }}" {{ $lokasi->jurusan_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center justify-center p-4 space-x-4">
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-md  focus:outline-none focus:ring-2 focus:ring-red-400">
                                Kirim
                            </button>
                            <button type="button" data-modal-hide="editModal"
                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700  rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
                                Batal
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
