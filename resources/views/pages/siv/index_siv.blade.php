<x-layout>


    <div class="flex justify-between mb-5">
        <h1 class="text-3xl">SIV REQUEST</h1>
        <a href="{{ route('siv.create') }}" class="btn border-none shadow-xl bg-blue-500 hover:bg-blue-700 text-white rounded-md">
            <i class="fa-solid fa-circle-plus me-2 text-lg"></i>
            Add Siv Request
        </a>
    </div>

    <p>total request: {{ $sivsCount }}</p>
    <div class="overflow-x-auto mt-2 rounded-box border border-base-content/5 bg-base-100 shadow-xl">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th class=" w-1/12 text-center">Train</th>
                    <th class="w-10/12">Description</th>
                    <th class="w-1/12 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sivs as $siv)
                    <tr class="hover:bg-blue-100">
                        <th class="text-center">{{ $siv->train->name }}</th>
                        <td>{{ $siv->description }}</td>
                        <td class="text-center flex justify-around">
                            <a href="{{route('siv.edit', $siv->id)}}">
                                <i class="fa-regular fa-pen-to-square text-yellow-500 text-2xl"></i>
                            </a>
                            <form action="{{ route('siv.destroy', $siv->id) }}" method="POST" x-data class="inline hover:cursor-pointer">
                                @csrf
                                @method('delete')
                                <button type="button" id="deleteButton" class="hover:cursor-pointer"
                                    @click.prevent="confirmDelete($event, $el.parentElement)">
                                    <i class="fa-solid fa-trash-can text-2xl text-red-500"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <th colspan="100%" class="text-green-600">No SIV Request..</th>
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
