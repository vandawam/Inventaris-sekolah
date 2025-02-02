@extends('admin.layouts.index')

@section('title', $title)
@section('content')
    <div class="flex flex-col gap-4">

        {{-- Header --}}
        <div class="w-full flex justify-between mt-7">
            <div class="flex gap-3 items-center">
                <div class="bg-[#FA6601] rounded flex items-center justify-center">
                    <button data-modal-target="tambahModal" data-modal-toggle="tambahModal"
                        class="flex items-center justify-center text-white gap-3 py-2 px-4">
                        Tambah User
                        <svg width="20" height="20" viewBox="0 0 22 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.35156 10.6295H19.9094M10.6305 1.35059V19.9084" stroke="white" stroke-width="2.65112"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>

                    <div id="tambahModal" tabindex="-1"
                        class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-fit h-full p-7 md:h-auto">
                            <form action="{{ route('admin.tambah_akun') }}" method="POST">
                                @csrf
                                <div class="bg-white rounded-lg shadow dark:bg-gray-700 px-16">
                                    <div class="p-5 w-full flex flex-col items-center">
                                        <div class="mb-2 flex flex-col w-full">
                                            <label class="mb-1 font-medium text-xs">Nama <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="name" id="email" placeholder="Nama"
                                                value="{{ old('name') }}"
                                                class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2"
                                                required>

                                        </div>
                                        <div class="mb-2 flex flex-col w-full">
                                            <label class="mb-1 font-medium text-xs">Email <span
                                                    style="color: red">*</span></label>
                                            <input type="email" name="email" id="email" placeholder="Email"
                                                value="{{ old('email') }}"
                                                class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2"
                                                required>

                                        </div>
                                        <div class="mb-2 flex flex-col w-full">
                                            <label class="mb-1 font-medium text-xs">Kata Sandi <span
                                                    style="color: red">*</span></label>
                                            <input type="password" name="password" id="password" placeholder="Kata Sandi"
                                                value="{{ old('password') }}"
                                                class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2"
                                                required>
                                        </div>
                                        <select name="user" id=""
                                            class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2">
                                            <option value="admin">Admin</option>
                                            <option value="petugas">Petugas</option>
                                            <option value="teknisi">Teknisi</option>
                                        </select>
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
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 mx-10 mt-3 px-4 py-3 rounded relative mb-4">
                        <span class="block sm:inline">{{ $errors->first() }}</span>
                    </div>
                @endif
            </div>
        </div>

        {{-- Table --}}
        <div class="w-full border border-gray-500 py-5 px-4 rounded-xl">
            <table class="w-full text-sm text-left rtl:text-right  dark:text-gray-400">
                <thead class="text-xs text-center text-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 pb-10">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3 pb-10">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 pb-10">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3 pb-10">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 pb-10">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($akun as $akun)
                        <tr class="bg-white border-b text-center border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-2 py-4">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $akun->name }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $akun->role }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $akun->email }}
                            </td>
                            <td class="px-2 py-4 text-center flex gap-2 justify-center">
                                <button type="button" data-modal-target="deleteModal{{ $akun->id }}"
                                    data-modal-toggle="deleteModal{{ $akun->id }}"
                                    class="font-medium bg-[#FA6601] text-white text-xs rounded-lg py-1 px-1 hover:underline">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 2C7.44771 2 7 2.44772 7 3H4C3.44771 3 3 3.44772 3 4C3 4.55229 3.44771 5 4 5H20C20.5523 5 21 4.55229 21 4C21 3.44772 20.5523 3 20 3H17C17 2.44772 16.5523 2 16 2H8ZM6 7H18L17.1555 20.3303C17.0863 21.3763 16.2118 22.174 15.1644 22.174H8.83564C7.78821 22.174 6.91374 21.3763 6.84448 20.3303L6 7ZM10 10C9.44771 10 9 10.4477 9 11V18C9 18.5523 9.44771 19 10 19C10.5523 19 11 18.5523 11 18V11C11 10.4477 10.5523 10 10 10ZM14 10C13.4477 10 13 10.4477 13 11V18C13 18.5523 13.4477 19 14 19C14.5523 19 15 18.5523 15 18V11C15 10.4477 14.5523 10 14 10Z"
                                            fill="currentColor" />
                                    </svg></button>
                                <button type="button"
                                    data-modal-target="editModal{{ $akun->id }}"
                                    data-modal-toggle="editModal{{ $akun->id }}"
                                    class="font-medium
                                    bg-[#FA6601] text-white text-xs rounded-lg p-1 hover:underline">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.9487 2.27529C11.1842 1.51081 10.3503 1.677 10.0406 1.77414L10.0367 1.77537C10.0349 1.77592 10.0332 1.77668 10.0316 1.77763V1.77763V1.77763C10.0305 1.77835 10.0293 1.77921 10.0283 1.78019C10.0273 1.7812 10.0261 1.78237 10.0247 1.78374L10.0021 1.80625V1.80625C9.6825 2.12585 9.5227 2.28565 9.44814 2.46357C9.34658 2.70596 9.34658 2.97897 9.44814 3.22135C9.5227 3.39928 9.6825 3.55908 10.0021 3.87868L10.3453 4.22187C10.6649 4.54147 10.8247 4.70127 11.0026 4.77583C11.245 4.87739 11.518 4.87739 11.7604 4.77583C11.9383 4.70127 12.0981 4.54147 12.4177 4.22187V4.22187L12.4402 4.19926C12.4416 4.19787 12.4428 4.19667 12.4438 4.19563C12.4448 4.19463 12.4456 4.19352 12.4463 4.19232V4.19232V4.19232C12.4473 4.19075 12.448 4.18906 12.4486 4.18731L12.4498 4.18339C12.547 3.87369 12.7132 3.03977 11.9487 2.27529ZM9.46714 7.17246C9.85538 6.78422 10.0495 6.59009 10.1222 6.36625C10.1862 6.16935 10.1862 5.95724 10.1222 5.76034C10.0495 5.5365 9.85538 5.34237 9.46714 4.95413L9.26984 4.75684C8.8816 4.36859 8.68748 4.17447 8.46363 4.10174C8.26673 4.03776 8.05463 4.03776 7.85773 4.10174C7.63388 4.17447 7.43976 4.36859 7.05151 4.75684L2.14298 9.66537C2.0987 9.70965 2.07685 9.73164 2.06154 9.7482V9.7482C2.06081 9.74898 2.06033 9.74996 2.06017 9.75102V9.75102C2.05661 9.77329 2.05281 9.80405 2.04535 9.86623L1.78183 12.0623C1.75703 12.2689 1.7434 12.3869 1.74073 12.4721V12.4721C1.74054 12.4783 1.74565 12.4834 1.7519 12.4832V12.4832C1.8371 12.4806 1.95503 12.4669 2.16172 12.4421L4.35774 12.1786C4.41992 12.1712 4.45068 12.1674 4.47295 12.1638V12.1638C4.474 12.1636 4.47499 12.1632 4.47577 12.1624V12.1624C4.49233 12.1471 4.51432 12.1253 4.5586 12.081L9.46714 7.17246ZM9.69977 0.687599C10.186 0.535085 11.5517 0.26785 12.7539 1.47008C13.9561 2.67232 13.6889 4.03796 13.5364 4.5242C13.5225 4.56832 13.508 4.61383 13.4731 4.68632C13.4454 4.74379 13.3978 4.82249 13.3596 4.8736C13.31 4.9402 13.2648 4.98532 13.2291 5.02091C13.227 5.023 13.225 5.02505 13.2229 5.02708L5.36381 12.8862C5.35823 12.8918 5.35251 12.8975 5.34665 12.9034C5.28248 12.9679 5.20166 13.0491 5.10444 13.1135C5.02005 13.1695 4.92857 13.214 4.83242 13.2457C4.72165 13.2824 4.60788 13.2958 4.51756 13.3064C4.50931 13.3074 4.50125 13.3083 4.49342 13.3092L2.27658 13.5753C2.09824 13.5967 1.92931 13.617 1.78755 13.6214C1.63595 13.6262 1.44962 13.6166 1.26209 13.5321C1.00883 13.4179 0.806032 13.2151 0.691877 12.9619C0.607349 12.7743 0.597808 12.588 0.602557 12.4364C0.606997 12.2947 0.627287 12.1257 0.648706 11.9474L0.914729 9.73056C0.91567 9.72272 0.916617 9.71467 0.917588 9.70642C0.928221 9.61609 0.941613 9.50232 0.978223 9.39155C1.01 9.2954 1.05447 9.20392 1.11044 9.11953C1.17491 9.02231 1.2561 8.94149 1.32056 8.87733C1.32644 8.87147 1.33219 8.86574 1.33777 8.86016L9.19689 1.00104C9.19892 0.999016 9.20097 0.99696 9.20306 0.994871C9.23865 0.959218 9.28377 0.914016 9.35037 0.864329C9.40148 0.826197 9.48018 0.778522 9.53765 0.750877C9.61014 0.716006 9.65565 0.701439 9.69977 0.687599Z"
                                            fill="white" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <div id="editModal{{ $akun->id }}" tabindex="-1"
                            class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                            <div class="relative w-fit h-full p-7 md:h-auto">
                                <form action="{{ route('admin.edit_akun', $akun->id) }}" method="POST">
                                    @csrf
                                    <div class="bg-white rounded-lg shadow dark:bg-gray-700 px-16">
                                        <div class="p-5 w-full flex flex-col items-center">
                                            <div class="mb-2 flex flex-col w-full">
                                                <label class="mb-1 font-medium text-xs">Nama <span
                                                        style="color: red">*</span></label>
                                                <input type="text" name="name" id="email" placeholder="Nama"
                                                    value="{{ $akun->name }}"
                                                    class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2"
                                                    required>

                                            </div>
                                            <div class="mb-2 flex flex-col w-full">
                                                <label class="mb-1 font-medium text-xs">Email <span
                                                        style="color: red">*</span></label>
                                                <input type="email" name="email" id="email" placeholder="Email"
                                                    value="{{ $akun->email }}"
                                                    class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2"
                                                    required>

                                            </div>
                                            <div class="mb-2 flex flex-col w-full">
                                                <label class="mb-1 font-medium text-xs">Kata Sandi </label>
                                                <input type="password" name="password" id="password"
                                                    placeholder="Kata Sandi" value="{{ old('password') }}"
                                                    class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2"
                                                    >
                                            </div>
                                            <select name="user" id=""
                                                class=" w-full border-2  border-gray-400 rounded-md py-2 text-xs px-3 mb-2">
                                                <option value="admin" {{ $akun->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="petugas" {{ $akun->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                            </select>
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
                        <div id="deleteModal{{ $akun->id }}" tabindex="-1"
                            class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                            <div class="relative w-fit h-full p-7 md:h-auto">
                                <div class="bg-white rounded-lg shadow dark:bg-gray-700 px-16">
                                    <div class="p-5 w-full flex flex-col items-center">
                                        <svg width="81" height="90" viewBox="0 0 81 90" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.5 90C12.75 90 10.395 89.02 8.435 87.06C6.475 85.1 5.49667 82.7467 5.5 80V15H0.5V5H25.5V0H55.5V5H80.5V15H75.5V80C75.5 82.75 74.52 85.105 72.56 87.065C70.6 89.025 68.2467 90.0033 65.5 90H15.5ZM65.5 15H15.5V80H65.5V15ZM25.5 70H35.5V25H25.5V70ZM45.5 70H55.5V25H45.5V70Z"
                                                fill="#5C5C5C" />
                                        </svg>
                                        <p class="text-gray-800 dark:text-white mt-7">
                                            Yakin akan hapus akun ini?
                                        </p>
                                    </div>
                                    <div class="flex items-center justify-center p-4 space-x-4">
                                        <a href="{{ route('admin.delete_akun', $akun->id) }}"
                                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-md  focus:outline-none focus:ring-2 focus:ring-red-400">
                                            Hapus
                                        </a>
                                        <button type="button" data-modal-hide="deleteModal{{ $akun->id }}"
                                            class="px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
                                            Batal
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>





    <div id="successModal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-fit h-full p-4 md:h-auto">
            <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-medium text-green-600 dark:text-white flex items-center gap-2">
                        <svg width="30" height="30" viewBox="0 0 46 47" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M23 0C10.58 0 0.5 10.4386 0.5 23.3005C0.5 36.1624 10.58 46.601 23 46.601C35.42 46.601 45.5 36.1624 45.5 23.3005C45.5 10.4386 35.42 0 23 0ZM19.9387 33.4609C19.1524 34.2752 17.8476 34.2752 17.0613 33.4609L8.59155 24.6898C7.84317 23.9148 7.84317 22.6862 8.59155 21.9112L8.98579 21.503C9.77135 20.6895 11.0746 20.6886 11.8613 21.501L17.0612 26.8709C17.8479 27.6833 19.1512 27.6824 19.9367 26.8689L34.1337 12.1668C34.9219 11.3505 36.2307 11.3528 37.016 12.1719L37.4181 12.5912C38.1618 13.3669 38.1597 14.5916 37.4132 15.3647L19.9387 33.4609Z"
                                fill="#0CB44F" />
                        </svg>
                        @if (session('success'))
                            {{ session('success') }}
                        @endif
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to show the modal
            function showModal() {
                const modal = new Modal(document.getElementById('successModal'));
                modal.show();
            }

            // Check if there's a success message from the server
            @if (session('success'))
                showModal();
            @endif
        });
    </script>
@endsection
