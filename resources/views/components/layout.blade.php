<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="asset/logo_small.png" type="image/x-icon">
    {{-- <link rel="icon" type="image/x-icon" href="/asset/logo_small.png"> --}}
    <title>Nomad Service Desk</title>
    @livewireStyles
</head>

<body class="bg-[#F1F2F7]">

    <div class=" grid grid-cols-12 h-screen">
        <section class="col-span-2 h-screen bg-[#282D3E]">
            <x-layout.sidebar />
        </section>

        <main class="col-span-10 overflow-y-scroll">
            <x-layout.navbar />
            <div class=" p-5 overflow-y-scroll">
                {{ $slot }}
            </div>
        </main>
    </div>


    <x-layout.footer />

    <script src="https://kit.fontawesome.com/57bd6dffc2.js" crossorigin="anonymous"></script>
    @livewireScripts
</body>

</html>
