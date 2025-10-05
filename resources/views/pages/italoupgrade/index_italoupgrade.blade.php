<x-layout>



    <div class="flex justify-between items-center mb-10">
        <h1 class="text-3xl">ITALO UPGRADE ROADMAP</h1>
        <a href="{{ route('italoupgrade.create') }}"
            class="btn btn-md bg-blue-500 border-none text-white hover:bg-blue-700">
            Aggiungi treno
        </a>
    </div>


    {{-- <livewire:italoupgrade /> --}}

    <div class="overflow-x-auto rounded-box border border-slate-300 shadow-lg bg-base-100">
        <table class="table">
            <!-- head -->
            <thead class="text-center">
                <tr class="bg-slate-200">
                    <th class="w-[100px]">Train</th>
                    <th class="w-[100px]">CCU Serial number</th>
                    <th class="w-[80px]">data start</th>
                    <th class="w-[80px]">data end</th>
                    <th class="w-[100px]">Location</th>
                    <th class="w-[80px]">Fluke Test</th>
                    <th>Note</th>
                    <th class="w-[110px]">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- row 1 -->
                @forelse ($roadmap as $item)
                    <tr class="hover:bg-blue-100">
                        <th>{{ $item->train->name }}</th>

                        <td class="m-0 p-0">
                            {{ $item->serial == null ? '-' : $item->serial}}
                        </td>

                        <td class="m-0 p-0">
                            {{ $item->start }}
                        </td>

                        <td>
                            {{ $item->end }}
                        </td>

                        <td>
                            <span class="{{ $item->location == 'mestre' ? 'text-purple-700' : 'text-emerald-700'}} font-bold">{{ ucfirst($item->location) }}</span>
                        </td>
                        <td class="m-0 p-0 flex justify-center">
                            <div
                                class="text-white px-2 py-1 w-[60px] rounded-sm {{ $item->fluke == 'done' ? 'bg-emerald-500' : 'bg-rose-400' }}">
                                {{ $item->fluke }}
                            </div>
                        </td>
                        <td>
                            {{ $item->note }}
                        </td>
                        <td class="text-center flex justify-between items-center p-2">
                            <a href="{{ route('italoupgrade.edit', $item->id) }}"
                                class="btn btn-sm bg-amber-500 text-white hover:bg-amber-700">Edit</a>

                            <form action="{{ route('italoupgrade.destroy', $item->id) }}" method="POST" x-data
                                class="inline hover:cursor-pointer">
                                @csrf
                                @method('delete')
                                <button type="button" id="deleteButton" class="hover:cursor-pointer"
                                    @click.prevent="confirmDelete($event, $el.parentElement)">
                                    <i class="fa-solid fa-trash-arrow-up text-[28px] text-red-400 hover:text-rose-700"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="100%">No Train added yet</th>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

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
            title: "Sei sicuro di cancellare la richiesta?",
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
