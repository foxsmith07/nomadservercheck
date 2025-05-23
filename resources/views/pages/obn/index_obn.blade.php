<x-layout>
    <h1 class="text-4xl mb-5">OBN TRAIN CHECK</h1>

    <form class="flex justify-center mb-5" action="{{route('obn.allCheck')}}" method="get" x-data="{ isLoading : false}" @submit="isLoading = true">
        <button class="btn bg-blue-500 text-white border-none w-[300px] font-bold hover:bg-blue-700" :disabled="isLoading">
            <span x-text="isLoading ? 'Checking all IoB Trains...' : 'Check all IoB Trains'"></span>
            
        </button>
    </form>

    <livewire:obnindex />

    {{-- @if (!empty($outputs))
        @foreach ($outputs as $train)      
            <p>{{$train['number']}}</p>
            <pre>{{$train['output']}}</pre>
        @endforeach

        <p>{{$outputs[0]['number']}}</p>
    @endif --}}

    @if (!empty($output) and !empty($train))
        <p>{{$train->number}} </p>
        @foreach ($output as $item)
        <pre>{{trim($item)}} </pre>
        @endforeach

        
    @endif

</x-layout>
