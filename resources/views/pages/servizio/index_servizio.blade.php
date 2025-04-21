<x-layout>


    <div class="flex justify-between mb-5">
        <h1 class="text-3xl">CHIUSURE SERVIZIO</h1>
        <a href="{{ route('servizio.create') }}" class="btn bg-blue-500 hover:bg-blue-700 text-white rounded-md">
            <i class="fa-solid fa-circle-plus me-2 text-lg"></i>
            New Chiusura servizio
        </a>
    </div>

    {{-- <p>total request: {{ $sivsCount }}</p> --}}
    <div class="overflow-x-auto mt-2 rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th class="w-1/12 text-center">Train</th>
                    <th class="w-2/12 text-center">Event</th>
                    <th class="w-2/12 text-center">User impact</th>
                    <th class="w-2/12 text-center">Start Expected</th>
                    <th class="w-2/12">Start Actual</th>
                    <th class="w-2/12">End Expected</th>
                    <th class="w-1/12 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                    <tr class="hover:bg-blue-100">
                        <th class="text-center">{{ $service->train }}</th>
                        <td>{{$service->event}}</td>
                        <td>{{$service->impact}}</td>
                        <td>{{$service->start_expected}}</td>
                        <td>{{$service->start_actual}}</td>
                        <td>{{$service->end_expected}}</td>

                        <td class="text-center flex justify-around">
                            <a href="{{route('servizio.show', compact('service'))}}">
                                <i class="fa-solid fa-circle-info text-sky-500 text-2xl"></i>
                            </a>
                            <form action="{{ route('servizio.destroy', $service->id) }}" method="POST" x-data class="inline hover:cursor-pointer">
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
                        <th colspan="100%" class="text-green-600">Nessuna Chiusura di servizio..</th>
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
            title: "Sei sicuro di cancellare la chiusura di servizio?",
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
                    text: "la chiusura di servizio è salva :)",
                    icon: "error"
                });
            }
        });
    }
</script>
