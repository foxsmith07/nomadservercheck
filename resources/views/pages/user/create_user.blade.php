<x-layout>
    <h1 class="text-4xl mb-5">Crea utente</h1>

    <form action="{{ route('user.store') }}" method="POST" class="flex flex-col gap-5 max-w-[500px] bg-white shadow-xl rounded-md p-10" x-data="{ isLoading: false }" @submit="isLoading = true">
        @csrf

        <div class="flex flex-col w-full">
            <label class="mb-3">Name</label>
            <input type="text" name="name" class="input-custom @error('name') border-2 border-red-500 @enderror" placeholder="Username" value="{{ old('name') }}" autofocus>
            @error('name')
                <small class="text-red-700 block">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="flex flex-col w-full">
            <label class="mb-3">Email</label>
            <input type="email" name="email" class="input-custom @error('email') border-2 border-red-500 @enderror" placeholder="Email" value="{{ old('email') }}">
            @error('email')
                <small class="text-red-700 block">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="flex flex-col w-full">
            <label class="mb-3">Role</label>
            <select name="role" class="input-custom text-gray-700">
                <option value="collaborator" class="text-gray-500">Collaborator</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        

        <div class="flex flex-col w-full">
            <label class="mb-3">Temporary password</label>
            <input type="text" disabled value="12345678" class="input-custom text-gray-400">
        </div>


        <button class="btn bg-yellow-500 text-white rounded-md hover:bg-yellow-700 p-3 mt-5" :disabled="isLoading">
            <span x-text="isLoading ? 'Creating...' : 'Create Collaborator'"></span>        </button>
    </form>

</x-layout>
