<x-layout>

    <h1 class="text-3xl mb-8">Edit Train <span class="text-blue-700">{{$train->name}}</span></h1>
    <form action="{{route('train.update', compact('train'))}}" method="POST" class="bg-white rounded-md shadow-xl p-5 w-[500px]">
        @csrf
        @method('put')
        <div class="flex flex-col mb-3">
            <label for="number" class="mb-3">Train Number</label>
            <input type="text" name="number" id="number" 
                    class="bg-slate-100 p-3 rounded-md outline-0 focus:outline-2 focus:outline-blue-500 
                            @error('number') outline-2 outline-red-400 @enderror"
                    value="{{$train->number}}">
            @error('number')
                <small class="text-red-500">{{$message}}</small>
            @enderror
        </div>
        <div class="flex flex-col mb-3">
            <label for="name" class="mb-3">Train Name</label>
            <input type="text" name="name" id="name" 
                    class="bg-slate-100 p-3 rounded-md outline-0 focus:outline-2 focus:outline-blue-500 
                            @error('name') outline-2 outline-red-400 @enderror" 
                    value="{{$train->name}}">
            @error('name')
                <small class="text-red-500">{{$message}}</small>
            @enderror
        </div>
        <div class="flex flex-col mb-3">
            <label for="tipology" class="mb-3">Tipology</label>
            <select name="tipology" id="tipology" class="bg-slate-100 p-3 rounded-md">
                <option value="iob" {{$train->tipology == 'iob' ? 'selected' : ''}}>IoB solution</option>
                <option value="deb10" {{$train->tipology == 'deb10' ? 'selected' : ''}}>Debian 10</option>
            </select>
            @error('tipology')
                <small class="text-red-500">{{$message}}</small>
            @enderror
        </div>

        <button class="btn bg-yellow-500 hover:bg-yellow-700 text-white my-4 rounded-md w-1/2 mt-4">Save</button>
    </form>

</x-layout>