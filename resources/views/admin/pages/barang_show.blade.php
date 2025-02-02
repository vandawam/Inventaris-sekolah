@extends('admin.layouts.index')
@section('title', $title)

@section('content')
    <div class=" px-7 justify-center flex flex-col items-center mt-10">
        <div class=" absolute top-28 left-10">
        </div>
        <div class=" mt-12 flex gap-5 flex-wrap w-full border border-black p-10 rounded-xl shadow-lg">
            <div class="flex flex-col gap-2 w-[100%] ">
                <div class=" text-4xl font-extrabold flex gap-5 items-center">
                    {{ $barang->nama }}
                    <button data-modal-target="statusModal" data-modal-toggle="statusModal"
                        class="text-xl font-semibold px-4 py-2 text-white rounded-lg
                    @if ($barang->statusBarangs->status === 'Baik') bg-green-600
                    @elseif($barang->statusBarangs->status === 'Rusak')
                            bg-yellow-600
                    @elseif($barang->statusBarangs->status === 'Hilang')
                            bg-red-600
                    @else
                            bg-gray-600 @endif">
                        {{ $barang->statusBarangs->status }}
                    </button>
                    <div id="statusModal" tabindex="-1"
                        class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-fit h-full p-7 md:h-auto">
                            <form action="{{ route('barang.status', $barang->id) }}" method="POST">
                                @csrf
                                <div class="bg-white rounded-lg shadow dark:bg-gray-700 px-16">
                                    <div class="p-5 w-full flex flex-col items-center">
                                        <select name="status"
                                            class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2"
                                            id="">
                                            <option value="Baik"
                                                {{ $barang->statusBarangs->status === 'Baik' ? 'selected' : '' }}>Baik
                                            </option>
                                            <option value="Rusak"
                                                {{ $barang->statusBarangs->status === 'Rusak' ? 'selected' : '' }}>Rusak
                                            </option>
                                            <option value="Hilang"
                                                {{ $barang->statusBarangs->status === 'Hilang' ? 'selected' : '' }}>Hilang
                                            </option>
                                        </select>
                                    </div>
                                    <div class="flex items-center justify-center p-4 space-x-4">
                                        <button type="submit"
                                            class="px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-md  focus:outline-none focus:ring-2 focus:ring-red-400">
                                            Kirim
                                        </button>
                                        <button type="button" data-modal-hide="statusModal"
                                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700  rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
                                            Batal
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <button data-modal-target="editModal" data-modal-toggle="editModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-pencil" viewBox="0 0 16 16">
                            <path
                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                        </svg>
                    </button>
                    <button data-modal-target="deleteModal" data-modal-toggle="deleteModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-trash" viewBox="0 0 16 16">
                            <path
                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                            <path
                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                        </svg>
                    </button>

                </div>
                <div class=" text-xl font-semibold">
                    {{ $barang->jurusan->nama }}
                </div>
                <div class=" text-xl font-semibold">
                    {{ $barang->lokasi->nama }}
                </div>
                <div class=" text-lg font-normal">
                    Penanggung jawab :{{ $barang->user->name }}
                </div>
                <div class=" text-lg font-normal">
                    Kategori : {{ $barang->kategori }}
                </div>
                <div class=" text-lg font-normal">
                    Spesifikasi : {{ $barang->spesifikasi }}
                </div>
                <div class=" text-lg font-normal">
                    Sumber Dana : {{ $barang->sumber_dana }}
                </div>
                <div class=" text-lg font-normal">
                    Nilai : Rp {{ number_format($barang->nilai, 0, ',', '.') }}
                </div>
                <div class=" text-lg font-normal">
                    Tanggal Beli : {{ $barang->tanggal_beli }}
                </div>
            </div>
            <div class=" w-full items-center flex flex-col">
                <div class="text-2xl mt-4 mb-2 font-bold"> Riwayat Perbaikan</div>
                <button data-modal-target="tambahModal" data-modal-toggle="tambahModal"
                    class="font-semibold bg-[#FA6601] text-white text-base rounded-lg py-1 px-2 self-end">Tambah
                    Riwayat</button>
                <table class="w-full border-collapse text-left">
                    <thead>
                        <tr class="border-b border-black font-bold">
                            <th class="px-4 py-2 font-extrabold ">Penanggung Jawab</th>
                            <th class="px-4 py-2 font-extrabold ">Tanggal Perbaikan</th>
                            <th class="px-4 py-2 font-extrabold ">Harga Perbaikan</th>
                            <th class="px-4 py-2 font-extrabold ">Status</th>
                            <th class="px-4 py-2 font-extrabold ">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang->riwayatPerbaikans as $item)
                            <tr class="border-b border-gray-300 hover:bg-gray-100 transition duration-150">
                                <!-- Nama (link ke detail barang) -->
                                <td class="px-4 py-2">
                                    {{ $item->user->name }}
                                </td>
                                <!-- Kategori -->
                                <td class="px-4 py-2">
                                    {{ $item->tanggal_perbaikan }}
                                </td>
                                <!-- Sumber Dana -->
                                <td class="px-4 py-2">
                                    {{ 'Rp ' . number_format($item->harga_perbaikan, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ $item->status }}
                                </td>
                                <td class="px-4 py-2">
                                    <a href="/admin/riwayat/{{ $item->id }}"
                                        class="font-medium bg-[#FA6601] text-white text-xs rounded-lg py-1 px-2 hover:underline">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="editModal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-fit h-full p-7 md:h-auto">
                <form action="{{ route('Barang.update', $barang->id) }}" method="POST">
                    @csrf
                    <div class="bg-white rounded-lg shadow dark:bg-gray-700 px-16">
                        <div class=" flex w-full justify-center gap-4">
                            <div class="p-5 w-full flex flex-col items-center">
                                <div class="mb-2 flex flex-col w-full">
                                    <label class="mb-1 font-medium text-xs">Nama <span style="color: red">*</span></label>
                                    <input type="text" name="nama" id="nama" placeholder="Nama"
                                        value="{{ $barang->nama }}"
                                        class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2"
                                        required>

                                </div>
                                <div class="mb-2 flex flex-col w-full">
                                    <label class="mb-1 font-medium text-xs">Jurusan <span
                                            style="color: red">*</span></label>
                                    <select name="jurusan_id" id=""
                                        class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2">
                                        @foreach ($jurusan as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $barang->jurusan_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="mb-2 flex flex-col w-full">
                                    <label class="mb-1 font-medium text-xs">Penanggung Jawab <span
                                            style="color: red">*</span></label>
                                    <select name="user_id" id=""
                                        class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2">
                                        @foreach ($user as $item)
                                            <option
                                                value="{{ $item->id }} {{ $barang->user_id == $item->id ? 'selected' : '' }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="mb-2 flex flex-col w-full">
                                    <label class="mb-1 font-medium text-xs">Lokasi <span
                                            style="color: red">*</span></label>
                                    <select name="lokasi_id" id=""
                                        class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2">
                                        @foreach ($lokasi as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $barang->lokasi_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="mb-2 flex flex-col w-full">
                                    <label class="mb-1 font-medium text-xs">Kategori <span
                                            style="color: red">*</span></label>
                                    <input type="text" name="kategori" id="kategori" placeholder="kategori"
                                        value="{{ $barang->kategori }}"
                                        class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2"
                                        required>

                                </div>


                            </div>
                            <div class="p-5 w-full flex flex-col items-center">
                                <div class="mb-2 flex flex-col w-full">
                                    <label class="mb-1 font-medium text-xs">Tanggal Beli <span
                                            style="color: red">*</span></label>
                                    <input type="date" name="tanggal_beli" id="tanggal_beli"
                                        placeholder="tanggal_beli" value="{{ $barang->tanggal_beli }}"
                                        class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2"
                                        required>

                                </div>
                                <div class="mb-2 flex flex-col w-full">
                                    <label class="mb-1 font-medium text-xs">Spesifikasi <span
                                            style="color: red">*</span></label>
                                    <textarea name="spesifikasi" id="" cols="10" rows="3"
                                        class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2" required>{{ $barang->spesifikasi }}</textarea>

                                </div>
                                <div class="mb-2 flex flex-col w-full">
                                    <label class="mb-1 font-medium text-xs">Sumber Dana <span
                                            style="color: red">*</span></label>
                                    <input type="text" name="sumber_dana" id="sumber_dana" placeholder="sumber_dana"
                                        value="{{ $barang->sumber_dana }}"
                                        class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2"
                                        required>

                                </div>
                                <div class="mb-2 flex flex-col w-full">
                                    <label class="mb-1 font-medium text-xs">Nilai <span
                                            style="color: red">*</span></label>
                                    <input type="text" name="nilai" id="nilai" placeholder="nilai"
                                        value="{{ $barang->nilai }}"
                                        class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2"
                                        required>

                                </div>
                            </div>
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
        <div id="deleteModal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-fit h-full p-7 md:h-auto">
                <form action="{{ route('Barang.destroy', $barang->id) }}" method="POST">
                    @csrf
                    <div class="bg-white rounded-lg shadow dark:bg-gray-700 px-16">
                        <div class="p-5 w-full flex flex-col items-center">
                            <div>
                                Anda yakin ingin menghapus?
                            </div>
                        </div>
                        <div class="flex items-center justify-center p-4 space-x-4">
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-md  focus:outline-none focus:ring-2 focus:ring-red-400">
                                Hapus
                            </button>
                            <button type="button" data-modal-hide="deleteModal"
                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700  rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
                                Batal
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="tambahModal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-fit h-full p-7 md:h-auto">
                <form action="{{ route('Riwayat.store') }}" method="POST">
                    @csrf
                    <div class="bg-white rounded-lg shadow dark:bg-gray-700 px-16">
                        <div class="p-5 w-full flex flex-col items-center">
                            <input type="hidden" name="barang_id" value="{{ $barang->id }}" id="">
                            <select name="user_id" id=""
                                class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2">
                                @foreach ($teknisi as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            <select name="status"
                                class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2"
                                id="">
                                <option value="Pending" >
                                    Pending
                                </option>
                                <option value="Proses">
                                    Proses
                                </option>
                                <option value="Selesai">
                                    Selesai
                                </option>
                            </select>
                            <div class="mb-2 flex flex-col w-full">
                                <label class="mb-1 font-medium text-xs">Tanggal Perbaikan <span
                                        style="color: red">*</span></label>
                                <input type="date" name="tanggal_perbaikan" id="tanggal_perbaikan"
                                    placeholder="tanggal_perbaikan"
                                    class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2" required>

                            </div>
                            <div class="mb-2 flex flex-col w-full">
                                <label class="mb-1 font-medium text-xs">Harga Perbaikan <span
                                        style="color: red">*</span></label>
                                <input type="text" name="harga_perbaikan" id="harga_perbaikan"
                                    placeholder="harga_perbaikan"
                                    class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2" required>

                            </div>
                            <div class="mb-2 flex flex-col w-full">
                                <label class="mb-1 font-medium text-xs">Detail <span style="color: red">*</span></label>
                                <textarea name="detail" id="" cols="10" rows="3"
                                    class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2" required></textarea>

                            </div>
                        </div>
                        <div class="flex items-center justify-center p-4 space-x-4">
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-md  focus:outline-none focus:ring-2 focus:ring-red-400">
                                Kirim
                            </button>
                            <button type="button" data-modal-hide="tambahModal"
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
