<x-layout>
    <div class="flex justify-between">
        <div class="flex flex-col">
            <h1 class="text-3xl mb-5">COV REPORT</h1>
            <small>Totale chiamate mese corrente {{$monthlyCallCount}}</small>
        </div>
        <a href="{{route('cov.create')}}" class="btn border-none shadow-xl bg-blue-500 hover:bg-blue-700 text-white rounded-md">
            <i class="fa-solid fa-phone"></i>Chiamata COV
        </a>
    </div>

    @forelse ($covs as $date => $dailyReports)
        <h3 class=" bg-slate-400 w-[200px] p-2 rounded-sm font-semibold mt-7 shadow-xl border border-b-0  border-slate-300">Giorno {{$date}}</h3>
        
        <div class="overflow-x-auto rounded-box border border-slate-300 bg-base-100 shadow-xl">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr class="bg-slate-300">
                        <th class="w-1/12">Train</th>
                        <th class="w-1/12">Time</th>
                        <th class="w-2/12">Worker</th>
                        <th class="w-2/12">Request</th>
                        <th class="w-1/12">Resolved</th>
                        <th class="w-2/12">Ticket Number</th>
                        <th class="w-2/12">Note</th>
                        <th class="w-1/12">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dailyReports as $cov)
                        <tr class="hover:bg-blue-100">
                            <th>{{$cov->train->name}}</th>
                            <td>{{$cov->datetime->format('H:i')}}</td>
                            <td>{{$cov->worker}}</td>
                            <td>{{$cov->request}}</td>
                            <td class="p-0"> 
                                <div class="{{$cov->resolved == 'yes' ? 'bg-emerald-400' : ($cov->resolved == 'slow' ? 'bg-amber-300' : 'bg-rose-400')}} 
                                            px-2 py-1 text-center m-0 rounded-md w-[60px]">
                                    {{$cov->resolved == 'slow' ? 'todo' : $cov->resolved}}
                                </div>
                            </td>
                            <td>{{$cov->ticket}}</td>
                            <td>{{$cov->note}}</td>
                            <td class="text-center flex justify-around">
                                <a href="{{route('cov.edit', $cov->id)}}">
                                    <i class="fa-solid fa-file-pen text-yellow-500 text-lg"></i>
                                </a>
                                <form action="{{ route('cov.destroy', $cov->id) }}" method="POST" x-data class="inline hover:cursor-pointer">
                                    @csrf
                                    @method('delete')
                                    <button type="button" id="deleteButton" class="hover:cursor-pointer"
                                        @click.prevent="confirmDelete($event, $el.parentElement)">
                                        <i class="fa-solid fa-trash-arrow-up text-lg text-red-500"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="100%">No Cov Report yet</th>
                        </tr>
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    @empty
        
    @endforelse
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
            title: "Sei sicuro di cancellare la chiamata COV?",
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
                    text: "la chiamata COV è salva :)",
                    icon: "error"
                });
            }
        });
    }
</script>