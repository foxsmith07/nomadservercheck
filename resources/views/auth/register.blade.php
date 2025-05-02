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

    <main class="grid grid-cols-2 h-screen">


        <section class=" col-span-1 flex flex-col justify-center items-center">
            <img src="/asset/logo2.png" alt="nomad_logo" class="mb-10">
            <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-5">
                @csrf
                <h1 class="text-center text-3xl mb-5">Register</h1>

                <input type="text" name="name" class="input-custom" placeholder="Username" value="{{old('name')}}">
                @error('name')
                    <small class="text-red-700 block">{{$message}}</small>
                @enderror
                <input type="email" name="email" class="input-custom" placeholder="Email" value="{{old('email')}}">
                @error('email')
                    <small class="text-red-700 block">{{$message}}</small>
                @enderror

                <input type="password" name="password" class="input-custom" placeholder="Password">
                @error('password')
                    <small class="text-red-700 block">{{$message}}</small>
                @enderror

                <input type="password" name="password_confirmation" class="input-custom"
                    placeholder="Password Confirmation">
                @error('password_confirmation')
                    <small class="text-red-700 block">{{$message}}</small>
                @enderror

                <button class="btn bg-yellow-500 text-white rounded-md hover:bg-yellow-700 p3">Register</button>

            </form>
        </section>

        <section
            {{-- class="col-span-1 bg-[url(https://images.unsplash.com/photo-1495313196544-7d1adf4e628f?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D)]
                        bg-cover bg-center"> --}}
            class="col-span-1 bg-cover bg-center" style="background-image: url('{{ asset('asset/login.png') }}')">

        </section>
    </main>
</body>

</html>
