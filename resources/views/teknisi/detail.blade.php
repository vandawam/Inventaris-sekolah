@extends('page.layout')
@section('title', $title)

@section('content')  
    <div class=" px-7 justify-center flex flex-col items-center mt-10">
        <div class=" mt-10 flex gap-5 flex-wrap w-full border border-black p-10 rounded-xl shadow-lg mb-10">
            <div class="flex flex-col gap-2 w-[100%] ">
                <div class=" text-4xl font-extrabold flex gap-5 items-center">
                    {{ $data->barang->nama }}
                    <button data-modal-target="statusModal" data-modal-toggle="statusModal"
                        class="text-xl font-semibold px-4 py-2 text-white rounded-lg
                    @if ($data->barang->statusBarangs->status === 'Baik') bg-green-600
                    @elseif($data->barang->statusBarangs->status === 'Rusak')
                            bg-yellow-600
                    @elseif($data->barang->statusBarangs->status === 'Hilang')
                            bg-red-600
                    @else
                            bg-gray-600 @endif">
                        {{ $data->barang->statusBarangs->status }}
                    </button>  

                </div>
                <div class=" text-xl font-semibold">
                    {{ $data->barang->jurusan->nama }}
                </div>
                <div class=" text-xl font-semibold">
                    {{ $data->barang->lokasi->nama }}
                </div>
                <div class=" text-lg font-normal">
                    Penanggung jawab :{{ $data->barang->user->name }}
                </div>
                <div class=" text-lg font-normal">
                    Kategori : {{ $data->barang->kategori }}
                </div>
                <div class=" text-lg font-normal">
                    Spesifikasi : {{ $data->barang->spesifikasi }}
                </div>
                <div class=" text-lg font-normal">
                    Sumber Dana : {{ $data->barang->sumber_dana }}
                </div>
                <div class=" text-lg font-normal">
                    Nilai : Rp {{ number_format($data->barang->nilai, 0, ',', '.') }}
                </div>
                <div class=" text-lg font-normal">
                    Tanggal Beli : {{ $data->barang->tanggal_beli }}
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
                        @foreach ($data->barang->riwayatPerbaikans as $item)
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
                                    <a href="/teknisi/riwayat/{{ $item->id }}"
                                        class="font-medium bg-[#FA6601] text-white text-xs rounded-lg py-1 px-2 hover:underline">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="tambahModal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-fit h-full p-7 md:h-auto">
                <form action="{{ route('Riwayat.store') }}" method="POST">
                    @csrf
                    <div class="bg-white rounded-lg shadow dark:bg-gray-700 px-16">
                        <div class="p-5 w-full flex flex-col items-center">
                            <input type="hidden" name="barang_id" value="{{ $data->barang->id }}" id="">
                            <input type="hidden" name="user_id" id="" value="{{ Auth::user()->id }}">
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
