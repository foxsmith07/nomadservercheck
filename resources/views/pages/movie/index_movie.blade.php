<x-layout>

    <h1 class="text-3xl mb-10">MOVIE TO SEND</h1>

    <form action="{{ route('movie.search') }}" method="POST" class="bg-white p-8 max-w-[500px] rounded-md shadow-xl" x-data="{ isLoading: false }" @submit="isLoading = true">
        @csrf
        <div class="mb-5">
            <label class="block mb-3">Train</label>
            <select name="train" id="" class="rounded-md p-2 w-full bg-slate-100">
                @foreach ($cinema as $train)
                    <option value="{{ $train }}">AGV {{ $train }}</option>
                @endforeach
            </select>
        </div>

        <div class="my-10">
            <label class="block mb-3">Insert Movie to search</label>
            <input type="text" name="search" class="bg-slate-100 w-full p-2 rounded-sm">
        </div>

        <button type="submit" class="btn bg-blue-500 text-white rounded-sm w-1/2" :disabled="isLoading">
            <span x-text="isLoading ? 'Reaching train...' : 'Search'"></span>
            {{-- <span class="loading loading-dots loading-sm"></span> --}}
        </button>
    </form>

    
    @session('unreachable')
    <p class="font-bold text-red-500 mt-8">{{ session('unreachable') }} </p>
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
