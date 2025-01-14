@php
    $user = auth()->user();
@endphp

<div class="flex h-20 items-center justify-between">
    <div class="font-semibold text-2xl">
        {{ $title }}
    </div>
    <div class="font-semibold text-2xl">
        <a href="/logout">Logout</a>
    </div>
</div>
