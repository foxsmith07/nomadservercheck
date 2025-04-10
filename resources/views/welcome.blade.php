<x-layout>
    <main class="grid grid-cols-4 gap-10 text-slate-600">

        {{--? WIDGET 1 Cov --}}
        <div class="h-[180px] bg-linear-to-tl from-cyan-500 to-blue-500 text-white rounded-md shadow-xl p-5 grid grid-cols-2 hover:bg-red-400">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl font-bold">Cov Report</h3>
                <p><span class="font-bold text-3xl"> {{$covCount}} </span> call this month</p>
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <i class="fa-solid fa-phone-volume text-8xl"></i>
            </div>
        </div>
        {{--? WIDGET 2 Chiusure Servizio --}}
        <div class="h-[180px] bg-linear-to-tl from-red from-amber-400 to-orange-500 rounded-md shadow-xl p-5 grid grid-cols-2 text-white">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl font-bold">Chiusure Servizio</h3>
                <p><span class="font-bold text-3xl">{{$servicesCount}}</span> servizi chiusi</p>
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <i class="fa-solid fa-table-list text-8xl"></i>
            </div>
        </div>
        {{--? WIDGET 3 Siv --}}
        <div class="h-[180px] bg-linear-to-tl from-lime-300 to-green-500 rounded-md shadow-xl p-5 grid grid-cols-2 text-white">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl font-bold">Siv Request</h3>
                <p><span class="font-bold text-3xl">{{$sivCount}}</span> requests intervention</p>
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <i class="fa-solid fa-download text-8xl"></i>
            </div>
        </div>

        {{--? WIDGET 4 Users --}}
        <div class="h-[180px] bg-linear-to-tl from-rose-400 to-red-500 rounded-md shadow-xl p-5 grid grid-cols-2 text-white">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl font-bold">Users</h3>
                <p><span class="font-bold text-3xl">{{$usersCount}}</span> users created</p>
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <i class="fa-solid fa-user text-8xl"></i>
            </div>
        </div>
    </main>
</x-layout>