<x-layout>
    <H1 class="text-3xl mb-8">Main Overview</H1>

    <header class="grid lg:grid-cols-4 gap-10 text-slate-600">

        {{-- ? WIDGET 1 Cov --}}
        <a href="{{route('cov.index')}}" 
            class="h-[180px] bg-linear-to-tl from-cyan-500 to-blue-500 text-white rounded-md shadow-xl p-5 grid grid-cols-2 hover:scale-110 transition-transform">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl font-bold">Cov Report</h3>
                <p><span class="font-bold text-3xl"> {{ $covCount }} </span> call this month</p>
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <i class="fa-solid fa-phone-volume text-8xl"></i>
            </div>
        </a>

        {{-- ? WIDGET 2 Chiusure Servizio --}}
        <a href="{{route('servizio.index')}}" 
            class="h-[180px] bg-linear-to-tl from-red from-amber-400 to-orange-500 rounded-md shadow-xl p-5 grid grid-cols-2 text-white hover:scale-110 transition-transform">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl font-bold">Chiusure Servizio</h3>
                <p><span class="font-bold text-3xl">{{ $servicesCount }}</span> servizi chiusi</p>
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <i class="fa-solid fa-table-list text-8xl"></i>
            </div>
        </a>

        {{-- ? WIDGET 3 Siv --}}
        <a href="{{route('siv.index')}}" 
            class="h-[180px] bg-linear-to-tl from-lime-300 to-green-500 rounded-md shadow-xl p-5 grid grid-cols-2 text-white hover:scale-110 transition-transform">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl font-bold">Siv Request</h3>
                <p><span class="font-bold text-3xl">{{ $sivCount }}</span> requests intervention</p>
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <i class="fa-solid fa-download text-8xl"></i>
            </div>
        </a>

        {{-- ? WIDGET 4 Users --}}
        <a class="h-[180px] bg-linear-to-tl from-rose-400 to-red-500 rounded-md shadow-xl p-5 grid grid-cols-2 text-white hover:scale-110 transition-transform">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl font-bold">Users</h3>
                <p><span class="font-bold text-3xl">{{ $usersCount }}</span> users created</p>
            </div>
            <div class="col-span-1 flex justify-center items-center">
                {{-- <i class="fa-solid fa-user text-8xl"></i> --}}
                <i class="fa-regular fa-id-card text-8xl"></i>
            </div>
        </a>
    </header>

    <main class="my-10">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl">Users</h2>
            <button class="btn btn-sm bg-blue-500 text-white rounded-md border-none hover:bg-blue-700">
                <i class="fa-solid fa-user-plus"></i> Add Collaborator
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Mail</th>
                        <th>Privileges</th>
                        <th>Created at</th>
                        <th class="w-[50px]">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="bg-base-200">
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-red-500">ruolo ancora abiliato</td>
                            <td>{{ $user->created_at->format('d M Y - H:i') }}</td>
                            <td class="text-center">
                                <a href="">
                                    <i class="fa-solid fa-trash-can text-red-500 text-xl"></i>
                                </a>
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
