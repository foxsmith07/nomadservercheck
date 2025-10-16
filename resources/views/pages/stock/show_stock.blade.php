<x-layout>
    <a href="{{ route('stock.index') }}" class="btn btn-sm bg-slate-300 hover:bg-slate-400 mb-10">
        <i class="fa-regular fa-circle-left me-2 text-lg"></i>
        back to the stock
    </a>
    {{-- <section class="grid grid-cols-2"> --}}

    <section class="bg-white p-8 rounded-md shadow-lg flex flex-col gap-8 max-w-[800px]">
        <div class="flex justify-between items-center mb-10">
            {{-- <label class="me-5 font-medium">Name: </label> --}}
            <span class="text-4xl text-blue-500">{{ strtoupper($item->name) }}</span>
            <div class="flex flex-col gap-2">
                <a href="" class="btn btn-sm bg-blue-500 hover:bg-blue-600 text-white">
                    <i class="fa-solid fa-envelope-circle-check text-lg"></i>
                    <span>Request item</span>
                </a>
                <a href="{{route('stock.edit' , compact('item'))}}" class="btn btn-sm bg-yellow-400 hover:bg-yellow-500 text-white">
                    <i class="fa-solid fa-file-pen me-1 text-lg"></i>
                    <span>Edit Item</span>
                </a>
            </div>

        </div>

        <div class="flex flex-col gap-3">
            <label class="me-5 font-medium">Description: </label>
            <span>{{ $item->description }}</span>
        </div>

        <div>
            <label class="me-5 font-medium">Quantity in stock: </label>
            <span class="text-xl">{{ $item->quantity_stock }}</span>
        </div>
        
        <div>
            <label class="me-5 font-medium">NMID: </label>
            <span class="text-xl">{{ $item->nmid }}</span>
        </div>

        <div>
            <label class="me-5 font-medium">Position: </label>
            <span class="text-xl">{{ strtoupper($item->position) }}</span>
        </div>

        <div class="flex gap-7">
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
                    <span>{{ $item->data_ordered == null ? ' --- ' : $item->data_ordered->format('d M Y') }}</span>
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


    </section>

    {{-- </section> --}}
</x-layout>
