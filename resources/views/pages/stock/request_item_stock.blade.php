<x-layout>
    
    <a href="{{route('stock.show', compact('item'))}}" class="btn btn-sm bg-slate-300 hover:bg-slate-400 mb-10">
        <i class="fa-regular fa-circle-left me-2 text-lg"></i>
        back to the stock
    </a>
    
    <h1 class="text-3xl mb-5">Request item <span class="text-blue-500">"{{strtoupper($item->name)}}"</span></h1>

    <form action="{{route('stock.requeststore')}}" method="POST" class="bg-white rounded-md p-4 max-w-[800px]" >

        @csrf

        {{-- <h2 class="text-blue-500 text-4xl">{{strtoupper($item->name)}}</h2> --}}
        <input type="text" class="text-blue-500 text-4xl" value="{{$item->name}}" name="name" readonly>

        <div class="flex flex-col my-5">
            <label class="font-bold mb-2">NMID:</label>
            <input class="p-3 bg-slate-300 rounded-t-md" value="{{$item->nmid}}" readonly name="nmid">
        </div>
        
        <div class="flex flex-col my-5">
            <label class="font-bold mb-2">Description:</label>
            <textarea cols="30" rows="10" class="p-3 bg-slate-300 rounded-t-md" readonly name="description">{{$item->description}}</textarea>
        </div>

        <div class="flex flex-col my-5">
            <label class="font-bold">Quantity to request:</label>
            <input type="number" class="input-custom" placeholder="Insert quantity requested..." name="quantity">
            @error('quantity')
                <div class="text-red-500">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="flex justify-end mt-10">
            <button type="submit" class="btn btn-wide bg-blue-500 hover:bg-blue-700 text-white">
                <span>Sent Request</span>
            </button>
        </div>



    </form>
</x-layout>

@session('success')
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endsession