<x-layout>

    <h1 class="text-3xl mb-8">Update SIV Request <span class="text-blue-700">{{$siv->train->name}}</span></h1>

    <form action="{{route('siv.update',compact('siv'))}}" method="POST">
        @csrf
        @method('put')
        <div class="flex flex-col mb-3">
            <label for="train_id" class="mb-3">Train</label>
            <select name="train_id" id="tipology" class="bg-white p-3 rounded-md w-1/4 outline-0 focus:outline-2 focus:outline-blue-500 
                            @error('train_id') outline-2 outline-red-400 @enderror">
                {{-- <option value="{{$siv->train_id}}">{{$siv->train->name}}</option> --}}
                @forelse ($trains as $train)
                    <option value="{{$train->id}}" {{$siv->train_id == $train->id ? 'selected' : ''}}>{{$train->name}} ({{$train->number}})</option>
                @empty
                    <option>No train added yet</option>
                @endforelse

            </select>
            @error('train_id')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="flex flex-col mb-3">
            <label for="train" class="mb-3">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="bg-white p-3 rounded-md w-1/4
                        outline-0 focus:outline-2 focus:outline-blue-500 
                            @error('train_id') outline-2 outline-red-400 @enderror""
            >{{$siv->description}}</textarea>
        </div>

        <button class="btn bg-yellow-500 hover:bg-yellow-700 text-white my-4">Update</button>
    </form>
</x-layout>