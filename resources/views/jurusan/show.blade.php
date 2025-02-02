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
                    {{ $jurusan->nama }}

                </div>
                <div class=" text-xl font-semibold">
                    {{ $jurusan->nama }}
                </div>
            </div>
            <div class=" w-[60%]">
                <table class="w-full border-collapse text-center">
                    <thead>
                        <tr class="border-b border-black">
                            <th class="px-4 py-2 font-extrabold ">Nama Lokasi</th>
                            <th class="px-4 py-2 font-extrabold ">Penanggung Jawab</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jurusan->lokasis as $item)
                            <tr class="border-b border-gray-300 hover:bg-gray-100 transition duration-150">
                                <!-- Nama (link ke detail barang) -->
                                <td class="px-4 py-2 font-bold">
                                    <a href="/lokasi/{{ $item->id }}">
                                        {{ $item->nama }}
                                    </a>
                                </td>
                                <!-- Kategori -->
                                <td class="px-4 py-2">
                                    {{ $item->user->name }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        <div class="mt-10 border-t-2 w-full border-black">
            <table class="w-full border-collapse text-center">
                <thead>
                    <tr class="border-b border-black">
                        <th class="px-4 py-2 font-extrabold ">Nama Barang</th>
                        <th class="px-4 py-2 font-extrabold ">Kategori</th>
                        <th class="px-4 py-2 font-extrabold ">Sumber Dana</th>
                        <th class="px-4 py-2 font-extrabold ">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jurusan->barangs as $item)
                        <tr class="border-b border-gray-300 hover:bg-gray-100 transition duration-150">
                            <!-- Nama (link ke detail barang) -->
                            <td class="px-4 py-2 font-bold">
                                <a href="/barang/{{ $item->id }}">
                                    {{ $item->nama }}
                                </a>
                            </td>
                            <!-- Kategori -->
                            <td class="px-4 py-2">
                                {{ $item->kategori }}
                            </td>
                            <!-- Sumber Dana -->
                            <td class="px-4 py-2">
                                {{ $item->sumber_dana }}
                            </td>
                            <td class="px-4 py-2">
                                <span
                                    class="text-base font-semibold px-3 py-1 text-white rounded-lg
                                    @if ($item->statusBarangs->status === 'Baik') bg-green-600
                                    @elseif($item->statusBarangs->status === 'Rusak')
                                            bg-yellow-600
                                    @elseif($item->statusBarangs->status === 'Hilang')
                                            bg-red-600
                                    @else
                                            bg-gray-600 @endif">
                                    {{ $item->statusBarangs->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
@endsection
