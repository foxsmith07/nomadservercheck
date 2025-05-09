<x-layout>
    <form action="{{route('user-profile-information.update')}}" method="post" class="bg-white p-5 rounded-md max-w-[500px] my-10 shadow-xl" x-data="{ isLoading : false}" @submit="isLoading= true">
        @csrf
        @method('put')
        <h1 class="text-2xl mb-5">Profile Information</h1>
        <div class="flex flex-col">
            <label class="mb-3 text-gray-500">Name or Username</label>
            <input type="text" name="name" class="input-custom" value="{{ $user->name }}">
            <span class="text-red-500">{{ $errors->updateProfileInformation->first('name') ?? '' }}</span>
        </div>
        <div class="flex flex-col mt-5">
            <label class="mb-3 text-gray-500">Mail</label>
            <p class="input-custom text-gray-400">{{ $user->email }}</p>
            <input type="text" name="email" class="input-custom text-gray-400 hidden" value="{{ $user->email }}">
            <span class="text-red-500">{{ $errors->updateProfileInformation->first('email') ?? '' }}</span>
        </div>
        <div class="flex flex-col mt-5">
            <label class="mb-3 text-gray-500">Role</label>
            <input type="text" name="role" class="input-custom text-gray-400" value="{{ $user->role }}" disabled>
            <span class="text-red-500">{{ $errors->updateProfileInformation->first('role') ?? '' }}</span>
        </div>
        <button class="btn bg-yellow-500 text-white mt-8 rounded-md border-none hover:bg-yellow-700 w-[200px]" :disabled="isLoading">
            <span x-text="isLoading ? 'Saving...' : 'Save'"></span>
        </button>
    </form>

    <form action="{{route('user-password.update')}}" method="post" class="bg-white p-5 rounded-md max-w-[500px] shadow-xl" x-data="{ isLoading : false}" @submit="isLoading= true">
        @csrf
        @method('put')
        <h2 class="text-2xl mb-5">Update Password</h2>
        <div class="flex flex-col">
            <label class="mb-3 text-gray-500">Current Password</label>
            <input type="password" name="current_password" class="input-custom">
            <span class="text-red-500">{{ $errors->updatePassword->first('current_password') ?? ''}}</span>
        </div>
        <div class="flex flex-col mt-5">
            <label class="mb-3 text-gray-500">New Password</label>
            <input type="password" name="password" class="input-custom">
            <span class="text-red-500">{{ $errors->updatePassword->first('password') ?? '' }}</span>
        </div>
        <div class="flex flex-col mt-5">
            <label class="mb-3 text-gray-500">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="input-custom">
            <span class="text-red-500">{{ $errors->updatePassword->first('password_confirmation') ?? ''}}</span>
        </div>
        <button class="btn bg-red-500 text-white mt-8 rounded-md border-none hover:bg-red-700 w-[200px]" :disabled="isLoading">
            <span x-text="isLoading ? 'Saving...' : 'Save'"></span>
        </button>
    </form>
</x-layout>

@session('success')
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endsession