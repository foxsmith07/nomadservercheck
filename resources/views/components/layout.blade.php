<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="{{ asset('asset/logosmall2.png') }}" type="image/x-icon">
    <title>Nomad Service Desk</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @livewireStyles
</head>

<body class="bg-[#F1F2F7]">

    <div class="lg:grid lg:grid-cols-12 h-screen">
        <section class="hidden lg:block col-span-2 h-screen bg-[#282D3E]">
            <x-layout.sidebar />
        </section>

        <main class="col-span-10 overflow-y-scroll">
            <x-layout.navbar />
            <div class=" p-8">
                {{ $slot }}
            </div>
        </main>
    </div>


    <x-layout.footer />

    <script src="https://kit.fontawesome.com/57bd6dffc2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts

</body>

</html>
