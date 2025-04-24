<x-layout>
    <h1 class="text-3xl">MOVIE TO SEND <span class="text-blue-500">TRAIN {{ $train ?? null}}</span></h1>

{{-- ----------------------------------------------------------------------------------------------- --}}

<p class="mt-8 mb-3">Movie found:</p>

{{-- <div class="overflow-y-scroll bg-white rounded-sm shadow-xl p-4 w-[500px]" style="max-height: 500px">
    @session('movies')
        @php
            $moviesArray = explode("\n", session('movies'));
        @endphp
        <ul>
            @foreach ($moviesArray as $movie)
                <li class="cursor-pointer hover:bg-gray-100 p-2" onclick="selectMovie('{{ trim($movie) }}')">{{ trim($movie) }}</li>
            @endforeach
        </ul>
    @endsession
</div> --}}

<div class="overflow-y-scroll bg-white rounded-sm shadow-xl p-4 w-[500px]" style="max-height: 500px">
    @php
        $moviesArray = explode("\n", $movies);
    @endphp
    <ul>
        @foreach ($moviesArray as $movie)
            <li class="cursor-pointer hover:bg-gray-100 p-2" onclick="selectMovie('{{ trim($movie) }}')">{{ trim($movie) }}</li>
        @endforeach
    </ul>
</div>

<form action="{{route('movie.play')}}" method="post">
    @csrf
    <div class="mt-8">
        <input type="text" id="selectedMovie" name="film" class="shadow-sm border rounded-md p-2 w-full sm:w-96" value="{{trim($movie)}}" placeholder="Clicca sul film per selezionarlo">
    </div>
    <input type="text" name="train" class="hidden" value="{{$train}}">
    
    <button type="submit" class="btn bg-red-400 text-white mt-10 rounded-sm text-xl w-48"><i class="fa-solid fa-play"></i> play</button>
</form>

<script>
    function selectMovie(movieName) {
        document.getElementById('selectedMovie').value = movieName;
    }
</script>

{{-- ------------------------------------------------------------------ --}}
