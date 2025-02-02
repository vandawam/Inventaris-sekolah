@extends('page.layout')
@section('title', $title)

@section('content')
    <div class=" px-7 justify-center flex flex-col items-center mt-10">
        <div>
            <form action="" method="GET" class="flex flex-col gap-4 justify-center items-center">
                <!-- Form Search -->
                <div class="flex relative w-fit">
                    <input type="text" name="search" id="search" placeholder="Search..."
                        value="{{ request()->query('search') }}"
                        class="w-80 border border-gray-400 rounded-md px-3 py-2 text-lg text-black">
                    <button type="submit" class="absolute right-2 inset-y-0 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </button>
                </div>

                <!-- Form Filter Select -->
                <div class="flex items-center gap-4 justify-center">
                    <select name="jurusan" id="jurusan" class="border border-gray-400 rounded-md py-1 text-base"
                        onchange="this.form.submit()">
                        <option value="">Semua jurusan</option>
                        @foreach ($jurusan as $item)
                            <option value="{{ $item->id }}"
                                {{ request()->query('jurusan') == $item->id ? 'selected' : '' }}>{{ $item->nama }}
                            </option>
                        @endforeach
                    </select>

                    <select name="petugas" id="petugas" class="border border-gray-400 rounded-md py-1 text-base"
                        onchange="this.form.submit()">
                        <option value="">Semua Petugas</option>
                        @foreach ($user as $item)
                            <option value="{{ $item->id }}"
                                {{ request()->query('petugas') == $item->id ? 'selected' : '' }}>{{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <div>
            @if ($errors->any())
                <div class="mt-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                    {{ $errors->first() }}
                </div>
            @endif

        </div>
        <div class=" mt-12 flex gap-5 flex-wrap justify-center">
            @foreach ($lokasi as $item)
                <a href="/lokasi/{{ $item->id }}"
                    class="block w-96 shadow-xl p-6 pr-14 bg-gray-50 border-2 border-gray-200 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-blue-800 dark:text-white">{{ $item->nama }}
                    </h5>
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-400">Jurusan : {{ $item->jurusan->nama }}
                    </p>
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-400">Total barang :
                        {{ $item->barangs->count() }}</p>
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-400 mb-2">Penanggung jawab :
                        {{ $item->user->name }}</p>
                    @if (Auth::check() && $item->user->id == Auth::user()->id)
                        <p class="font-bold text-sm text-green-500 dark:text-gray-400">Punya Akses</p>
                    @elseif (Auth::check() && $item->user->id != Auth::user()->id)
                        <p class="font-bold text-sm text-red-500 dark:text-gray-400">Tidak Punya Akses</p>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
@endsection
