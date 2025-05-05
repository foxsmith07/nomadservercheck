<div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100 shadow-xl" wire:poll.20s> <!-- 1200s sono ogni 20 minuti -->
    <table class="table">
        <!-- head -->
        <thead>
            <tr class="bg-indigo-100">
                <th class="w-[97px]">Train</th>
                <th class="text-center w-[120px] bg-red-300">Users</th>
                <th class="w-[200px] text-center bg-red-300">Modem</th>
                <th class="w-[400px]">Switch</th>
                <th class="">Access Points</th>
                <th class="w-[140px]">Last check</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trains as $train)
                <tr class="hover:bg-slate-200">

                    <th class="flex justify-center items-center">
                        <a href="{{route('obn.show', compact('train'))}}" class="w-full flex justify-center items-center p-2 text-center hover:scale-110 transition-transform">
                            <span class="w-full">{{$train->name}}</span>
                        </a>
                    </th>
                    <!-- Users -->
                    <td class="text-center bg-red-300">
                        {{-- <small class="bg-green-600 p-1 rounded-sm text-white font-bold">{{$train->usernum}}</small> --}}
                        <small class="bg-red-600 w-[150px] p-1 rounded-sm text-white font-bold">B2 (200)</small>
                    </td>
                    
                    {{-- Modems--}}
                    <td class="bg-red-300">
                        <small class="bg-green-600 p-1 rounded-sm text-white font-bold">M0 - 7</small>
                        <small class="bg-green-600 p-1 rounded-sm text-white font-bold">M1 - 10</small>
                        <small class="bg-green-600 p-1 rounded-sm text-white font-bold">M2 - 11</small>
                        
                    </td>
                    {{-- Switch --}}
                    <td>
                        @forelse ($train->switches as $sw)
                            <small class="bg-green-600 p-1 rounded-sm text-white font-bold">Coach {{$sw->coach}}</small>
                        @empty    
                            <small class="text-red-500"> No Switch found</small>
                        @endforelse
                    </td>

                    {{-- Access Points --}}
                    <td>
                        @forelse ($train->accessPoints as $ap)
                            <small class="bg-green-600 p-1 rounded-sm text-white font-bold">{{$ap->coach}}.{{$ap->device}}</small>
                        @empty
                            <small class="text-red-500"> No Access Point found</small>
                        @endforelse
                    </td>
                    {{-- Last Update --}}
                    <td>
                        <small class="{{ now()->diffInMinutes($train->lastcheck()) <= -20 ? 'bg-red-600' : 'bg-green-600' }} p-1 rounded-sm text-white font-bold">{{$train->lastcheck() == null ? 'NULL' : $train->lastcheck()->format('d M y - H:i')}}</small>
                    </td>
                </tr>
                
            @empty
                <tr>
                    <th colspan="100%" class=" bgred">
                        No Train
                    </th>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
