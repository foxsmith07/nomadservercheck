<x-layout>
    <div class="flex justify-between">
        <h1 class="text-3xl mb-5">COV REPORT</h1>
        <a href="{{route('cov.create')}}" class="btn bg-blue-500 hover:bg-blue-700 text-white rounded-md">
            <i class="fa-solid fa-phone"></i>Chiamata COV
        </a>
    </div>

    @forelse ($covs as $cov)
        <h3 class="bg-slate-300 w-[200px] p-2 rounded-md font-semibold">Giorno {{$cov->created_at->format('d M Y')}}</h3>
        
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
                    @forelse ($covs as $cov)
                        <tr class="hover:bg-blue-100">
                            <th>{{$cov->train->name}}</th>
                            <td>{{$cov->time}}</td>
                            <td>{{$cov->worker}}</td>
                            <td>{{$cov->request}}</td>
                            <td>{{$cov->resolved}}</td>
                            <td>{{$cov->ticket}}</td>
                            <td>{{$cov->note}}</td>
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
