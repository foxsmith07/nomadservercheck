<x-layout>
    <h1 class="text-3xl mb-5">Command on Trains</h1>

    <form action="{{route('cmd.run')}}" method="POST" class="bg-white rounded-md shadow-xl p-5 max-w-[500px] flex flex-col gap-8">
        @csrf
        <div class="flex flex-col">
            <label class="mb-3">Command to run</label>
            <input type="text" name="cmd" class="input-custom">
        </div>

        <div class="mb-3 flex flex-col">
            <label class="mb-3">Select 1 train or all</label>
            <select name="train" class="input-custom">
                <option value="all">All Fleet</option>
                <option value="iob">All Trains IOB</option>
                <option value="deb10">All Trains deb10</option>
                @foreach ($trains as $train)
                    <option value="{{$train->id}}">{{$train->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn bg-blue-500 text-white">
            Run command
        </button>

    </form>
</x-layout>