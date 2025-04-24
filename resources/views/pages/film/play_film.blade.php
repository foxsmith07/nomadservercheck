<x-layout>

    <form action="{{route('film.select')}}" method="POST">
        <h1>Train {{$train}}</h1>
        <input type="text" class="hidden" name="train">
        <p>hai cercato {{$search == '' ? 'NULLA' : $search}}</p>
        <input type="text" class="hidden" name="search" value="LAST-FILM-SHOW">

        <button class="btn bg-red-300">Play</button>
    </form>
</x-layout>