<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task List with Laravel 10</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @yield('styles')
    {{-- blade-formatter-disable --}}
  <style type="text/tailwindcss">
    .link {
      @apply border rounded px-3 py-2 cursor-pointer hover:font-medium hover:bg-black hover:text-white hover:border-none
    }
    .label, .content {
      @apply block border px-2 py-3
    }
    .label {
      @apply bg-gray-300 text-black font-medium italic max-w-max mb-2
    }
    .content {
      @apply bg-white resize-none w-full
    }
    .err-msg {
      @apply text-red-500 text-sm
    }
    .completed {
      @apply text-green-500
    }
    .uncompleted {
      @apply text-red-500
    }
  </style>
  {{-- blade-formatter-enable --}}
</head>

<body class="container mx-auto max-w-3xl">
    <h1 class="my-4 text-center text-2xl font-bold">@yield('title')</h1>

    <div x-data="{ flash: true }">
        @if (session()->has('success'))
            <div x-show="flash"
                class="relative my-5 border rounded border-green-500 px-2 py-4 bg-green-300 text-green-700">
                <h3>Success!</h3>
                <p>{{ session('success') }}</p>
                <span x-on:click="flash = false" class="absolute top-0 right-0 p-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
        @endif

        @yield('content')
    </div>
</body>

</html>
