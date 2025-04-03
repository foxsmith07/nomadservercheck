<x-layout>
    <main class="grid grid-cols-4 gap-10 text-slate-600">

        <div class="h-[150px] bg-red-300 rounded-md shadow-xl p-5 grid grid-cols-2 hover:bg-red-400">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl">Cov Report</h3>
                <p>20 call this month</p>
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <i class="fa-solid fa-phone-volume text-8xl"></i>
            </div>
        </div>
        <div class="h-[150px] bg-yellow-300 bg300 rounded-md shadow-xl p-5 grid grid-cols-2 hover:bg-yellow-400">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl">Chiusure Servizio</h3>
                <p>2 servizi chiusi</p>
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <i class="fa-solid fa-table-list text-8xl"></i>
            </div>
        </div>
        <div class="h-[150px] bg-lime-300 rounded-md shadow-xl p-5 grid grid-cols-2 hover:bg-lime-400">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl">Siv Request</h3>
                <p>4 request intervention</p>
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <i class="fa-solid fa-download text-8xl"></i>
            </div>
        </div>
        <div class="h-[150px] bg-sky-300 rounded-md shadow-xl p-5 grid grid-cols-2 hover:bg-sky-400">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl">Users</h3>
                <p>{{$users}} users created</p>
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <i class="fa-solid fa-user text-8xl"></i>
            </div>
        </div>
    </main>
</x-layout>