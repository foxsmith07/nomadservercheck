<x-layout>

    <h1 class="text-3xl mb-10">Movie to send</h1>

    <div class="mb-5">
        <label for="">Train</label>
        <select name="" id="" class="rounded-md p-2 ms-5 bg-white">
            @foreach ($cinema as $train)
                <option value="{{$train}}">{{$train}}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="" class="block mb-3">Insert Movie to search</label>
        <input type="text" class="bg-white p-2 rounded-md">
    </div>

    <div class="flex gap-5 my-8 text-5xl">
        <button class="btn btn-circle bg-red-500 w-[50px] h-[50px] hover:bg-red-700">
            <i class="fa-solid fa-stop text-3xl"></i>
        </button>
        <button class="btn btn-circle bg-red-500 w-[50px] h-[50px] hover:bg-red-700">
            <i class="fa-solid fa-play text-3xl"></i>
        </button>
        <button class="btn btn-circle bg-red-500 w-[50px] h-[50px] hover:bg-red-700">
            <i class="fa-solid fa-pause text-3xl"></i>
        </button>
    </div>

    <div class="grid grid-cols-4 gap-5 max-w-[400px] my-9 text-5xl">
        <i class="fa-solid fa-display text-red-600"></i>
        <i class="fa-solid fa-display"></i>
        <i class="fa-solid fa-display"></i>
        <i class="fa-solid fa-display"></i>
        <i class="fa-solid fa-display"></i>
        <i class="fa-solid fa-display"></i>
        <i class="fa-solid fa-display"></i>
        <i class="fa-solid fa-display"></i>
    </div>

</x-layout>


