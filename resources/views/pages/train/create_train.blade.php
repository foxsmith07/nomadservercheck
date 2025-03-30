<x-layout>

    <h1 class="text-3xl mb-8">Add Train</h1>
    <form action="{{route('train.store')}}" method="POST">
        @csrf
        <div class="flex flex-col mb-3">
            <label for="number" class="mb-3">Train Number</label>
            <input type="text" name="number" id="number" 
                    class="bg-white p-3 rounded-md w-1/4 outline-0 focus:outline-2 focus:outline-blue-500 
                            @error('number') outline-2 outline-red-400 @enderror" 
                    placeholder="es. 39" value="{{old('number')}}">
            @error('number')
                <small class="text-red-500">{{$message}}</small>
            @enderror
        </div>
        <div class="flex flex-col mb-3">
            <label for="name" class="mb-3">Train Name</label>
            <input type="text" name="name" id="name" 
                    class="bg-white p-3 rounded-md w-1/4 outline-0 focus:outline-2 focus:outline-blue-500 
                            @error('number') outline-2 outline-red-400 @enderror"
                    placeholder="es. EVO-09" value="{{old('name')}}">
            @error('name')
                <small class="text-red-500">{{$message}}</small>
            @enderror
        </div>
        <div class="flex flex-col mb-3">
            <label for="tipology" class="mb-3">Tipology</label>
            <select name="tipology" id="tipology" class="bg-white p-3 rounded-md w-1/4 outline-0 focus:outline-2 focus:outline-blue-500 
                            @error('number') outline-2 outline-red-400 @enderror">
                <option disabled {{ old('tipology') == '' ? 'selected' : ''}}>select tipology</option>
                <option value="iob" {{ old('tipology') == 'iob' ? 'selected' : ''}}>IoB solution</option>
                <option value="deb10" {{ old('tipology') == 'deb10' ? 'selected' : ''}}>Debian 10</option>
            </select>
            @error('tipology')
                <small class="text-red-500">{{$message}}</small>
            @enderror
        </div>

        <button class="btn bg-blue-500 hover:bg-blue-700 text-white my-4 rounded-md">Submit</button>
    </form>

</x-layout>