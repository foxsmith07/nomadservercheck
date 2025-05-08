<x-layout>
    <a href="{{route('movie.index')}}" class="btn btn-sm bg-slate-300 border-none mb-4 hover:bg-slate-400">
        <i class="fa-regular fa-circle-left text-xl"></i>
        Torna indietro
    </a>
    
    <h1 class="text-3xl">MOVIE TO SEND on <span class="text-blue-500">TRAIN {{ $train ?? null}}</span></h1>

    <div class="mt-8 mb-3">
        <p class="mb-3">Movie found:</p>
        
        <div class="overflow-y-scroll bg-white rounded-sm shadow-xl p-4 w-[500px]" style="max-height: 400px">
            @php
                $moviesArray = explode("\n", $movies);
            @endphp
            <ul>
                @foreach ($moviesArray as $movie)
                    <li class="cursor-pointer hover:bg-gray-100 p-2" onclick="selectMovie('{{ trim($movie) }}')">{{ trim($movie) }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <form action="{{route('movie.play')}}" method="POST" x-data="{ isLoading: false }" @submit="isLoading = true">
        @csrf
        <div class="mt-8">
            <input type="text" id="selectedMovie" name="film" class="shadow-xl border @error('film') border-red-500  @enderror rounded-md p-2 w-full sm:w-96" value="{{trim($movie)}}" readonly placeholder="Clicca sul film per selezionarlo">
        </div>
        @error('film')
            <small>{{ $message }}</small>
        @enderror

        <input type="text" name="train" class="hidden" value="{{$train}}">
        
        <button type="submit" class="btn bg-red-400 hover:bg-red-600 text-white mt-10 rounded-sm text-xl w-48 shadow-xl" :disabled="isLoading">
            <i class="fa-solid fa-play"></i>
            <span x-text="isLoading ? 'Sending...' : 'play'"></span>
        </button>
    </form>

    <script>
        function selectMovie(movieName) {
            document.getElementById('selectedMovie').value = movieName;
        }
    </script>

    @session('nofilm')
        <h1>{{session('nofilm')}}</h1>
    @endsession

</x-layout>