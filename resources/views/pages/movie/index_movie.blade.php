<x-layout>

    <h1 class="text-3xl mb-10">MOVIE TO SEND</h1>

    <form action="{{ route('movie.search') }}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="">Train</label>
            <select name="train" id="" class="rounded-md p-2 ms-5 bg-white">
                @foreach ($cinema as $train)
                    <option value="{{ $train }}">{{ $train }}</option>
                @endforeach
            </select>

            <div class="my-10">
                <label class="block mb-3">Insert Movie to search</label>
                <input type="text" name="search" class="bg-white p-2 rounded-sm">
            </div>

            <button class="btn bg-blue-500 text-white rounded-sm">Search</button>
        </div>
    </form>

    {{-- @session('movies')
    <pre>{{ session('movies') }} </pre>
    @endsession --}}
    
    @session('unreachable')
    <p class="font-bold text-red-500">{{ session('unreachable') }} </p>
    @endsession

    {{-- <div class="flex gap-5 my-12 text-5xl">
        <button class="btn btn-circle bg-red-500 w-[50px] h-[50px] border border-slate-500 hover:bg-red-700">
            <i class="fa-solid fa-stop text-3xl"></i>
        </button>
        <button class="btn btn-circle bg-sky-500 w-[50px] h-[50px] border border-slate-500 hover:bg-sky-700">
            <i class="fa-solid fa-play text-3xl"></i>
        </button>
        <button class="btn btn-circle bg-orange-400 w-[50px] h-[50px] border border-slate-500 hover:bg-orange-600">
            <i class="fa-solid fa-pause text-3xl"></i>
        </button>
    </div>

    <div class="grid grid-cols-4 gap-5 max-w-[400px] my-9 text-5xl">
        <i class="fa-solid fa-display text-red-600"></i>
        <i class="fa-solid fa-display"></i>
        <i class="fa-solid fa-display"></i>
        <i class="fa-solid fa-display"></i>
        <i class="fa-solid fa-display"></i>
        <i class="fa-solid fa-display"></i>
        <i class="fa-solid fa-display"></i>
        <i class="fa-solid fa-display"></i>
    </div> --}}
@session('output')
    <div>
        {{session('output')}}
        {{-- {{$film}} --}}
    </div>
@endsession
</x-layout>

@session('output')
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "{{ session('output') }}",
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endsession
