<x-layout>
    {{-- ? MAIN USER --}}

    <main class="mb-10">
        <div class="flex justify-between items-center mb-10">
            <h2 class="text-3xl">Users Management</h2>
            <a href="{{ route('user.create') }}"
                class="btn btn-sm bg-blue-500 text-white rounded-md border-none hover:bg-blue-700">
                <i class="fa-solid fa-user-plus"></i> Add Collaborator
            </a>
        </div>
        <div class="overflow-x-auto bg-white rounded-md shadow-xl">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr class="bg-slate-200">
                        <th class="w-[25px]"></th>
                        <th>Name</th>
                        <th>Mail</th>
                        <th>Role</th>
                        <th>Created at</th>
                        <th class="w-[200px] text-center">Switch to</th>
                        <th class="w-[50px]">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="bg-base-200 hover:bg-blue-100">
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="{{ $user->role == 'admin' ? 'text-yellow-600' : 'text-blue-600' }} font-bold">{{ ucfirst($user->role) }}</td>
                            <td>{{ $user->created_at->format('d M Y - H:i') }}</td>
                            <td class="text-center">
                                <form action="{{ route('user.update', compact('user')) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    {{-- <button class="btn btn-sm {{ $user->role == 'admin' ? 'bg-blue-500 hover:bg-blue-700' : 'bg-yellow-400 hover:bg-yellow-500' }} text-white rounded-md border-none"> --}}
                                    <button class="btn btn-sm  border-2 {{ $user->role == 'admin' ? 'border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white' : 'border-amber-500 text-amber-500 hover:bg-amber-400 hover:text-white' }} rounded-md">
                                        {{ $user->role == 'admin' ? 'switch to collaborator' : 'switch to admin' }}
                                    </button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" x-data
                                    class="inline ms-4 hover:cursor-pointer">
                                    @csrf
                                    @method('delete')
                                    <button type="button" id="deleteButton" class="hover:cursor-pointer"
                                        @click.prevent="confirmDelete($event, $el.parentElement)">
                                        <i class="fa-solid fa-trash-arrow-up text-2xl text-red-500"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="100%" class="text-red-500">
                                No Collaborator created yet
                            </th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

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

@session('error')
    <script>
        Swal.fire({
            position: "center",
            icon: "error",
            title: "{{ session('error') }}",
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
            title: "Sei sicuro di cancellare l\' utente?",
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
                    text: "l\' utente è salvo :)",
                    icon: "error"
                });
            }
        });
    }
</script>