@extends('page.layout')
@section('title', $title)

@section('content')
    <div class=" px-7 justify-center flex flex-col items-center mt-10">
        <div>
            <form action="" class="flex relative">
                <input type="text" name="search" id="search" placeholder="Search..."
                    value="{{ request()->query('search') }}"
                    class="w-80 border border-gray-400 rounded-md px-3 py-2 text-lg text-black">
                <button type="submit" class=" absolute right-2 inset-y-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                </button>
            </form>
        </div>
        <div class=" mt-12 flex gap-5 flex-wrap justify-center">
            @foreach ($barang as $item)
                <a href="#"
                    class="block w-96 p-6 pr-14 bg-gray-50 border-2 border-gray-200 rounded-lg shadow-xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <h5 class=" text-2xl font-bold tracking-tight text-blue-800 dark:text-white">{{ $item->nama }}</h5>
                    <h3 class="mb-2 text-md font-normal text-gray-700 dark:text-gray-400">{{ $item->code }}</h3>
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-400">Ruang : {{ $item->ruangan->nama }}</p>
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-400">Status : {{ $item->status }}</p>
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-400">Detail : {{ $item->detail }}</p>
                </a>
            @endforeach
        </div>
    </div>
@endsection
