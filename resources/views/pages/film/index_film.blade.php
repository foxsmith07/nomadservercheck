<x-layout>
    <h1>Film to send</h1>

    <form action="{{route('film.search')}}" method="POST">
        @csrf
        <div class="my-5">
            <label class="block">Train</label>
            <select name="train">
                {{-- @for ($train = 1; $train < 27; $train++)
                    <option value="{{$train}}">AGV {{$train}}</option>
                    @endfor --}}
                @forelse ($trains as $train)
                    <option value="{{$train}}">AGV {{$train}}</option>    
                @empty
                    <option disabled>No train!!</option>
                @endforelse
            </select>
        </div>
    
        <input type="text" placeholder="Cerca film" name="film" class="bg-white p-3 rounded-md">
    
        <button type="submit" class="btn bg-red-300">Cerca</button>
    </form>
</x-layout>