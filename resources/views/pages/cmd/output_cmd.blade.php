<x-layout>
    <a href="{{route('cmd.index')}}" class="btn bg-slate-300 hover:bg-slate-400 border-none btn-sm mb-5">
        <i class="fa-solid fa-arrow-left me-3"></i>
        <span>Torna indietro</span>
    </a>
    <h1 class="text-3xl mb-5">Command on Trains</h1>
    <div class="bg-white rounded-md shadow-xl p-5 overflow-x-scroll">
        
        {{-- @if ($choose == 'iob' or $trains == 'deb10' or $trains == 'all') --}}
        @if ($choose != 'one')
            @foreach ($outputs as $output)
            <p class="my-5 text-3xl text-blue-500 font-bold">Treno {{$output['number']}}</p>
            <pre>{{$output['output']}}</pre>
            <hr class="mb-6">
            @endforeach
        @else
            <p class="my-5 text-3xl text-blue-500 font-bold">Treno {{$trains->number}}</p>
            <p class="my-5">Comando inserito: <span class="ms-1 text-indigo-600">{{$cmd == '' ? 'non inserito' : $cmd}}</span></p>
            <hr class="mb-6">
            <pre>{{$outputs}}</pre>
        @endif
    </div>
</x-layout>