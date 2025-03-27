<x-layout>
    <div class="flex justify-between">
        <h1 class="text-3xl mb-5">COV REPORT</h1>
        <a href="{{route('cov.create')}}" class="btn bg-blue-500 hover:bg-blue-700 text-white rounded-md">
            <i class="fa-solid fa-phone"></i>Chiamata COV
        </a>
    </div>

    <h3 class="bg-slate-300 w-[200px] p-2 rounded-md font-semibold">Giorno 22/03/2025</h3>
    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>Train</th>
                    <th>Time</th>
                    <th>Worker</th>
                    <th>Request</th>
                    <th>Resolver</th>
                    <th>Ticket Number</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <tr class="hover:bg-blue-100">
                    <th>32</th>
                    <td>8:50</td>
                    <td>Fortunato</td>
                    <td>Request Wifi check</td>
                    <td>yes</td>
                    <td>IC9794651321</td>
                    <td>Modem 0 power off</td>
                </tr>
            </tbody>
        </table>
    </div>
</x-layout>
