<x-layout>

    <h1 class="text-3xl mb-8">Create SIV Request</h1>
    <form action="{{route('siv.store')}}" method="POST">
        @csrf
        <div class="flex flex-col mb-3">
            <label for="train" class="mb-3">Train</label>
            <input type="text" name="train" id="train" class="bg-white p-3 rounded-md w-1/4" placeholder="Train">
        </div>
        <div class="flex flex-col mb-3">
            <label for="train" class="mb-3">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="bg-white p-3 rounded-md w-1/4"></textarea>
        </div>

        <button class="btn bg-blue-500 hover:bg-blue-700 text-white my-4">Submit</button>
    </form>

</x-layout>