<div class="p-5">
    <div class="w-full flex justify-between mb-10 my-5 px-5">
        <input type="text" wire:model.live="search" placeholder="Search item... name, description or position"
            class="bg-white outline-2 outline-slate-500 hover:outline-2 hover:outline-rose-600 focus:outline-2 focus:outline-rose-600 rounded-md p-2! w-[400px]">

        <button
            class="btn rounded-full p-3 bg-transparent text-slate-500 border-2 border-slate-500 hover:bg-rose-600 hover:text-white hover:border-rose-600"
            onclick="add_item_modal.showModal()">
            <i class="fa-solid fa-circle-plus text-2xl me-2"></i>
            <span class="text-lg">Add Item</span>
        </button>
    </div>

    <div class="overflow-x-auto rounded-md">
        <table class="table table-zebra table-sm">
            <!-- head -->
            <thead>
                <tr class="bg-slate-400! text-white">
                    <th class="w-[300px]">Name</th>
                    <th>Description</th>
                    <th class="w-[90px]">Quantity</th>
                    <th class="w-[90px]">Position</th>
                    <th class="text-center w-[150px]">Updated at</th>
                    <th class="text-center w-[100px]">Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($inventory as $item)
                    <tr class="hover:bg-rose-200! odd:bg-slate-200 even:bg-slate-100">
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td
                            class="text-center text-lg {{ $item->quantity_stock == 0 ? 'text-red-500 font-bold' : ($item->quantity_stock > 0 && $item->quantity_stock < 4 ? 'text-yellow-400 font-bold' : '') }}">
                            {{ $item->quantity_stock }}</td>
                        <td class="text-center">{{ strtoupper($item->position) }}</td>
                        <td class="text-center">{{ $item->updated_at->format('d M Y - H:i') }}</td>
                        <td class="text-center flex gap-3">
                            {{-- <a href="{{ route('stock.show', compact('item')) }}"
                                class="btn btn-sm rounded-full p-4 border-slate-500 bg-transparent text-slate-500 hover:bg-rose-600 hover:text-white hover:border-rose-600">
                                <i class="fa-solid fa-circle-info me-1 text-lg"></i>
                                <span>info</span>
                            </a> --}}
                            <a href="{{ route('stock.edit', compact('item')) }}"
                                class="btn btn-sm rounded-full p-4 border-slate-500 bg-transparent text-slate-500 hover:bg-yellow-400 hover:text-white hover:border-yellow-400">
                                {{-- <i class="fa-solid fa-circle-info me-1 text-lg"></i>
                                <span>info</span> --}}
                                <i class="fa-solid fa-file-pen me-1 text-lg"></i>
                                <span>edit</span>
                            </a>
                            <form action="{{ route('stock.destroy', $item->id) }}" method="POST" x-data
                                class="inline hover:cursor-pointer">
                                @csrf
                                @method('delete')
                                <button type="button" id="deleteButton" class="text-slate-500 hover:bg-rose-600 hover:text-white hover:border-rose-600 hover:cursor-pointer p-4 btn btn-sm bg-transparent border-slate-500 rounded-full"
                                    @click.prevent="confirmDelete($event, $el.parentElement)">
                                    <i class="fa-solid fa-trash-arrow-up text-xl"></i>
                                </button>
                            </form>
                            {{-- <button
                                class="text-slate-500 hover:bg-rose-600 hover:text-white hover:border-rose-600 hover:cursor-pointer p-4 btn btn-sm bg-transparent border-slate-500 rounded-full">
                                <i class="fa-solid fa-trash-arrow-up text-xl"></i>
                            </button> --}}

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="100%" class="text-red-500 font-bold text-center text-2xl">No item insert</td>
                    </tr>
                @endforelse


            </tbody>
        </table>

        <div class="mt-[50px]">
            {{ $inventory->links() }}
        </div>
    </div>

    {{-- ? MODALE --}}
    <dialog id="add_item_modal" class="modal modal-top" wire:ignore.self>
        <div class="modal-box mx-auto w-[800px] h-[1000px] bg-slate-100! p-7">
            <h3 class="text-2xl text-center font-bold my-10">ITEM</h3>

            <form wire:submit="save" class="gap-5 flex flex-col">
                <div class="flex flex-col">
                    <label for="" class="mb-3">Name</label>
                    <input type="text" wire:model="name"
                        class="bg-white rounded-md p-3 focus:outline-2 focus:outline-rose-600 hover:outline-2 hover:outline-rose-300">
                    @error('name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="" class="mb-3">Description</label>
                    <textarea wire:model="description" cols="30" rows="10"
                        class="bg-white rounded-md p-3 focus:outline-2 focus:outline-rose-600 hover:outline-2 hover:outline-rose-300"></textarea>
                    @error('description')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="" class="mb-3">NMID</label>
                    <input type="text" wire:model="nmid" class="bg-white rounded-md p-3 focus:outline-2 focus:outline-rose-600 hover:outline-2 hover:outline-rose-300">
                    @error('nmid')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-10">
                    <div class="flex flex-col col-span-1">
                        <label for="" class="mb-3">Quantity in stock</label>
                        <input type="number" wire:model="quantity_stock"
                            class="bg-white rounded-md p-3 focus:outline-2 focus:outline-rose-600 hover:outline-2 hover:outline-rose-300">
                        @error('quantity_stock')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="flex flex-col col-span-1">
                        <label for="" class="mb-3">Position</label>
                        <input type="text" wire:model="position"
                            class="bg-white rounded-md p-3 focus:outline-2 focus:outline-rose-600 hover:outline-2 hover:outline-rose-300">
                        @error('position')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <button class="btn mt-10 bg-rose-600 text-white hover:bg-rose-700" type="submit"
                    wire:loading.attr="disabled">
                    <span wire:loading class="loading loading-spinner loading-xl"></span>
                    <span>Add Item</span>
                </button>

            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

</div>

<script>
    function confirmDelete(event, formElement) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn text-[18px] bg-green-500 text-slate-100 border-none mx-[6px] rounded-[4px] hover:bg-green-700",
                cancelButton: "btn text-[18px] bg-red-500 text-slate-100 border-none mx-[6px] rounded-[4px] hover:bg-red-700"
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: "Sei sicuro di cancellare l'oggetto?",
            text: "Non puoi tornare indietro!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, cancellalo!",
            cancelButtonText: "No, annulla!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Invia il form se l'utente conferma
                formElement.submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Annullato",
                    text: "la richiesta è salva :)",
                    icon: "error"
                });
            }
        });
    }
</script>
