<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="{{ asset('asset/favicon-3.png') }}" type="image/x-icon">
    <title>Nomad Service Desk</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
</head>

<body class=" bg-slate-200">

    <section class="lg:hidden p-8 h-screen bg-[url(https://images.unsplash.com/photo-1495313196544-7d1adf4e628f?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D)] bg-cover bg-center bg-black/50 bg-blend-multiply">
        <img src="/asset/logo2.png" alt="nomad_logo" class="mb-10">
        <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-5">
            @csrf
            <h1 class="text-center text-3xl mb-5 text-white">Login</h1>

            <input type="email" name="email" class="input-custom" placeholder="Username" autofocus>
            @error('email')
                <small class="text-red-500 block">{{ $message }}</small>
            @enderror
            <input type="password" name="password" class="input-custom" placeholder="Password">
            @error('password')
                <small class="text-red-500 block">{{ $message }}</small>
            @enderror

            <button class="btn bg-blue-500 text-white rounded-md hover:bg-blue-700 p3 border-none">Login</button>

        </form>
    </section>

    <main class="lg:grid grid-cols-2 h-screen hidden">

        <section
            {{-- class="col-span-1 bg-[url(https://images.unsplash.com/photo-1495313196544-7d1adf4e628f?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D)] bg-cover bg-center"> --}}
            class="col-span-1 bg-cover bg-center" style="background-image: url('{{ asset('asset/login.png') }}')">

        </section>

        <section class=" col-span-1 flex flex-col justify-center items-center">
            <img src="/asset/logo2.png" alt="nomad_logo" class="mb-10">
            <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-5">
                @csrf
                <h1 class="text-center text-3xl mb-5">Login</h1>

                <input type="email" name="email" class="input-custom" placeholder="Username">
                @error('email')
                    <small class="text-red-500 block">{{ $message }}</small>
                @enderror
                <input type="password" name="password" class="input-custom" placeholder="Password">
                @error('password')
                    <small class="text-red-500 block">{{ $message }}</small>
                @enderror

                <button class="btn bg-blue-500 text-white rounded-md hover:bg-blue-700 p3">Login</button>

            </form>
        </section>
    </main>
</body>

</html>
