<x-layout>
    <form action="" method="" class="bg-white p-5 rounded-md max-w-[500px] my-10 shadow-xl">
        <h1 class="text-2xl mb-5">Profile Information</h1>
        <div class="flex flex-col">
            <label class="mb-3 text-gray-500">Username</label>
            <input type="text" name="name" class="input-custom" value="{{ $user->name}}">
        </div>
        <div class="flex flex-col mt-5">
            <label class="mb-3 text-gray-500">Mail</label>
            <input type="text" name="email" class="input-custom text-gray-400" value="{{ $user->email}}" disabled>
        </div>
        <div class="flex flex-col mt-5">
            <label class="mb-3 text-gray-500">Role</label>
            <input type="text" name="email" class="input-custom text-gray-400" value="Administrator" disabled>
        </div>
        <button class="btn bg-slate-600 text-white mt-8 rounded-md border-none hover:bg-slate-800 w-[200px]">Save</button>
    </form>

    <form action="" method="" class="bg-white p-5 rounded-md max-w-[500px] shadow-xl">
        <h2 class="text-2xl mb-5">Update Password</h2>
        <div class="flex flex-col">
            <label class="mb-3 text-gray-500">Current Password</label>
            <input type="password" name="email" class="input-custom">
        </div>
        <div class="flex flex-col mt-5">
            <label class="mb-3 text-gray-500">New Password</label>
            <input type="password" name="email" class="input-custom">
        </div>
        <div class="flex flex-col mt-5">
            <label class="mb-3 text-gray-500">Confirm New Password</label>
            <input type="password" name="email" class="input-custom">
        </div>
        <button class="btn bg-slate-600 text-white mt-8 rounded-md border-none hover:bg-slate-800 w-[200px]">Save</button>
    </form>
</x-layout>