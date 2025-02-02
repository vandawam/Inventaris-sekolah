
<div class=" w-full flex justify-between px-7 py-5 border-b-2 border-blue-200 shadow-xl bg-blue-800">
    <div class=" text-white font-bold text-xl">
        Inventarisasi
    </div>

    <div class=" flex gap-10">
        @if ($title == 'Lokasi')
            <div class=" text-white font-bold text-lg border-b-2 px-1 border-white ">
                <a href="/">Lokasi</a>
            </div>
        @else
            <div class=" text-white font-bold text-lg hover:border-b-2 px-1 border-white ">
                <a href="/">Lokasi</a>
            </div>
        @endif
        @if ($title == 'Barang')
            <div class=" text-white font-bold text-lg border-b-2 px-1 border-white ">
                <a href="/barang">Barang</a>
            </div>
        @else
            <div class=" text-white font-bold text-lg hover:border-b-2 px-1 border-white ">
                <a href="/barang">Barang</a>
            </div>
        @endif
        @if ($title == 'Jurusan')
            <div class=" text-white font-bold text-lg border-b-2 px-1 border-white ">
                <a href="/jurusan">Jurusan</a>
            </div>
        @else
            <div class=" text-white font-bold text-lg hover:border-b-2 px-1 border-white ">
                <a href="/jurusan">Jurusan</a>
            </div>
        @endif
        @if (Auth::check() && Auth::user()->role == 'admin')
            <div class=" text-white font-bold text-lg hover:border-b-2 px-1 border-white ">
                <a href="/admin">Admin</a>
            </div>
        @endif
        @if (Auth::check())
            <div class=" text-blue-800 bg-white rounded-md px-2 py-1 font-bold text-lg border-b-2 border-white ">
                <a href="/logout">Logout</a>
            </div>
        @else
            <div class=" text-blue-800 bg-white rounded-md px-2 py-1 font-bold text-lg border-white ">
                <a href="/login">Login</a>
            </div>
        @endif
    </div>
</div>
