<div>
    {{-- <label for="">Train</label> --}}
    <select class="select  text-2xl" wire:model='selectedTrain'>
        <option selected disabled >select Trains</option>
        @forelse ($trains as $train)
            <option value="{{ $train->id }}">{{ $train->name }} ({{$train->number}})</option>
        @empty
            <option value="">No train added</option>
        @endforelse
    </select>


    <pre>{{ $trainOutput }}</pre>
    <div class="w-full text-wrap">
        <pre class="text-wrap text-red-500">{{ $train->obn }}</pre>
    </div>
    {{-- @if ($trainData)
        <pre>{{}}</pre>
    @endif --}}

</div>