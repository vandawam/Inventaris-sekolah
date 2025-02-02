@extends('admin.layouts.index')
@section('title', $title)

@section('content')
    <div class=" px-7 justify-center flex flex-col items-center mt-10">
        <div class=" absolute top-28 left-10">
        </div>
        <div class=" mt-12 flex gap-5 flex-wrap w-full border border-black p-10 rounded-xl shadow-lg">
            <div class="flex flex-col gap-2 w-full">
                <div class=" text-4xl font-extrabold flex gap-5">
                    {{ $riwayat->barang->nama }}
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
                    Tanggal : {{ $riwayat->tanggal_perbaikan }}
                </div>
                <div class=" text-lg font-normal">
                    Penanggung jawab : {{ $riwayat->user->name }}
                </div>
                <div class="text-lg font-normal">
                    Harga : Rp {{ number_format($riwayat->harga_perbaikan, 0, ',', '.') }}
                </div>
                <div class="text-lg font-normal">
                    Status : {{ $riwayat->status }}
                </div>
                <div class="text-lg font-normal">
                    Detail : {{ $riwayat->detail }}
                </div>
            </div>

        </div>
        <div id="editModal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-fit h-full p-7 md:h-auto">
                <form action="{{ route('Riwayat.update', $riwayat->id) }}" method="POST">
                    @csrf
                    <div class="bg-white rounded-lg shadow dark:bg-gray-700 px-16">
                        <div class="p-5 w-full flex flex-col items-center">
                            <div class="mb-2 flex flex-col w-full">
                                <label class="mb-1 font-medium text-xs">Tanggal <span style="color: red">*</span></label>
                                <input type="date" name="tanggal_perbaikan" id="nama" placeholder="Nama"
                                    value="{{ $riwayat->tanggal_perbaikan }}"
                                    class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2" required>

                            </div>
                            <input type="hidden" name="barang_id" id="" value="{{ $riwayat->barang_id }}">

                            <select name="user_id" id=""
                                class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2">
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $riwayat->user_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>

                            <select name="status"
                                class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2" id="">
                                <option value="Pending" {{ $riwayat->status === 'Pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="Proses" {{ $riwayat->status === 'Proses' ? 'selected' : '' }}>Proses
                                </option>
                                <option value="Selesai" {{ $riwayat->status === 'Selesai' ? 'selected' : '' }}>Selesai
                                </option>
                            </select>

                            <div class="mb-2 flex flex-col w-full">
                                <label class="mb-1 font-medium text-xs">Harga <span style="color: red">*</span></label>
                                <input type="number" name="harga_perbaikan" id="nama" placeholder="Nama"
                                    value="{{ $riwayat->harga_perbaikan }}"
                                    class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2" required>
                            </div>
                            <div class="mb-2 flex flex-col w-full">
                                <label class="mb-1 font-medium text-xs">Detail <span style="color: red">*</span></label>
                                <textarea name="detail" id="" cols="10" rows="3"
                                    class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2" required>{{ $riwayat->detail }}</textarea>
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
                <form action="{{ route('Riwayat.destroy', $riwayat->id) }}" method="POST">
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
    </div>
@endsection
