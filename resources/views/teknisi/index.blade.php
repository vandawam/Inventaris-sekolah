@extends('page.layout')
@section('title', $title)

@section('content')
    <div class=" px-7 justify-center flex flex-col items-center mt-10">
        <div>
            @if ($errors->any())
            <div class="mt-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                {{ $errors->first() }}
            </div>
            @endif
        </div>
        <div class=" mt-10 flex gap-5 flex-wrap justify-center mb-10">
            @foreach ($data as $item)
                <a href="/teknisi/detail/{{ $item->id }}"
                    class="block w-96 p-6 pr-14 bg-gray-50 border-2 border-gray-200 rounded-lg shadow-xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <h5 class=" text-2xl font-bold tracking-tight text-yellow-800 dark:text-white">{{ $item->barang->nama }}</h5>
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-400">Lokasi : {{ $item->barang->lokasi->nama }}</p>
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-400">Tanggal : {{ $item->tanggal_perbaikan }}</p>
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-400">Status : {{ $item->status }}</p>
                </a>
            @endforeach
        </div>
    </div>
@endsection
