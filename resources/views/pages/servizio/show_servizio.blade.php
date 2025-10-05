<x-layout>
    <a href="{{route('servizio.index')}}" class="btn btn-sm border-slate-300 bg-slate-300 hover:bg-slate-400 mb-5">
        <i class="fa-regular fa-circle-left text-lg"></i>
        Torna indietro
    </a>
    
    <h1 class="text-4xl mb-8">Chiusura di servizio {{ $service->train }} </h1>

    <div class="overflow-x-auto w-[600px] shadow-xl">
        <table class="table">
            <tbody>
                <tr class="bg-base-200 hover:bg-slate-200">
                    <th class="border">System: </th>
                    <td class="border">Telematica di bordo</td>
                </tr>
                <tr class="bg-base-200 hover:bg-slate-200">
                    <th class="border">Event: </th>
                    <td class="border">
                        {{ ucfirst($service->event) }} {{$service->train}}
                    </td>
                </tr>
                <tr class="bg-base-200 hover:bg-slate-200">
                    <th class="border">User Impact: </th>
                    <td class="border">
                        {{ ucfirst($service->impact) }}
                    </td>
                </tr>
                <tr class="bg-base-200 hover:bg-slate-200">
                    <th class="border">Impact to other systems (if known): </th>
                    <td class="border"></td>
                </tr>
                <tr class="bg-base-200 hover:bg-slate-200">
                    <th class="border">Reported by: </th>
                    <td class="border">Nomad Digital</td>
                </tr>
                <tr class="bg-base-200 hover:bg-slate-200">
                    <th class="border">Supplier available at: </th>
                    <td class="border">Nomad Digital</td>
                </tr>
                <tr class="bg-base-200 hover:bg-slate-200">
                    <th class="border">Downtime start (expected): </th>
                    <td class="border">
                        {{$service->start_expected}}
                    </td>
                </tr>
                <tr class="bg-base-200 hover:bg-slate-200">
                    <th class="border">Downtime start (actual): </th>
                    <td class="border">
                        {{$service->start_actual}}
                    </td>
                </tr>
                <tr class="bg-base-200 hover:bg-slate-200">
                    <th class="border">Downtime end (expected): </th>
                    <td class="border">
                        {{$service->end_expected}}
                    </td>
                </tr>
                <tr class="bg-base-200 hover:bg-slate-200">
                    <th class="border">Downtime end (actual): </th>
                    <td class="border"></td>
                </tr>
            </tbody>
        </table>
    </div>

</x-layout>
