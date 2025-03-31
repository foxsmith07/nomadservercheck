<x-layout>

    <h1 class="text-3xl mb-8">Create SIV Request</h1>
    <form action="{{ route('siv.store') }}" method="POST" class="w-1/4">
        @csrf
        <div class="flex flex-col mb-3">
            <label for="train_id" class="mb-3">Train</label>
            <select name="train_id" id="tipology" class="input-custom @error('train_id') outline-2 outline-red-400 @enderror">
                <option disabled selected>select train</option>
                @forelse ($trains as $train)
                    <option value="{{$train->id}}">{{$train->name}} ({{$train->number}})</option>
                @empty
                    <option>No train added yet</option>
                @endforelse

            </select>
            @error('train_id')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="flex flex-col mb-3">
            <label for="description" class="mb-3">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="input-custom @error('description') outline-2 outline-red-400 @enderror"
                        ">{{old('description')}}</textarea>
            @error('description')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn bg-blue-500 hover:bg-blue-700 text-white my-4">Submit</button>
    </form>

</x-layout>
