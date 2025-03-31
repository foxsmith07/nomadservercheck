<x-layout>


    <div class="flex justify-between mb-5">
        <h1 class="text-3xl">TRAINS</h1>
        <a href="{{ route('train.create') }}" class="btn bg-blue-500 hover:bg-blue-700 text-white rounded-md">
            <i class="fa-solid fa-circle-plus me-2 text-lg"></i>
            Add Train
        </a>
    </div>

    <div class="overflow-x-auto mt-2 rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th class=" w-2/12">Train</th>
                    <th class="w-7/12">Tipology</th>
                    <th class="w-2/12 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($trains as $train)
                    <tr class="hover:bg-blue-100">
                        <th class="">{{ $train->name }} <span class="ms-2 font-normal">({{$train->number}})</span></th>
                        <td class="{{$train->tipology == 'iob' ? 'font-bold text-green-600' : ''}}">{{ $train->tipology == 'iob' ? 'IoB solution' : 'Debian 10'}}</td>
                        <td class="text-center">
                            <a href="{{route('train.edit', $train->id)}}">
                                <i class="fa-regular fa-pen-to-square text-yellow-500 text-2xl me-4"></i>
                            </a>
                            <form action="{{ route('train.destroy', $train->id) }}" method="POST" x-data class="inline ms-4 hover:cursor-pointer">
                                @csrf
                                @method('delete')
                                <button type="button" id="deleteButton" class="hover:cursor-pointer"
                                    @click.prevent="confirmDelete($event, $el.parentElement)">
                                    <i class="fa-solid fa-trash-can text-2xl text-red-500"></i>
                                </button>
                            </form>
                            {{-- <a href="">
                                <i class="fa-solid fa-trash-can text-red-500 text-2xl mx-2"></i>
                            </a> --}}
                        </td>
                    </tr>

                @empty
                    <tr>
                        <th colspan="100%" class="text-green-600">No Train insered yet..</th>
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
            title: "Sei sicuro di cancellare il Treno?",
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
