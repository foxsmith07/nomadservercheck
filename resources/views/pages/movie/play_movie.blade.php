<x-layout>
    <h1 class="text-3xl">Movie to send Train "ro complete"</h1>

        {{-- <p class="my-8">Movie found:</p>
        @session('movies')
        <pre class="overflow-y-scroll bg-white rounded-sm shadow-xl p-4 w-[500px]" style="max-height: 500px">
            {{ session('movies') }} 
        </pre>
        @endsession --}}
{{-- ----------------------------------------------------------------------------------------------- --}}



<p class="my-8">Movie found:</p>
<div class="my-4">
    <input type="text" id="selectedMovie" class="shadow-sm border rounded-md p-2 w-full sm:w-96" disabled placeholder="Clicca sul film per selezionarlo">
</div>
<div class="overflow-y-scroll bg-white rounded-sm shadow-xl p-4 w-[500px]" style="max-height: 500px">
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
</div>

<button class="btn bg-red-400 text-white mt-10">play</button>

<script>
    function selectMovie(movieName) {
        document.getElementById('selectedMovie').value = movieName;
    }
</script>

{{-- ------------------------------------------------------------------ --}}
</x-layout>