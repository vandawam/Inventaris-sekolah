@vite(['resources/css/app.css','resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body >
    <div class="w-full min-h-screen">
        <div class="sticky top-0 z-50">
            @include('page.navbar')
        </div>
        <div>
            @yield('content')
        </div>
    </div>
</body>
</html>
