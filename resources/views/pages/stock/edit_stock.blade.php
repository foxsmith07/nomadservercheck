<x-layout>
    <a href="{{ route('stock.index') }}" class="btn btn-sm bg-slate-300 hover:bg-slate-400 mb-10">
        <i class="fa-regular fa-circle-left me-2 text-lg"></i>
        back to the stock
    </a>

    <form method="POST" action="{{route('stock.update', compact('item'))}}" x-data="{ loading: false }" @submit="loading = true"
            class="bg-white p-8 rounded-md shadow-lg flex flex-col gap-8 max-w-[800px]">
            @csrf
            @method('put')
        <div class="flex justify-between mb-10">
            <input type="text" name="name" value="{{strtoupper($item->name)}}" 
                    class="text-4xl text-blue-500 input-custom p-2! ">
            <a href="{{route('stock.request', compact('item'))}}" class="btn btn-sm bg-blue-500 hover:bg-blue-600 text-white">
                <i class="fa-solid fa-envelope-circle-check"></i>
                <span>Request item</span>
            </a>
        </div>

        <div class="flex flex-col">
            <label class="me-5 font-medium">Description: </label>
            <textarea name="description" id="" cols="30" rows="10" class="input-custom">{{$item->description}}</textarea>
        </div>
        
        <div class="flex flex-col">
            <label class="me-5 font-medium">NMID: </label>
            <input type="text" value="{{ $item->nmid}}" name="nmid" class="input-custom">
        </div>

        <div class="flex justify-between gap-20">
            <div class="flex flex-col w-full">
                <label class="me-5 font-medium">Quantity in stock: </label>
                <input type="text" value="{{ $item->quantity_stock }}" name="quantity_stock" class="input-custom">
            </div>
    
            <div class="flex flex-col w-full">
                <label class="me-5 font-medium">Position: </label>
                <input type="text" value="{{ $item->position }}" name="position" class="input-custom">
            </div>
        </div>

        <div class="flex gap-20 mt-5">
            <div>
                <label class="me-5 font-medium">created at: </label>
                <span>{{ $item->created_at->format('d M Y') }}</span>
            </div>

            <div>
                <label class="me-5 font-medium">updated at: </label>
                <span>{{ $item->updated_at->format('d M Y') }}</span>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-10">
            <div class="border-2 border-yellow-400 rounded-md col-span-1 flex flex-col p-3">
                <h5 class="text-yellow-500 mb-3">Ordered..</h5>
                <div>
                    <label>Quantity order: </label>
                    <span>{{ $item->quantity_ordered }}</span>
                </div>
                <div>
                    <label>Date order: </label>
                    {{-- <span>{{ $item->data_ordered == null ? ' --- ' : $item->data_ordered->format('d M Y') }}</span> --}}
                    <span>10 Mar 2025</span>
                </div>
            </div>

            <div class="border-2 border-sky-400 rounded-md col-span-1 flex flex-col p-3">
                <h5 class="text-sky-500 mb-3">Shipped..</h5>
                <div>
                    <label>Quantity shipped: </label>
                    <span>{{ $item->quantity_shipped }}</span>
                </div>
                <div>
                    <label>Date shipped: </label>
                    <span>{{ $item->data_shipped == null ? ' --- ' : $item->data_shipped->format('d M Y') }}</span>
                </div>
            </div>
        </div>

        <button type="submit" class="btn bg-amber-300 hover:bg-amber-400 mt-5" :disabled="loading">
            <span x-show="!loading">Edit</span>
            <span x-show="loading">Saving...</span>
        </button>
    </form>

    {{-- </section> --}}
</x-layout>
