<x-layout>
    <h1 class="text-4xl mb-5">OBN TRAIN CHECK</h1>

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr class="bg-slate-200">
                    <th class="w-[25px]">Train</th>
                    <th class="text-center w-[120px]">Users</th>
                    <th class="w-[200px] text-center">Modem</th>
                    <th class="w-[400px]">Switch</th>
                    <th class="">Access Points</th>
                    <th class="">Last check</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tabella as $train)
                    <tr class="hover:bg-slate-200">
                        <th class="p-0 flex justify-center items-center">
                            <a href="{{route('obn.show', $train['train'])}}" class="w-full h-full p-2 text-center">
                                <span class="">{{$train['train']}}</span>
                            </a>
                        </th>
                        <!-- Users -->
                        <td class="text-center">
                            <small class="bg-green-600 p-1 rounded-md text-white font-bold">B1 (160)</small>
                            {{-- <small class="bg-red-600 w-[150px] p-1 rounded-md text-white font-bold">B2 (200)</small> --}}
                        </td>
                        
                        {{-- Modems--}}
                        <td class="flex justify-center items-center gap-1">
                            <small class="bg-green-600 p-1 rounded-md text-white font-bold">M0 - 7</small>
                            <small class="bg-green-600 p-1 rounded-md text-white font-bold">M1 - 10</small>
                            <small class="bg-green-600 p-1 rounded-md text-white font-bold">M2 - 11</small>
                            
                        </td>
                        {{-- Switch --}}
                        <td>
                            @forelse ($train['sw'] as $sw)
                                <small class="bg-green-600 p-1 rounded-md text-white font-bold">Coach {{$sw->coach}}</small>
                            @empty    
                                <small class="text-red-500"> No Switch found</small>
                            @endforelse
                        </td>
                        {{-- Access Points --}}
                        <td>
                            @forelse ($train['ap'] as $ap)
                                <small class="bg-green-600 p-1 rounded-md text-white font-bold">{{$ap->coach}}.{{$ap->num}}</small>
                            @empty
                                <small class="text-red-500"> No Access Point found</small>
                            @endforelse
                        </td>
                        {{-- Last Update --}}
                        <td class="w-[140px]">
                            <small class="bg-{{ now()->diffInMinutes($train['updated_at']) > 30 ? 'red-600' : 'green-600' }} p-1 rounded-md text-white font-bold">{{$train['updated_at']->format('d/m/y - H:i')}} </small>
                        </td>
                    </tr>
                    
                @empty
                    <tr>
                        <th colspan="100%">
                            No Train
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-layout>
