<x-layout>

    <h1 class="text-3xl mb-8">Update SIV Request Train {{$siv->train}}</h1>

    <form action="{{route('siv.update',compact('siv'))}}" method="POST">
        @csrf
        @method('put')
        <div class="flex flex-col mb-3">
            <label for="train" class="mb-3">Train</label>
            <input type="text" name="train" id="train" class="bg-white p-3 rounded-md w-1/4" placeholder="Train" value="{{$siv->train}}">
        </div>
        <div class="flex flex-col mb-3">
            <label for="train" class="mb-3">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="bg-white p-3 rounded-md w-1/4">{{$siv->description}}</textarea>
        </div>

        <button class="btn bg-yellow-500 hover:bg-yellow-700 text-white my-4">Update</button>
    </form>
</x-layout>