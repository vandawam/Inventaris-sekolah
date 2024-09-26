@vite(['resources/css/app.css','resources/js/app.js'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>
    <div class="bg-white overflow-hidden w-dvw h-dvh text-xs">
        <div class="h-dvh flex justify-between w-full items-center">
            <div class="w-full max-w-lg mx-auto p-8 my-10 ">

                {{-- Title --}}
                <div>
                    <div class="text-2xl text-center font-semibold text-[#FA6601] mb-3">Login</div>
                    <div class="text-center text-[#606060] mb-7">gunakan email Anda untuk Login</div>
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <span class="block sm:inline">{{ $errors->first() }}</span>
                        </div>
                    @endif
                    @if(session('message'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            <span class="block sm:inline">{{ session('message') }}</span>
                        </div>
                    @endif
                </div>

                {{-- Form --}}
                <form action="{{ route('login') }}" method="post">
                    @csrf

                    {{-- input Username --}}
                    <div class="mb-3 flex flex-col">
                        <label for="login" class="mb-2 font-medium">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email"
                            class="text-xs w-full border border-black rounded-md py-2 px-6 mb-3" required>
                    </div>

                    {{-- input Password --}}
                    <div class=" flex flex-col relative">
                        <label for="password" class="mb-2 font-medium">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password"
                            class="text-xs w-full border border-black rounded-md py-2 px-6 mb-3" required>
                        <button type="button" class="absolute inset-y-0 right-0 top-1/4 px-3"
                            onclick="togglePasswordVisibility()">
                            <svg id="openeye" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-eye hidden" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                            </svg>
                            <svg id="closeeye" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                <path
                                    d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                                <path
                                    d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                <path
                                    d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                            </svg>
                        </button>
                    </div>
                    <div class="mb-8 flex items-center justify-between">

                        {{-- custom checkbox --}}
                        <div>
                            <input type="checkbox" id="rememberMe" name="rememberMe" class="mr-2 appearance-none checked:bg-transparent checked:border-transparent checked:focus:ring-0 checked:focus:ring-offset-0 checked:focus:ring-transparent" style="width: 1rem; height: 1rem; border: 1px solid #000; position: relative;">
                            <label for="rememberMe" class="font-medium text-[#495057]">Ingat Saya</label>
                            <style>
                                input[type="checkbox"]:checked::before {
                                    content: "";
                                    position: absolute;
                                    top: -1px;
                                    left: -1px;
                                    width: 1rem;
                                    height: 1rem;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    color: #000;
                                    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/></svg>');
                                    background-size: contain;
                                    background-repeat: no-repeat;
                                }
                            </style>
                        </div>
                    </div>
                    <div class="w-full flex justify-center">
                        <button class=" bg-[#FA6601] text-white rounded-full py-3 px-16">MASUK</button>
                    </div>

                </form>
                <div>

                </div>

            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            document.getElementById('openeye').style.display = 'block';
            document.getElementById('closeeye').style.display = 'none';
        } else {
            passwordInput.type = 'password';
            document.getElementById('openeye').style.display = 'none';
            document.getElementById('closeeye').style.display = 'block';
        }
    }
</script>

</html>
