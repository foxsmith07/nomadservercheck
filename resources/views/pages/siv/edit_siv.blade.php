<x-layout>

    <h1 class="text-3xl mb-8">Update SIV Request <span class="text-blue-700">{{$siv->train->name}}</span></h1>

    <form action="{{route('siv.update',compact('siv'))}}" method="POST" class="bg-white p-8 max-w-[600px] rounded-md shadow-xl">
        @csrf
        @method('put')
        <div class="flex flex-col mb-3">
            <label for="train_id" class="mb-3">Train</label>
            <select name="train_id" id="tipology" class="bg-slate-100 p-3 rounded-md outline-0 focus:outline-2 focus:outline-blue-500 
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
            <textarea name="description" id="description" cols="30" rows="10" class="bg-slate-100 p-3 rounded-md
                        outline-0 focus:outline-2 focus:outline-blue-500 
                            @error('train_id') outline-2 outline-red-400 @enderror""
            >{{$siv->description}}</textarea>
        </div>

        <button class="btn bg-yellow-500 hover:bg-yellow-700 text-white my-4 w-1/2">Update</button>
    </form>
</x-layout>